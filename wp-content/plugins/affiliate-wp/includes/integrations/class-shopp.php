<?php
/**
 * Integrations: Shopp
 *
 * @package     AffiliateWP
 * @subpackage  Integrations
 * @copyright   Copyright (c) 2014, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.2
 */

/**
 * Implements an integration for Shopp.
 *
 * @since 1.2
 *
 * @see Affiliate_WP_Base
 */
class Affiliate_WP_Shopp extends Affiliate_WP_Base {

	/**
	 * The context for referrals. This refers to the integration that is being used.
	 *
	 * @access  public
	 * @since   1.2
	 */
	public $context = 'shopp';

	/**
	 * The order object
	 *
	 * @access  private
	 * @since   1.3
	*/
	private $order;

	public function init() {

		add_action( 'shopp_invoiced_order_event', array( $this, 'add_pending_referral' ), 10, 1 );
		add_action( 'shopp_captured_order_event', array( $this, 'mark_referral_complete' ), 10, 1 );
		add_action( 'shopp_refunded_order_event', array( $this, 'revoke_referral_on_refund' ), 10, 1 );
		add_action( 'shopp_voided_order_event', array( $this, 'revoke_referral_on_refund' ), 10, 1 );
		add_action( 'shopp_delete_purchase', array( $this, 'revoke_referral_on_delete' ), 10, 1 );

		add_filter( 'affwp_referral_reference_column', array( $this, 'reference_link' ), 10, 2 );
	}

	public function add_pending_referral( $order_id = 0 ) {

		if( $this->was_referred() ) {

			/**
			 * Filters the Shopp order prior to adding the pending referral.
			 *
			 * @since 1.3
			 *
			 * @param object $order The Shopp order.
			 */
			$this->order = apply_filters( 'affwp_get_shopp_order', shopp_order( $order_id->order ) );

			$this->email = $this->order->email;

			if ( $this->is_affiliate_email( $this->email ) ) {
			
				$this->log( 'Referral not created because affiliate\'s own account was used.' );

				return; // Customers cannot refer themselves
			}

			$description = '';
			foreach( $this->order->purchased as $key => $item ) {
				$description .= $item->name;

				if( $key + 1 < count( $this->order->purchased ) ) {
					$description .= ', ';
				}
			}

			$amount = $this->order->total;

			if( affiliate_wp()->settings->get( 'exclude_tax' ) ) {

				$amount -= $this->order->tax;

			}

			if( affiliate_wp()->settings->get( 'exclude_shipping' ) ) {

				$amount -= $this->order->shipping;

			}

			$referral_total = $this->calculate_referral_amount( $amount, $order_id->order );			

			$this->insert_pending_referral( $referral_total, $order_id->order, $description );

			$referral = affwp_get_referral_by( 'reference', $order_id->order, 'shopp' );

			if ( ! is_wp_error( $referral ) ) {
				$amount   = affwp_currency_filter( affwp_format_amount( $referral->amount ) );
				$name     = affiliate_wp()->affiliates->get_affiliate_name( $referral->affiliate_id );

				$user                 = wp_get_current_user();
				$Note                 = new ShoppMetaObject();
				$Note->parent         = $order_id->order;
				$Note->context        = 'purchase';
				$Note->type           = 'order_note';
				$Note->value          = new stdClass();
				$Note->value->author  = $user->ID;
				/* translators: 1: Referral ID, 2: Formatted referral amount, 3: Affiliate name, 4: Referral affiliate ID  */
				$Note->value->message = sprintf( __( 'Referral #%1$d for %2$s recorded for %3$s (ID: %4$d).', 'affiliate-wp' ),
					$referral->referral_id,
					$amount,
					$name,
					$referral->affiliate_id
				);
				$Note->save();
			} else {
				affiliate_wp()->utils->log( 'add_pending_referral: The referral could not be found.', $referral );
			}
		}

	}

	public function mark_referral_complete( $order_id = 0 ) {

		$this->complete_referral( $order_id->order );
		// TODO add order note about referral

	}

	public function revoke_referral_on_refund( $order_id = 0 ) {

		if( ! affiliate_wp()->settings->get( 'revoke_on_refund' ) ) {
			return;
		}

		$this->reject_referral( $order_id->order );

	}

	public function revoke_referral_on_delete( $order_id = 0 ) {

		if( ! affiliate_wp()->settings->get( 'revoke_on_refund' ) ) {
			return;
		}

		$this->reject_referral( $order_id->order );

	}

	public function reference_link( $reference = 0, $referral ) {

		if( empty( $referral->context ) || 'shopp' != $referral->context ) {
			return $reference;
		}

		$url = admin_url( 'admin.php?page=shopp-orders&id=' . $reference );

		return '<a href="' . esc_url( $url ) . '">' . $reference . '</a>';
	}

	/**
	 * Runs the check necessary to confirm this plugin is active.
	 *
	 * @since 2.5
	 *
	 * @return bool True if the plugin is active, false otherwise.
	 */
	function plugin_is_active() {
		return function_exists( 'shopp_order' );
	}
}

	new Affiliate_WP_Shopp;