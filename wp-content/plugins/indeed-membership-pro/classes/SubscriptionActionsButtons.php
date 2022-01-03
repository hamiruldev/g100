<?php
namespace Indeed\Ihc;

class SubscriptionActionsButtons
{

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showCancel( $uid=0, $lid=0, $subscriptionId=0, $checkThePaymentType=true )
    {
        if ( !$uid || !$lid ){
            return false;
        }

        // only if it's enabled on admin dashboard
        if ( get_option( 'ihc_show_cancel_link', 1 ) === '0' ){
            return false;
        }

        // only for recurring subscriptions
        $accessType = \Indeed\Ihc\Db\Memberships::getOneMeta( $lid, 'access_type' );
        if ( $accessType !== 'regular_period' ){
            return false;
        }

        // only for active subscriptions
        $statusArr = \Indeed\Ihc\UserSubscriptions::getStatus( $uid, $lid, $subscriptionId );
        if ( !isset( $statusArr['status'] ) || $statusArr['status'] != 1 ){
            return false;
        }

        // check the payment type
        $orderId = \Ihc_Db::getLastOrderIdByUserAndLevel( $uid, $lid );
        $orderMeta = new \Indeed\Ihc\Db\OrderMeta();
        $paymentType = $orderMeta->get( $orderId, 'ihc_payment_type' );
        $excludedPaymentTypeFromCancel = [ 'braintree' ];
        if ( $checkThePaymentType && ( $paymentType === null || $paymentType === '' || in_array( $paymentType, $excludedPaymentTypeFromCancel ) ) ){
            return false;
        }

        $canDo = true;
        $transactionId = \Ihc_Db::getTransactionIdForUserSubscription( $uid, $lid, $orderId );
        switch ( $paymentType ){
            case 'paypal':
              $object = new \Indeed\Ihc\Gateways\PayPalStandard();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'stripe':
              if (!class_exists('ihcStripe')){
                  require_once IHC_PATH . 'classes/PaymentGateways/ihcStripe.class.php';
              }
              $object = new \ihcStripe();
        			$object->canDoCancel( $transactionId );
              break;
            case 'twocheckout':
              $object = new \Indeed\Ihc\Gateways\TwoCheckout();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'authorize':
              if (!class_exists('ihcAuthorizeNet')){
        				  require_once IHC_PATH . 'classes/PaymentGateways/ihcAuthorizeNet.class.php';
        			}
        			$object = new \ihcAuthorizeNet();
        			$canDo = $object->canDoCancel( $transactionId );
              break;
            case 'pagseguro':
              $object = new \Indeed\Ihc\Gateways\Pagseguro();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'stripe_checkout_v2':
              $object = new \Indeed\Ihc\Gateways\StripeCheckout();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'paypal_express_checkout':
              $object = new \Indeed\Ihc\Gateways\PayPalExpressCheckout();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'mollie':
              $object = new \Indeed\Ihc\Gateways\Mollie();
              $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              break;
            case 'bank_transfer':
              $canDo = true;
              break;
            default:
              $paymentObject = apply_filters( 'ihc_payment_gateway_create_payment_object', false, $paymentType );
              if ( method_exists ( $paymentObject , 'canDoCancel' ) ){
                  $canDo = $object->canDoCancel( $uid, $lid, $transactionId );
              }
              break;
        }
        if ( $canDo ){
            return true;
        }
        return false;

    }

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showRenew( $uid=0, $lid=0, $subscriptionId=0 )
    {
        if ( !$uid || !$lid ){
            return false;
        }

        // only if it's enabled on admin dashboard
        if ( get_option( 'ihc_show_renew_link', 1 ) === '0' ){
            return false;
        }

        // only for expired subscriptions
        $statusArr = \Indeed\Ihc\UserSubscriptions::getStatus( $uid, $lid, $subscriptionId );
        if ( !isset( $statusArr['status'] ) || $statusArr['status'] != 2 ){
            return false;
        }

        return true;
    }

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showRemove( $uid=0, $lid=0, $subscriptionId=0 )
    {
        if ( !$uid || !$lid ){
            return false;
        }

        // only if it's enabled on admin dashboard
        if ( get_option( 'ihc_show_delete_link', 1 ) === '0' ){
            return false;
        }

        // if we show the cancel button, we don't show anymore the remove button
        if ( self::showCancel( $uid, $lid, $subscriptionId, false ) ){
            return false;
        }

        return true;
    }

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showFinishPayment( $uid=0, $lid=0, $subscriptionId=0 )
    {
        if ( !$uid || !$lid ){
            return false;
        }

        // only if it's enabled on admin dashboard
        if ( get_option( 'ihc_show_finish_payment', 1 ) === '0' ){
            return false;
        }

        $statusArr = \Indeed\Ihc\UserSubscriptions::getStatus( $uid, $lid, $subscriptionId );
        // only for on hold subscriptions
        if ( !isset( $statusArr['status'] ) || $statusArr['status'] != 3 ){
            return false;
        }

        // check the last order create time
        $orderData = \Ihc_Db::getLastOrderDataByUserAndLevel( $uid, $lid );
        $minimHours = get_option( 'ihc_subscription_table_finish_payment_after', 12 );
        $minTime = $minimHours * 60 * 60;

        if ( !isset( $orderData['create_date'] ) || ( strtotime( $orderData['create_date'] ) + $minTime ) > indeed_get_unixtimestamp_with_timezone() ){
            return false;
        }

        return true;
    }

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showPause( $uid=0, $lid=0, $subscriptionId=0 )
    {
        if ( !$uid || !$lid ){
            return false;
        }

        // only if it's enabled on admin dashboard
        if ( get_option( 'ihc_show_pause_resume_link', 1 ) === '0' ){
            return false;
        }

        // not available for recurring subscription
        $subscriptionType = \Indeed\Ihc\Db\UserSubscriptionsMeta::getOne( $subscriptionId, 'access_type' );
        if ( $subscriptionType === false || $subscriptionType === 'regular_period' ){
            return false;
        }

        // only for active subscriptions
        $statusArr = \Indeed\Ihc\UserSubscriptions::getStatus( $uid, $lid, $subscriptionId );
        if ( !isset( $statusArr['status'] ) || $statusArr['status'] != 1 ){
            return false;
        }

        return true;
    }

    /**
     * @param int
     * @param int
     * @param int
     * @return bool
     */
    public static function showResume( $uid=0, $lid=0, $subscriptionId=0 )
    {
          if ( !$uid || !$lid ){
              return false;
          }

          // only if it's enabled on admin dashboard
          if ( get_option( 'ihc_show_pause_resume_link', 0 ) === '0' ){
              return false;
          }

          // not available for recurring subscription
          $subscriptionType = \Indeed\Ihc\Db\UserSubscriptionsMeta::getOne( $subscriptionId, 'access_type' );
          if ( $subscriptionType === false || $subscriptionType === 'regular_period' ){
              return false;
          }

          // only for paused subscriptions
          $statusArr = \Indeed\Ihc\UserSubscriptions::getStatus( $uid, $lid, $subscriptionId );
          if ( !isset( $statusArr['status'] ) || $statusArr['status'] != 4 ){
              return false;
          }

          return true;
    }

}
