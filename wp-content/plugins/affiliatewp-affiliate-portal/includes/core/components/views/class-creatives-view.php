<?php
/**
 * Views: Creatives View
 *
 * @package   Core/Components
 * @copyright Copyright (c) 2021, Sandhills Development, LLC
 * @license   http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since     1.0.0
 */

namespace AffiliateWP_Affiliate_Portal\Core\Components\Views;

use AffiliateWP_Affiliate_Portal\Core\Components\Controls;
use AffiliateWP_Affiliate_Portal\Core\Interfaces\View;

/**
 * Sets up the Creatives view.
 *
 * @since 1.0.0
 */
class Creatives_View implements View {

	/**
	 * Retrieves the view sections.
	 *
	 * @since 1.0.0
	 *
	 * @return array[] Sections.
	 */
	public function get_sections() {
		return array(
			'creatives' => array(
				'priority' => 1,
				'wrapper'  => false,
				'columns'  => array(
					'header'  => 3,
					'content' => 3,
				),
			),
		);
	}

	/**
	 * Retrieves the view controls.
	 *
	 * @since 1.0.0
	 *
	 * @return array[] Sections.
	 */
	public function get_controls() {
		$creatives_per_page_setting = affiliate_wp()->settings->get( 'portal_creatives_per_page' );

		// Get Creatives.
		$page     = 1;
		$per_page = ! empty( $creatives_per_page_setting ) ? $creatives_per_page_setting : 30;
		$args     = array(
			'number' => $per_page,
			'offset' => $per_page * ( $page - 1 ),
			'status' => 'active',
		);
		$creatives = affiliate_wp()->creatives->get_creatives( $args );

		// Wrapper div.
		$controls = array(
			new Controls\Wrapper_Control( array(
				'id'      => 'wrapper',
				'view_id' => 'creatives',
				'section' => 'wrapper',
				'atts'    => array(
					'id' => 'affwp-affiliate-portal-creatives',
				),
			) )
		);

		// Creatives cards.
		$creatives_cards = array();
		foreach ( $creatives as $creative ) {
			$image_id = attachment_url_to_postid( $creative->image );
			$image    = '';

			if ( 0 === $image_id && is_string( $creative->image ) ) {
				$image = $creative->image;
			} else {
				$src = wp_get_attachment_image_src( $image_id, 'full' );

				if ( isset( $src[0] ) ) {
					$image = $src[0];
				}
			}

			$creatives_cards[] = new Controls\Creative_Card_Control( array(
				'id'      => 'creative_card',
				'view_id' => 'creatives',
				'section' => 'creatives',
				'args'    => array(
					'image'       => $image,
					'text'        => $creative->text,
					'url'         => $creative->url,
					'description' => $creative->description ? $creative->description : '',
				),
			) );
		}

		$controls[] = new Controls\Card_Group_Control( array(
			'id'       => 'creatives_card_group',
			'view_id'  => 'creatives',
			'section'  => 'creatives',
			'priority' => 5,
			'args'     => array(
				'columns' => 4,
				'cards'   => $creatives_cards,
			),
		) );

		return $controls;
	}

}
