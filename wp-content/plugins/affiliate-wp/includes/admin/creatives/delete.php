<?php
/**
 * Admin: Delete Creative View
 *
 * @package     AffiliateWP
 * @subpackage  Admin/Creatives
 * @copyright   Copyright (c) 2014, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.2
 */

if ( ! empty( $_GET['creative_id'] ) && is_array( $_GET['creative_id'] ) ) {
	$to_delete = array_map( 'affwp_get_creative', $_GET['creative_id'] );
} else {
	$to_delete = ! empty( $_GET['creative_id'] ) ? array( affwp_get_creative( absint( $_GET['creative_id'] ) ) ) : array();
}
?>
<div class="wrap">

	<h2><?php _e( 'Delete Creative', 'affiliate-wp' ); ?></h2>

	<form method="post" id="affwp_delete_creative">

		<?php
		/**
		 * Fires at the top of the delete-creatives admin screen.
		 *
		 * @since 1.0
		 *
		 * @param int $to_delete The ID of the creative.
		 */
		do_action( 'affwp_delete_creative_top', $to_delete );
		?>

		<p><?php _e( 'Are you sure you want to delete this creative?', 'affiliate-wp' ); ?></p>

		<ul>
		<?php foreach ( $to_delete as $creative ) :
			?>
			<li>
				<?php
				/* translators: 1: Creative ID, 2: Creative name */
				printf( _x( 'Creative ID #%1$d: %2$s', 'Creative ID, creative name', 'affiliate-wp' ), $creative->ID, $creative->name );
				?>
				<input type="hidden" name="affwp_creative_ids[]" value="<?php echo esc_attr( $creative->ID ); ?>"/>
			</li>
		<?php endforeach; ?>
		</ul>

		<?php
		/**
		 * Fires at the bottom of the delete-creatives admin screen.
		 *
		 * @since 1.0
		 *
		 * @param int $to_delete The ID of the creative.
		 */
		do_action( 'affwp_delete_creative_bottom', $to_delete );
		?>

		<input type="hidden" name="affwp_action" value="delete_creatives" />
		<?php echo wp_nonce_field( 'affwp_delete_creatives_nonce', 'affwp_delete_creatives_nonce' ); ?>

		<?php submit_button( __( 'Delete Creative', 'affiliate-wp' ) ); ?>

	</form>

</div>
