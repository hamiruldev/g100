<?php
namespace Indeed\Ihc\Db;

class NotificationLogs
{
    public function __construct()
    {

    }

    /**
     * @param array
     * @return bool
     */
    public static function save( $data=[] )
    {
        global $wpdb;
        if ( !isset( $data['notification_type'] ) || !isset( $data['email_address'] ) || !isset( $data['message'] ) || !isset( $data['uid'] ) ){
            return false;
        }
        if ( !isset( $data['lid'] ) ){
            $data['lid'] = '';
        }
        $query = $wpdb->prepare( "INSERT INTO {$wpdb->prefix}ihc_notifications_logs VALUES(
          null,
          %s,
          %s,
          %s,
          %s,
          %s,
          %s,
          null
        );",
            $data['notification_type'],
            $data['email_address'],
            $data['subject'],
            $data['message'],
            $data['uid'],
            $data['lid']
        );
        return $wpdb->query( $query );
    }

    public static function getOneByEmail()
    {

    }

    public static function getMany( $uid=0, $limit=30, $offset=0, $onlyUser=false )
    {
        global $wpdb;
        if ( $uid ){
            $query = $wpdb->prepare( "SELECT id, notification_type, email_address, subject, message, uid, lid, create_date
                                          FROM {$wpdb->prefix}ihc_notifications_logs WHERE uid=%d ORDER BY id DESC LIMIT %d OFFSET %d;",
                                          $uid, $limit, $offset );
        } else {
            $query = $wpdb->prepare( "SELECT id, notification_type, email_address, subject, message, uid, lid, create_date
                                          FROM {$wpdb->prefix}ihc_notifications_logs ORDER BY id DESC LIMIT %d OFFSET %d;", $limit, $offset );
        }

        $data = $wpdb->get_results( $query );
        if ( !$data ){
            return [];
        }
        if ( $onlyUser ){
            $notifications = new \Indeed\Ihc\Notifications();
            $adminNotifications = $notifications->getAdminCases();
            foreach ( $data as $key => $notification ){
                if ( in_array( $notification->notification_type, $adminNotifications ) ){
                    unset( $data[$key] );
                }
            }
        }
        return $data;
    }

    public static function getCount( $uid=0 )
    {
        global $wpdb;
        if ( $uid ){
          $query = $wpdb->prepare( "SELECT COUNT(*) as c FROM {$wpdb->prefix}ihc_notifications_logs WHERE uid=%d;", $uid );
          $data = $wpdb->get_var( $query );
        } else {
            //No query parameters required, Safe query. prepare() method without parameters can not be called
            $query = "SELECT COUNT(*) as c FROM {$wpdb->prefix}ihc_notifications_logs;";
            $data = $wpdb->get_var( $query );
        }
        return $data;
    }

    public static function getManyByNotificationType()
    {

    }


}
