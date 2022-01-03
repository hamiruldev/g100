<?php
if (!empty($_REQUEST['ihc_login_security_black_list'])){
	$_REQUEST['ihc_login_security_black_list'] = preg_replace('/\s+/', '', $_REQUEST['ihc_login_security_black_list']);
}
ihc_save_update_metas('login_security');//save update metas
$data['metas'] = ihc_return_meta_arr('login_security');//getting metas
echo ihc_check_default_pages_set();//set default pages message
echo ihc_check_payment_gateways();
echo ihc_is_curl_enable();
do_action( "ihc_admin_dashboard_after_top_menu" );
?>
<form  method="post">
	<div class="ihc-stuffbox">
		<h3 class="ihc-h3"><?php esc_html_e('Security Login', 'ihc');?></h3>
		<div class="inside">

			<div class="iump-form-line">
				<h2><?php esc_html_e('Activate/Hold Security Login', 'ihc');?></h2>
				<p><?php esc_html_e('Fight against brute-force attacks by blocking login for the IP after it reaches the maximum allowed retries.', 'ihc');?></p>
				<label class="iump_label_shiwtch ihc-switch-button-margin">
					<?php $checked = ($data['metas']['ihc_login_security_on']) ? 'checked' : '';?>
					<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_login_security_on');" <?php echo $checked;?> />
					<div class="switch ihc-display-inline"></div>
				</label>
				<input type="hidden" name="ihc_login_security_on" value="<?php echo $data['metas']['ihc_login_security_on'];?>" id="ihc_login_security_on" />
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Allowed Retries', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0" value="<?php echo $data['metas']['ihc_login_security_allowed_retries'];?>" name="ihc_login_security_allowed_retries" />
						<div class="input-group-addon"><?php esc_html_e('Retries', 'ihc');?></div>
					</div>
				</div>
				</div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Locked Time', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0" value="<?php echo $data['metas']['ihc_login_security_lockout_time'];?>" name="ihc_login_security_lockout_time" />
						<div class="input-group-addon"><?php esc_html_e('Minutes', 'ihc');?></div>
					</div>
				</div>
				</div>

			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Maximum number of Lockouts', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0" value="<?php echo $data['metas']['ihc_login_security_max_lockouts'];?>" name="ihc_login_security_max_lockouts" />
						<div class="input-group-addon"><?php esc_html_e('Lockouts', 'ihc');?></div>
					</div>
				</div>
				</div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Extended Locked Time', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0" value="<?php echo $data['metas']['ihc_login_security_extended_lockout_time'];?>" name="ihc_login_security_extended_lockout_time"/>
						<div class="input-group-addon"><?php esc_html_e('Hours', 'ihc');?></div>
					</div>
				</div>
				</div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Reset Retries after', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0" value="<?php echo $data['metas']['ihc_login_security_reset_retries'];?>" name="ihc_login_security_reset_retries" />
						<div class="input-group-addon"><?php esc_html_e('Hours', 'ihc');?></div>
					</div>
				</div>
				</div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Notify Admin after', 'ihc');?></label>
				<div class="row">
				<div class="col-xs-3">
					<div class="input-group">
						<input type="number" class="form-control"  min="0"  value="<?php echo $data['metas']['ihc_login_security_notify_admin'];?>" name="ihc_login_security_notify_admin"  />
						<div class="input-group-addon"><?php esc_html_e('retries', 'ihc');?></div>
					</div>
				</div>
				</div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Black IP list', 'ihc');?></label>
				<textarea name="ihc_login_security_black_list"  class="ihc-login-security-textare"><?php echo $data['metas']['ihc_login_security_black_list'];?></textarea>
				<div class="ihc-general-options-link-pages"><?php esc_html_e('Write values separated by comma. Spaces are not allowed.', 'ihc');?></div>
			</div>


			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Fail Login Attempt Message', 'ihc');?></label>
				<textarea name="ihc_login_security_lockout_attempt_message" class="ihc-login-security-textare"><?php echo stripslashes($data['metas']['ihc_login_security_lockout_attempt_message']);?></textarea>
				<div class="ihc-general-options-link-pages"><?php esc_html_e('Where {number} is the remaining numbers of retries.', 'ihc');?></div>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Locked Message', 'ihc');?></label>
				<textarea name="ihc_login_security_lockout_message" class="ihc-login-security-textare"><?php echo stripslashes($data['metas']['ihc_login_security_lockout_message']);?></textarea>
			</div>

			<div class="iump-form-line">
				<label class="iump-labels-special"><?php esc_html_e('Extended Locked Message', 'ihc');?></label>
				<textarea name="ihc_login_security_extended_lockout_message" class="ihc-login-security-textare"><?php echo stripslashes($data['metas']['ihc_login_security_extended_lockout_message']);?></textarea>
			</div>

			<div class="ihc-submit-form">
				<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
			</div>

		</div>
	</div>

</form>
