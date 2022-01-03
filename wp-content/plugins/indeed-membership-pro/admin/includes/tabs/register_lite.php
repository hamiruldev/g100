<?php
ihc_save_update_metas('register_lite');//save update metas
$data['metas'] = ihc_return_meta_arr('register_lite');//getting metas
echo ihc_check_default_pages_set();//set default pages message
echo ihc_check_payment_gateways();
echo ihc_is_curl_enable();
do_action( "ihc_admin_dashboard_after_top_menu" );

$pages_arr = array(-1 => '...') + ihc_get_all_pages() + ihc_get_redirect_links_as_arr_for_select();
?>
<div class="ihc-register-lite-wrapper">
<form method="post">
	<div class="ihc-stuffbox">
		<h3 class="ihc-h3"><?php esc_html_e('Register Lite', 'ihc');?></h3>
		<div class="inside">

			<div class="iump-form-line">
				<h2><?php esc_html_e('Activate/Hold', 'ihc');?></h2>
				<label class="iump_label_shiwtch ihc-switch-button-margin">
					<?php $checked = ($data['metas']['ihc_register_lite_enabled']) ? 'checked' : '';?>
					<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_register_lite_enabled');" <?php echo $checked;?> />
					<div class="switch ihc-display-inline"></div>
				</label>
				<input type="hidden" name="ihc_register_lite_enabled" value="<?php echo $data['metas']['ihc_register_lite_enabled'];?>" id="ihc_register_lite_enabled" />
			</div>

			<div class="iump-register-select-template">
				<?php
					$templates = array(

								'ihc-register-14'=>'(#14) '.esc_html__('Ultimate Member', 'ihc'),
								'ihc-register-10'=>'(#10) '.esc_html__('BootStrap Theme', 'ihc'),
								'ihc-register-9'=>'(#9) '.esc_html__('Radius Theme', 'ihc'),
								'ihc-register-8'=>'(#8) '.esc_html__('Simple Border Theme', 'ihc'),
								'ihc-register-13'=>'(#13) '.esc_html__('Double BootStrap Theme', 'ihc'),
								'ihc-register-12'=>'(#12) '.esc_html__('Dobule Radius Theme', 'ihc'),
								'ihc-register-11'=>'(#11) '.esc_html__('Double Simple Border Theme', 'ihc'),
								'ihc-register-7'=>'(#7) '.esc_html__('BackBox Theme', 'ihc'),
								'ihc-register-6'=>'(#6) '.esc_html__('Double Strong Theme', 'ihc'),
								'ihc-register-5'=>'(#5) '.esc_html__('Strong Theme', 'ihc'),
								'ihc-register-4'=>'(#4) '.esc_html__('PlaceHolder Theme', 'ihc'),
								'ihc-register-3'=>'(#3) '.esc_html__('Blue Box Theme', 'ihc'),
								'ihc-register-2'=>'(#2) '.esc_html__('Basic Theme', 'ihc'),
								'ihc-register-1'=>'(#1) '.esc_html__('Standard Theme', 'ihc')
								);
				?>
				<?php esc_html_e('Register Template:', 'ihc');?>
				<select name="ihc_register_lite_template" id="ihc_register_lite_template">
					<?php
						foreach ($templates as $k=>$v){
						?>
							<option value="<?php echo $k;?>" <?php if ($k==$data['metas']['ihc_register_lite_template']){
								 echo 'selected';
							}
							?>
							>
								<?php echo $v;?>
							</option>
						<?php
						}
						?>
				</select>
			</div>

			<div class="iump-form-line">
				<h2><?php esc_html_e('WP Role', 'ihc');?></h2>
				<div><strong><?php esc_html_e('Predefined Wordpress Role Assign to new Users:', 'ihc');?></strong></div>
					<select name="ihc_register_lite_user_role">
					<?php
						$roles = ihc_get_wp_roles_list();
						if ($roles){
							foreach ($roles as $k=>$v){
								$selected = ($data['metas']['ihc_register_lite_user_role']==$k) ? 'selected' : '';
								?>
									<option value="<?php echo $k;?>" <?php echo $selected;?> ><?php echo $v;?></option>
								<?php
							}
						}
					?>
					</select>
					<p><?php esc_html_e('If the "Pending" role is set, the user will not able to login until the admin manually approves it.', 'ihc');?></p>
			</div>
						<div class="iump-form-line">
							<h2><?php esc_html_e('Opt-In Subscription', 'ihc');?></h2>

								<label class="iump_label_shiwtch ihc-switch-button-margin">
									<?php $checked = ($data['metas']['ihc_register_lite_opt_in']) ? 'checked' : '';?>
									<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_register_lite_opt_in');" <?php echo $checked;?> />
									<div class="switch ihc-display-inline"></div>
								</label>
								<input type="hidden" name="ihc_register_lite_opt_in" value="<?php echo $data['metas']['ihc_register_lite_opt_in'];?>" id="ihc_register_lite_opt_in" />
								<?php esc_html_e('Enable Opt-In', 'ihc');?>
								<div>
								<div><strong><?php esc_html_e('Opt-In Destination:', 'ihc');?></strong></div>
                                <select name="ihc_register_lite_opt_in_type">
                                    <?php
                                        $subscribe_types = array(
                                                                    'active_campaign' => 'Active Campaign',
                                                                    'aweber' => 'AWeber',
                                                                    'campaign_monitor' => 'CampaignMonitor',
                                                                    'constant_contact' => 'Constant Contact',
                                                                    'email_list' =>esc_html__('E-mail List', 'ihc'),
                                                                    'get_response' => 'GetResponse',
                                                                    'icontact' => 'IContact',
                                                                    'madmimi' => 'Mad Mimi',
                                                                    'mailchimp' => 'MailChimp',
                                                                    'mymail' => 'MyMail',
                                                                    'wysija' => 'Wysija',
                                                                 );
                                        foreach ($subscribe_types as $k=>$v){
                                            $selected = ($data['metas']['ihc_register_lite_opt_in_type']==$k) ? 'selected' : '';
                                            ?>
                                                <option value="<?php echo $k;?>" <?php echo $selected;?> ><?php
                                                	echo $v;
                                                ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
							</div>
							<p><?php esc_html_e('The user email address is sent to your OptIn destination.', 'ihc');?></p>
						</div>
						<div class="iump-form-line">
							<h2><?php esc_html_e('Double Email Verification', 'ihc');?></h2>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
									<?php $checked = ($data['metas']['ihc_register_lite_double_email_verification']) ? 'checked' : '';?>
									<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_register_lite_double_email_verification');" <?php echo $checked;?> />
									<div class="switch ihc-display-inline"></div>
								</label>
								<input type="hidden" name="ihc_register_lite_double_email_verification" value="<?php echo $data['metas']['ihc_register_lite_double_email_verification'];?>" id="ihc_register_lite_double_email_verification" />
								<?php esc_html_e('Double E-mail Verification', 'ihc');?>

							<p><?php esc_html_e('Be sure that your notifications for Double Email Verification are properly set up. Make sure to check the settings from the ', 'ihc');?> <a href="admin.php?page=ihc_manage&tab=general&subtab=double_email_verification" target="_blank"><?php esc_html_e('General Options', 'ihc');?></a><?php esc_html_e(' tab.', 'ihc');?></p>
						</div>

			<div>
				<label class="iump_label_shiwtch ihc-switch-button-margin">
					<?php $checked = ($data['metas']['ihc_register_lite_auto_login']) ? 'checked' : '';?>
					<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_register_lite_auto_login');" <?php echo $checked;?> />
					<div class="switch ihc-display-inline"></div>
				</label>
				<input type="hidden" name="ihc_register_lite_auto_login" value="<?php echo $data['metas']['ihc_register_lite_auto_login'];?>" id="ihc_register_lite_auto_login" />
				<?php esc_html_e('Auto Login after Registration', 'ihc');?>
			</div>

			<div class="iump-form-line">
				<h2><?php esc_html_e('Custom Redirect:', 'ihc');?></h2>
				<div class="iump-form-line">
					<select name="ihc_register_lite_redirect">
						<?php foreach ($pages_arr as $post_id=>$title):?>
							<?php $selected = ($data['metas']['ihc_register_lite_redirect']==$post_id) ? 'selected' : '';?>
							<option value="<?php echo $post_id;?>" <?php echo $selected;?> ><?php echo $title;?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="iump-form-line">
				<h2><?php esc_html_e('Custom CSS', 'ihc');?></h2>
				<textarea name="ihc_register_lite_custom_css" class="ihc-custom-css-box"><?php echo stripslashes($data['metas']['ihc_register_lite_custom_css']);?></textarea>
			</div>



			<h2><?php esc_html_e('Shortcode: ', 'ihc');?> </h2>
			<div class="ihc-user-list-shortcode-wrapp">
				<div class="content-shortcode">
					<span class="the-shortcode">[ihc-register-lite]</span>
				</div>
			</div>


			<div class="ihc-submit-form">
				<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
			</div>

		</div>
	</div>
</form>
</div>
