<?php
ihc_save_update_metas('weekly_summary_email');//save update metas
$data['metas'] = ihc_return_meta_arr('weekly_summary_email');//getting metas
echo ihc_check_default_pages_set();//set default pages message
echo ihc_check_payment_gateways();
echo ihc_is_curl_enable();
do_action( "ihc_admin_dashboard_after_top_menu" );


?>
<form  method="post">
	<div class="ihc-stuffbox">
		<h3 class="ihc-h3"><?php esc_html_e('Ultimate Membership Pro - Weekley Summary Email', 'ihc');?></h3>
		<div class="inside">
      <div class="iump-form-line">
        <h2><?php esc_html_e('Activate/Hold Weekley Summary Email', 'ihc');?></h2>
        <p><?php esc_html_e('You may activate this option in order to receive a report about number of Orders, Total Revenue and number of new Subcriptions. This report will be made over a period of 7 days and will be sent every monday.', 'ihc');?></p>
        <label class="iump_label_shiwtch ihc-switch-button-margin">
          <?php $checked = ($data['metas']['ihc_reason_for_weekly_email_enabled']) ? 'checked' : '';?>
          <input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_reason_for_weekly_email_enabled');" <?php echo $checked;?> />
          <div class="switch ihc-display-inline"></div>
        </label>
        <input type="hidden" name="ihc_reason_for_weekly_email_enabled" value="<?php echo $data['metas']['ihc_reason_for_weekly_email_enabled'];?>" id="ihc_reason_for_weekly_email_enabled" />
			</div>
			<div class="ihc-submit-form">
				<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
			</div>
		</div>
  </div>
</form>
