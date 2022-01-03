/**
 * Creatives.
 *
 * Works with the Creatives page template to handle copying, and modal states.
 *
 * @author Alex Standiford
 * @since 1.0.0
 * @global creatives
 *
 */

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * Internal dependencies
 */
import { copyNode } from '@affiliatewp-portal/clipboard-helpers';
import { pause } from '@affiliatewp-portal/helpers';

/**
 * Creatives screen AlpineJS handler.
 *
 * Works with the Creatives page template to handle copying, and modal states.
 *
 * @since 1.0.0
 * @access private
 * @global creatives
 *
 * @returns object A creatives AlpineJS object.
 */
function creatives() {
	return {
		open: false,
		copying: false,

		/**
		 * Copy.
		 *
		 * Attempts to copy the creative text, and flashes a notification.
		 *
		 * @since      1.0.0
		 * @access     public
		 * @param type event. The event this is firing against.
		 *
		 * @return void
		 */
		async copy( event ) {
			// Save the original HTML so we can use it to restore the original state of the button.
			const originalHTML = event.target.innerHTML;

			// Attempt to copy the content to the user's clipboard.
			await copyNode( this.$refs.creativeCode );

			// Flash the text
			this.copying = true;
			event.target.innerText = `🎉 ${__( 'Copied!', 'affiliatewp-affiliate-portal' )}`;
			await pause( 2000 );
			event.target.innerHTML = originalHTML;
			this.copying = false;
		}
	}
}

export default creatives;