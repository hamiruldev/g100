<?php
$uid = isset( $_GET['uid'] ) ? $_GET['uid'] : 0;
$notifications = new \Indeed\Ihc\Notifications();
$notification_arr = $notifications->getAllNotificationNames();
//


$totalItems = \Indeed\Ihc\Db\NotificationLogs::getCount( $uid );


  $url = admin_url( 'admin.php?page=ihc_manage&tab=notification-logs' );
  $limit = 25;
  $currentPage = (empty($_GET['p'])) ? 1 : $_GET['p'];
  if ($currentPage>1){
    $offset = ( $currentPage - 1 ) * $limit;
  } else {
    $offset = 0;
  }
  include_once IHC_PATH . 'classes/Ihc_Pagination.class.php';
  $pagination = new Ihc_Pagination(array(
                      'base_url'          => $url,
                      'param_name'        => 'p',
                      'total_items'       => $totalItems,
                      'items_per_page'    => $limit,
                      'current_page'      => $currentPage,
  ));
  if ($offset + $limit>$totalItems){
    $limit = $totalItems - $offset;
  }
  $pagination = $pagination->output();

$data = \Indeed\Ihc\Db\NotificationLogs::getMany( $uid, $limit, $offset );
?>
<div>
    <?php if ( $data ):?>
        <table class="wp-list-table widefat fixed tags ihc-admin-tables" id="ihc-levels-table">
          <thead>
                <tr class="wp-list-table widefat fixed tags ihc-admin-tables ihc-noaitications-logs">
                    <th  class="ihc-id-col"><?php esc_html_e('ID','ihc');?></th>
                    <th  class="ihc-notification-col"><?php esc_html_e('Notification Type','ihc');?></th>
                    <th  class="ihc-sentto-col"><?php esc_html_e('Sent to','ihc');?></th>
                    <th><?php esc_html_e('Email','ihc');?></th>
                    <th class="ihc-senton-col"><?php esc_html_e('Sent on:','ihc');?></th>
                </tr>
          </thead>
          <tbody>
            <?php foreach ( $data as $object ):?>
                <tr>
                    <td><?php echo $object->id;?></td>
                    <td><?php echo isset( $notification_arr[$object->notification_type] ) ? $notification_arr[$object->notification_type] : $object->notification_type;?></td>
                    <td>
                      <div><a href="mailto:<?php echo $object->email_address;?>" target="_blank"><?php echo $object->email_address;?></a></div>
                      <?php if(isset($object->uid) && $object->uid != 0){ ?>
                        <div>User ID: <?php echo $object->uid;?></div>
                      <?php } ?>
                      <?php if(isset($object->lid) && $object->lid != 0){ ?>
                        <div>Membership ID: <?php echo $object->lid;?></div>
                      <?php } ?>
                    </td>
                    <td>
                      <div><strong><?php echo $object->subject;?><strong></div>
                      <div class="ihc-notification-logs-message"><?php echo $object->message;?></div>
                    </td>
                    <td><?php echo ihc_convert_date_time_to_us_format($object->create_date);?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
        </table>
    <?php endif;?>
</div>

<div>
<?php if ( $pagination ): ?>
    <?php echo $pagination;?>
<?php endif;?>
</div>
