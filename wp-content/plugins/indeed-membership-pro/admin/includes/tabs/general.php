<div class="ihc-subtab-menu">
	<a class="ihc-subtab-menu-item <?php echo ((isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='defaults')) || (!isset($_REQUEST['subtab']))) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=defaults';?>"><?php esc_html_e('Defaults Settings', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='captcha')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=captcha';?>"><?php esc_html_e('reCaptcha Setup', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='msg')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=msg';?>"><?php esc_html_e('Custom Messages', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='menus')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=menus';?>"><?php esc_html_e('Restrict WP Menu', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='pay_settings')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=pay_settings';?>"><?php esc_html_e('Payment Settings', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='notifications')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=notifications';?>"><?php esc_html_e('Notifications Settings', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='double_email_verification')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=double_email_verification';?>"><?php esc_html_e('Double Email Verification', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='access')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=access';?>"><?php esc_html_e('WP Dashboard Access', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='extra_settings')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=extra_settings';?>"><?php esc_html_e('Uploads Settings', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='admin_workflow')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=admin_workflow';?>"><?php esc_html_e('Admin Workflow', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='public_workflow')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=public_workflow';?>"><?php esc_html_e('Public Workflow', 'ihc');?></a>
	<a class="ihc-subtab-menu-item <?php echo (isset($_REQUEST['subtab']) && ($_REQUEST['subtab'] =='security')) ? 'ihc-subtab-selected' : '';?>" href="<?php echo $url.'&tab='.$tab.'&subtab=security';?>"><?php esc_html_e('Security', 'ihc');?></a>
	<div class="ihc-clear"></div>
</div>
<?php
echo ihc_inside_dashboard_error_license();
$pages = ihc_get_all_pages();//getting pages

$subtab = 'defaults';
if (isset($_REQUEST['subtab'])){
	 $subtab = $_REQUEST['subtab'];
}

switch ($subtab){
	case 'defaults':
		//ihc_save_update_metas('general-defaults');//save update metas
		if (!empty($_POST['ihc_save']) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				//save
				ihc_save_update_metas_general_defaults($_POST);
		}
		$meta_arr = ihc_return_meta_arr('general-defaults');//getting metas

		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
			<form  method="post">

				<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Default Ultimate Membership Pro Pages', 'ihc');?></h3>
					<div class="inside">

						<div class="iump-form-line">
							<h4><?php esc_html_e('Register Page', 'ihc');?></h4>
							<select name="ihc_general_register_default_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_register_default_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_register_default_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_register_default_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('Subscription Plan Page', 'ihc');?></h4>
							<select name="ihc_subscription_plan_page"  class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_subscription_plan_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_subscription_plan_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_subscription_plan_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('Login Page', 'ihc');?></h4>
							<select name="ihc_general_login_default_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_login_default_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_login_default_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_login_default_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('Logout Page', 'ihc');?></h4>
							<select name="ihc_general_logout_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_logout_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_logout_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_logout_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('User Account Page', 'ihc');?></h4>
							<select name="ihc_general_user_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_user_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_user_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_user_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('TOS Page', 'ihc');?></h4>
							<select name="ihc_general_tos_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_tos_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_tos_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_tos_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('Lost Password Page', 'ihc');?></h4>
							<select name="ihc_general_lost_pass_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_lost_pass_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_lost_pass_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_lost_pass_page']);?>
						</div>

						<div class="iump-form-line">
							<h4><?php esc_html_e('Public Individual user Page', 'ihc');?></h4>
							<select name="ihc_general_register_view_user" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_register_view_user']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_register_view_user']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_register_view_user']);?>
						</div>

						<div class="ihc-wrapp-submit-bttn">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

<?php $pages_arr = $pages + ihc_get_redirect_links_as_arr_for_select();?>
				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Default Redirects', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Default Redirect Page:', 'ihc');?></span>
							<select name="ihc_general_redirect_default_page" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if ($meta_arr['ihc_general_redirect_default_page']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages_arr){
										foreach ($pages_arr as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_redirect_default_page']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_redirect_default_page']);?>
						</div>

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('After LogOut:', 'ihc');?></span>
							<select name="ihc_general_logout_redirect" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_logout_redirect']==-1)echo 'selected';?> ><?php esc_html_e('Do Not Redirect', 'ihc');?></option>
								<?php
									if ($pages_arr){
										foreach ($pages_arr as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_logout_redirect']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_logout_redirect']);?>
						</div>

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('After Registration:', 'ihc');?></span>
							<select name="ihc_general_register_redirect" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_register_redirect']==-1)echo 'selected';?> ><?php esc_html_e('Do Not Redirect', 'ihc');?></option>
								<?php
									if ($pages_arr){
										foreach ($pages_arr as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_register_redirect']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_register_redirect']);?>
							<div><?php esc_html_e("Except if Bank Transfer Payment it's used.", 'ihc');?></div>
						</div>

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('After Login:', 'ihc');?></span>
							<select name="ihc_general_login_redirect" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_login_redirect']==-1)echo 'selected';?> ><?php esc_html_e('Do Not Redirect', 'ihc');?></option>
								<?php
									if ($pages_arr){
										foreach ($pages_arr as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_login_redirect']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_login_redirect']);?>
						</div>

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('After Password Reset:', 'ihc');?></span>
							<select name="ihc_general_password_redirect" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select">
								<option value="-1" <?php if($meta_arr['ihc_general_password_redirect']==-1)echo 'selected';?> ><?php esc_html_e('-', 'ihc');?></option>
								<?php
									if ($pages_arr){
										foreach ($pages_arr as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_general_password_redirect']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
							<?php echo ihc_general_options_print_page_links($meta_arr['ihc_general_password_redirect']);?>
						</div>

						<div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>
			</form>
		<?php
	break;
	case 'captcha':
		if (!empty($_POST['ihc_save']) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('general-captcha');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('general-captcha');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		if ( empty( $meta_arr['ihc_recaptcha_version'] ) ){
				$meta_arr['ihc_recaptcha_version'] = 'v2';
		}
		?>
					<form  method="post">

						<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

						<div class="ihc-stuffbox">
							<h3>ReCaptcha</h3>
							<div class="inside">
								<div>
									<?php esc_html_e('Recaptcha version:', 'ihc');?>
									<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select js-ihc-change-recaptcha-version" name="ihc_recaptcha_version" >
												<option value="v2" <?php if ( $meta_arr['ihc_recaptcha_version'] == 'v2' ) echo 'selected';?> ><?php esc_html_e( 'reCAPTCHA v2', 'ihc');?></option>
												<option value="v3" <?php if ( $meta_arr['ihc_recaptcha_version'] == 'v3' ) echo 'selected';?> ><?php esc_html_e( 'reCAPTCHA v3', 'ihc');?></option>
									</select>
								</div>

								<div class="js-ihc-recaptcha-v2-wrapp <?php if ( $meta_arr['ihc_recaptcha_version'] == 'v3' ) echo 'ihc-display-none';?>" >
                                	<div class="iump-form-line">
										<h4><?php esc_html_e( 'reCAPTCHA v2', 'ihc');?></h4>
										<div class="input-group ihc-gen-captcha-input">
											<span class="input-group-addon"><?php esc_html_e('SITE KEY:', 'ihc');?></span>
                                            <input type="text" name="ihc_recaptcha_public" value="<?php echo $meta_arr['ihc_recaptcha_public'];?>" class="form-control ihc-deashboard-middle-text-input" />
										</div>
										<div class="input-group ihc-gen-captcha-input">
											<span class="input-group-addon"><?php esc_html_e('SECRET KEY:', 'ihc');?></span>
                                            <input type="text" name="ihc_recaptcha_private" value="<?php echo $meta_arr['ihc_recaptcha_private'];?>" class="form-control ihc-deashboard-middle-text-input" />
										</div>
										<div>
											<p><strong><?php esc_html_e('How to setup:', 'ihc');?></strong></p>
                                            <p>	<?php esc_html_e('1. Get Public and Private Keys from', 'ihc');?> <a href="https://www.google.com/recaptcha/admin#list" target="_blank"><?php esc_html_e('here', 'ihc');?></a>.</p>
                                            <p>	<?php esc_html_e('2. Click on "Create" button.', 'ihc');?></p>
                                            <p>	<?php esc_html_e('3. Choose "reCAPTCHA v2" with "Im not a robot" Checkbox.', 'ihc');?></p>
                                            <p>	<?php esc_html_e('4. Add curent WP website main domain', 'ihc');?></p>
                                            <p> <?php esc_html_e('5. Accept terms and conditions and Submit', 'ihc');?></p>
										</div>
                                     </div>
								</div>

								<div class="js-ihc-recaptcha-v3-wrapp <?php if ( $meta_arr['ihc_recaptcha_version'] == 'v2' ) echo 'ihc-display-none';?> ">
                                <div class="iump-form-line">
										<h4><?php esc_html_e( 'reCAPTCHA v3', 'ihc');?></h4>
										<div class="input-group ihc-gen-captcha-input">
											<span class="input-group-addon"><?php esc_html_e('SITE KEY:', 'ihc');?></span>
                                            <input type="text" name="ihc_recaptcha_public_v3" value="<?php echo $meta_arr['ihc_recaptcha_public_v3'];?>" class="form-control ihc-deashboard-middle-text-input"/>
										</div>
										<div class="input-group ihc-gen-captcha-input">
											<span class="input-group-addon"><?php esc_html_e('SECRET KEY:', 'ihc');?></span>
                                            <input type="text" name="ihc_recaptcha_private_v3" value="<?php echo $meta_arr['ihc_recaptcha_private_v3'];?>" class="form-control ihc-deashboard-middle-text-input" />
										</div>
										<div>
                                        	<p><strong><?php esc_html_e('How to setup:', 'ihc');?></strong></p>
											<p> <?php esc_html_e('1. Get Public and Private Keys from', 'ihc');?> <a href="https://www.google.com/recaptcha/admin#list" target="_blank"><?php esc_html_e('here', 'ihc');?></a>.</p>
                                            <p>	<?php esc_html_e('2. Click on "Create" button.', 'ihc');?></p>
                                            <p>	<?php esc_html_e('3. Choose "reCAPTCHA v3".', 'ihc');?></p>
                                            <p>	<?php esc_html_e('4. Add curent WP website main domain', 'ihc');?></p>
                                            <p> <?php esc_html_e('5. Accept terms and conditions and Submit', 'ihc');?></p>
										</div>
                                  </div>
								</div>

								<div>
									<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" onClick="" class="button button-primary button-large" />
								</div>
							</div>
						</div>
					</form>
				<?php
	break;
	case 'msg':
		if (!empty($_POST['ihc_save']) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('general-msg');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('general-msg');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
					<form  method="post">

						<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

						<div class="ihc-stuffbox">
							<h3><?php esc_html_e('Custom Messages', 'ihc');?></h3>
							<div class="inside">
								<div>
									<div class="iump-labels-special"><?php esc_html_e('Update Successfully Message:', 'ihc');?></div>
									<textarea name="ihc_general_update_msg" class="ihc-dashboard-textarea"><?php echo ihc_correct_text($meta_arr['ihc_general_update_msg']);?></textarea>
								</div>

								<div>
									<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
								</div>
							</div>
						</div>
					</form>
				<?php
	break;
	case 'menus':
		$nav_menus = wp_get_nav_menus();
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Restrict WP Menu links', 'ihc');?></h3>
				<div class="inside">
					<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select ihc-gen-menu-select ihc-js-admin-restrict-wp-menu-links" name="menu_id" data-url="<?php echo $url.'&tab='.$tab.'&subtab=menus&menu_id=';?>" >
						<option value="0"><?php esc_html_e('Select a Menu', 'ihc');?></option>
						<?php foreach ( $nav_menus as $menu ){ ?>
							<?php $selected = (!empty($_GET['menu_id']) && $_GET['menu_id']==$menu->term_id) ? 'selected' : ''; ?>
							<option <?php echo $selected; ?> value="<?php echo $menu->term_id; ?>">
								<?php echo wp_html_excerpt( $menu->name, 40, '&hellip;' ); ?>
							</option>
						<?php } ?>
					</select>
					<div>
						<?php
							if (!empty($_GET['menu_id'])){
								///update
								if (!empty($_POST['ihc_save']) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
									foreach ($_POST['db_menu_id'] as $v){
										if (isset($_POST['ihc_mb_who_menu_type-'.$v]) && isset($_POST['ihc_menu_mb_type-'.$v])){
											update_post_meta( $v, 'ihc_mb_who_menu_type', $_POST['ihc_mb_who_menu_type-'.$v]);
											update_post_meta( $v, 'ihc_menu_mb_type', $_POST['ihc_menu_mb_type-'.$v]);
										}
									}
								}

								///list
								$menu_items = wp_get_nav_menu_items( $_GET['menu_id'], array( 'post_status' => 'any' ) );
								foreach ($menu_items as $obj){
									?>
									<div class="ihc-gen-menu-wrap">
										<div class="ihc-menu-page">
											"<?php echo $obj->title;?>" <span><?php esc_html_e('link', 'ihc');?></span>
										</div>
										<input type="hidden" name="db_menu_id[]" value="<?php echo $obj->ID;?>" />
										<div class="ihc-class ihc-padding">
											<select class="ihc-select ihc-men-select" name="ihc_menu_mb_type-<?php echo $obj->ID; ?>">
												<option value="block" <?php if ($obj->ihc_menu_mb_type=='block')echo 'selected';?> ><?php esc_html_e('Block Menu Item Only', 'ihc');?></option>
												<option value="show" <?php if ($obj->ihc_menu_mb_type=='show')echo 'selected';?> ><?php esc_html_e('Show Menu Item Only', 'ihc');?></option>
											</select>
										</div>
										<div  class="ihc-padding">
											<label class="ihc-bold ihc-display-block"><?php esc_html_e('for:', 'ihc');?></label>
											<?php
												$posible_values = array('all'=>esc_html__('All', 'ihc'), 'reg'=>esc_html__('Registered Users', 'ihc'), 'unreg'=>esc_html__('Unregistered Users', 'ihc') );

												$levels = \Indeed\Ihc\Db\Memberships::getAll();
												if ($levels){
													foreach ($levels as $id => $level){
														$posible_values[$id] = $level['name'];
													}
												}
												?>
												<select onChange="ihcWriteTagValue(this, '#ihc_mb_who_hidden-<?php echo $obj->ID;?>', '#ihc_tags_field-<?php echo $obj->ID;?>', '<?php echo $obj->ID;?>_ihc_select_tag_' );">
													<option value="-1" selected>...</option>
													<?php
														foreach($posible_values as $k=>$v){
															?>
															<option value="<?php echo $k;?>"><?php echo $v;?></option>
															<?php
														}
													?>
												</select>
										</div>
										<div id="ihc_tags_field-<?php echo $obj->ID;?>">
							            	<?php

							                    if ($obj->ihc_mb_who_menu_type){
							                    	if (!empty($values)) unset($values);
							                    	if (strpos($obj->ihc_mb_who_menu_type, ',')!==FALSE){
							                    		$values = explode(',', $obj->ihc_mb_who_menu_type);
							                    	} else {
							                        	$values[] = $obj->ihc_mb_who_menu_type;
							                        }
							                        foreach ($values as $value) { ?>
							                        	<div id="<?php echo $obj->ID;?>_ihc_select_tag_<?php echo $value;?>" class="ihc-tag-item">
							                        		<?php echo $posible_values[$value];?>
							                        		<div class="ihc-remove-tag" onclick="ihcremoveTag('<?php echo $value;?>', '#<?php echo $obj->ID;?>_ihc_select_tag_', '#ihc_mb_who_hidden-<?php echo $obj->ID;?>');" title="<?php esc_html_e('Removing tag', 'ihc');?>">x</div>
							                        	</div>
							                            <?php
							                        }//end of foreach ?>
							                    <div class="ihc-clear"></div>
							                    <?php }//end of if ?>

										</div>
										<div class="ihc-clear"></div>
										<input type="hidden" id="ihc_mb_who_hidden-<?php echo $obj->ID;?>" name="ihc_mb_who_menu_type-<?php echo $obj->ID; ?>" value="<?php echo $obj->ihc_mb_who_menu_type;?>" />
										<div class="clear"></div>
									</div>

									<?php
								}
							}
						?>
					</div>

					<div  class="ihc-submit-button-wrapper">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>
		</form>
		<?php
	break;

	case 'extra_settings':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('extra_settings');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('extra_settings');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
			<form  method="post">

				<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

				<div class="ihc-stuffbox">
					<h3> <?php esc_html_e("Upload File Accepted Extensions:", 'ihc');?></h3>
					<div class="inside">
						<textarea name="ihc_upload_extensions" class="ihc-gen-limited-widh"><?php echo $meta_arr['ihc_upload_extensions'];?></textarea>
						<div><?php  esc_html_e("Write the extensions with comma between values! ex: pdf,jpg,mp3");?></div>
						<div class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3> <?php esc_html_e("Upload File Maximum File Size:", 'ihc');?></h3>
					<div class="inside">
						<input type="number" value="<?php echo $meta_arr['ihc_upload_max_size'];?>" name="ihc_upload_max_size" min="0.1" step="0.1" /> MB
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3> <?php esc_html_e("Avatar Maximum File Size:", 'ihc');?></h3>
					<div class="inside">
						<input type="number" value="<?php echo $meta_arr['ihc_avatar_max_size'];?>" name="ihc_avatar_max_size" min="0.1" step="0.1" /> MB
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

			</form>
		<?php
	break;
	case 'notifications':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('notifications');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('notifications');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Notifications Settings', 'ihc');?></h3>
				<div class="inside">
					<div>
						<div class="iump-labels-special"><?php esc_html_e("'From' E-mail Address:", 'ihc');?></div>
						<input type="text" name="ihc_notification_email_from" value="<?php echo $meta_arr['ihc_notification_email_from'];?>"  class="ihc-gen-limited-widh"/>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("'From' Name:", 'ihc');?></div>
						<input type="text" name="ihc_notification_name" value="<?php echo $meta_arr['ihc_notification_name'];?>"  class="ihc-gen-limited-widh"/>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("'Before Expire' Time Interval:", 'ihc');?></div>
						<input type="number" min="1" name="ihc_notification_before_time" value="<?php echo $meta_arr['ihc_notification_before_time'];?>"  class="ihc-gen-limited-widh"/> <?php esc_html_e("Days", 'ihc');?>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("Second 'Before Expire' Time Interval:", 'ihc');?></div>
						<input type="number" min="1" name="ihc_notification_before_time_second" value="<?php echo $meta_arr['ihc_notification_before_time_second'];?>"  class="ihc-gen-limited-widh"/> <?php esc_html_e("Days", 'ihc');?>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("Third 'Before Expire' Time Interval:", 'ihc');?></div>
						<input type="number" min="1" name="ihc_notification_before_time_third" value="<?php echo $meta_arr['ihc_notification_before_time_third'];?>"  class="ihc-gen-limited-widh"/> <?php esc_html_e("Days", 'ihc');?>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("'Payment Due' Time Interval:", 'ihc');?></div>
						<input type="number" min="1" name="ihc_notification_payment_due_time_interval" value="<?php echo $meta_arr['ihc_notification_payment_due_time_interval'];?>"  class="ihc-gen-limited-widh"/> <?php esc_html_e("Days", 'ihc');?>
					</div>
					<div>
						<div class="iump-labels-special"><?php esc_html_e("Admin E-mail Address:", 'ihc');?></div>
						<input type="text" name="ihc_notification_email_addresses" value="<?php echo $meta_arr['ihc_notification_email_addresses'];?>"  class="ihc-gen-limited-widh"/>
						<p><?php esc_html_e("Set multiple Email addresses separated by comma.", 'ihc');?></p>
					</div>
					<div>
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>
		</form>
		<?php
	break;
	case 'pay_settings':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('payment');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('payment');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Currency Settings', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_currency">
							<?php
								$currency_arr = ihc_get_currencies_list('all');
								$custom_currencies = ihc_get_currencies_list('custom');
								foreach ($currency_arr as $k=>$v){
									?>
									<option value="<?php echo $k?>" <?php if ($k==$meta_arr['ihc_currency']) echo 'selected';?> >
										<?php echo $v;?>
										<?php if (is_array($custom_currencies) && in_array($v, $custom_currencies))  esc_html_e(" (Custom Currency)");?>
									</option>
									<?php
								}
							?>
						</select>
						<p ><?php esc_html_e('Check which payment service supports the next currency and deactivate the other payment services.', 'ihc');?></p>
						<p><?php esc_html_e('You can add new currencies from', 'ihc');?> <a href="<?php echo admin_url('admin.php?page=ihc_manage&tab=custom_currencies');?>"><?php esc_html_e('here', 'ihc');?></a></p>
					</div>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Currency Custom Code', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<input type="text" name="ihc_custom_currency_code" value="<?php echo $meta_arr['ihc_custom_currency_code'];?>" />
					</div>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Currency Position', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_currency_position">
							<?php
								$position = array('left' => esc_html__('Left', 'ihc'), 'right' => esc_html__('Right', 'ihc'));
								foreach ($position as $k=>$v){
									?>
									<option value="<?php echo $k?>" <?php if ($k==$meta_arr['ihc_currency_position']) echo 'selected';?> >
										<?php echo $v;?>
									</option>
									<?php
								}
							?>
						</select>
						<p ><?php esc_html_e('Currency will be placed before (left) price number or after (right).', 'ihc');?></p>
					</div>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Separators', 'ihc');?></h3>
					<div class="inside">
							<div class="iump-form-line">
									<label><?php esc_html_e( 'Thousands Separator', 'ihc' );?></label>
									<input type="text" name="ihc_thousands_separator" value="<?php echo $meta_arr['ihc_thousands_separator'];?>" />
							</div>
							<div class="iump-form-line">
									<label><?php esc_html_e( 'Decimals Separator', 'ihc' );?></label>
									<input type="text" name="ihc_decimals_separator" value="<?php echo $meta_arr['ihc_decimals_separator'];?>" />
							</div>
							<div class="iump-form-line">
									<label><?php esc_html_e( 'Number of Decimals', 'ihc' );?></label>
									<input type="text" name="ihc_num_of_decimals" value="<?php echo $meta_arr['ihc_num_of_decimals'];?>" />
							</div>
							<div class="ihc-wrapp-submit-bttn iump-submit-form">
									<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
							</div>
					</div>
			</div>


			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Default Payment Gateway', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_payment_selected">
							<?php
								$payment_arr = ihc_list_all_payments();
								foreach($payment_arr as $k=>$v){

									$active = (ihc_check_payment_available($k)) ? esc_html__('Active', 'ihc') : esc_html__('Inactive', 'ihc');
									?>
									<option value="<?php echo $k?>" <?php if ($k==$meta_arr['ihc_payment_selected']) echo 'selected';?> >
										<?php echo $v . ' - ' . $active;?>
									</option>
									<?php
								}
							?>
						</select>
						<div class="ihc-dashboard-inform-message"><?php esc_html_e('When no multi-payment activated or no payment selected or required.');?></div>
						<div class="ihc-dangerbox"><?php esc_html_e("Be sure that your selected Payment Gateway it's activated and properly set!");?></div>
					</div>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<?php
				if (!empty($_GET['do_cleanup_logs']) && !empty($_GET['older_then'])){
					$older_then = $_GET['older_then'] * 24 * 60 * 60;
					$older_then = indeed_get_unixtimestamp_with_timezone() - $older_then;
					Ihc_User_Logs::delete_logs('payments', $older_then);
				}
			?>
			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Payment Logs', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<?php $checked = ($meta_arr['ihc_payment_logs_on']) ? 'checked' : '';?>
						<label class="iump_label_shiwtch ihc-switch-button-margin">
							<input type="checkbox" class="iump-switch" onclick="iumpCheckAndH(this, '#ihc_payment_logs_on');" <?php echo $checked;?> />
							<div class="switch ihc-display-inline"></div>
						</label>
						<input type="hidden" name="ihc_payment_logs_on" id="ihc_payment_logs_on" value="<?php echo $meta_arr['ihc_payment_logs_on'];?>" />
						<?php esc_html_e('Save Payment Logs into Database', 'ihc');?>
					</div>
					<?php $we_have_logs = Ihc_User_Logs::get_count_logs('payments');?>
					<?php if ($we_have_logs):?>
						<div class="iump-form-line">
							<?php esc_html_e('Clean Up Payment logs older then:', 'ihc');?>
							<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " id="older_then_select">
								<option value="">...</option>
								<option value="1"><?php esc_html_e('One Day', 'ihc');?></option>
								<option value="7"><?php esc_html_e('One Week', 'ihc');?></option>
								<option value="30"><?php esc_html_e('One Month', 'ihc');?></option>
							</select>
							<div class="button button-primary button-large" onClick="ihcDoCleanUpLogs('<?php echo admin_url('admin.php?page=ihc_manage&tab=general&subtab=pay_settings');?>');"><?php esc_html_e('Clean Up', 'ihc');?></div>
						</div>
						<div class="iump-form-line">
							<a href="<?php echo admin_url('admin.php?page=ihc_manage&tab=view_user_logs&type=payments');?>" target="_blank"><?php esc_html_e('View Logs', 'ihc');?></a>
						</div>
					<?php endif;?>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<div class="ihc-stuffbox ihc-display-none">
				<h3><?php esc_html_e('Payment Workflow', 'ihc');?></h3>
				<div class="inside">

						<?php
								if ( !isset( $meta_arr['ihc_payment_workflow'] ) || $meta_arr['ihc_payment_workflow'] == '' ){
										$meta_arr['ihc_payment_workflow'] = 'new';
								}
						?>
						<div class="iump-form-line">
							<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_payment_workflow" >
								<option value="standard" <?php if ( $meta_arr['ihc_payment_workflow'] == 'standard' ) echo 'selected';?> ><?php esc_html_e('Standard', 'ihc');?></option>
								<option value="new" <?php if ( $meta_arr['ihc_payment_workflow'] == 'new' ) echo 'selected';?> ><?php esc_html_e('New Integration', 'ihc');?></option>
							</select>
						</div>

					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

			<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Merchant Business Address', 'ihc');?></h3>
						<div class="iump-form-line">
						<div class="row">
						<div class="col-xs-4">
							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e('Business Name:', 'ihc');?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_name" value="<?php echo $meta_arr['ihc_payment_merchant_business_name'];?>" />
							</div>
							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e( 'Address Line 1:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_address_1" value="<?php echo $meta_arr['ihc_payment_merchant_business_address_1'];?>" />
							</div>
							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e( 'Address Line 2:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_address_2" value="<?php echo $meta_arr['ihc_payment_merchant_business_address_2'];?>" />
							</div>

							<div class="iump-form-line iump-no-border">

									<?php $countries = ihc_get_countries();?>
									<select name="ihc_payment_merchant_business_country" class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select ihc-gen-default-country">
									<?php foreach ( $countries as $key => $value ):?>
											<option value="<?php echo $key;?>" <?php echo ( $key == $meta_arr['ihc_payment_merchant_business_country'] ) ? 'selected' : '';?> ><?php echo $value;?></option>
									<?php endforeach;?>
									</select>
							</div>

							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e( 'State:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_state" value="<?php echo $meta_arr['ihc_payment_merchant_business_state'];?>" />
							</div>

							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e( 'City:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_city" value="<?php echo $meta_arr['ihc_payment_merchant_business_city'];?>" />
							</div>

							<div class="iump-form-line iump-no-border input-group">
								<span class="input-group-addon">	<?php esc_html_e( 'Postcode:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_postcode" value="<?php echo $meta_arr['ihc_payment_merchant_business_postcode'];?>" />
							</div>

							<div class="iump-form-line iump-no-border input-group">
									<span class="input-group-addon"><?php esc_html_e( 'VAT No.:', 'ihc' );?></span>
									<input type="text" class="form-control" name="ihc_payment_merchant_business_vat" value="<?php echo $meta_arr['ihc_payment_merchant_business_vat'];?>" />
							</div>
					 </div>
				 </div>
					</div>

					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>

			</div>

		</form>
		<?php
	break;

		case 'double_email_verification':
			if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
					ihc_save_update_metas('double_email_verification');//save update metas
			}

			$meta_arr = ihc_return_meta_arr('double_email_verification');//getting metas
			echo ihc_check_default_pages_set();//set default pages message
			echo ihc_check_payment_gateways();
			echo ihc_is_curl_enable();
			do_action( "ihc_admin_dashboard_after_top_menu" );
			$pages = $pages + ihc_get_redirect_links_as_arr_for_select();
			?>
			<form  method="post">

				<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Double Email Verification', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<label class="iump-labels-special"><?php esc_html_e('Activation Link Expire Time:', 'ihc');?></label>
							<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_double_email_expire_time">
								<?php
									$arr = array(
															'-1' => 'Never',
															'900' => '15 Minutes',
															'3600' => '1 Hour',
															'43200' => '12 Hours',
															'86400' => '1 Day',
															);
									foreach ($arr as $k=>$v){
										?>
										<option value="<?php echo $k?>" <?php if ($k==$meta_arr['ihc_double_email_expire_time']) echo 'selected';?> >
											<?php echo $v;?>
										</option>
										<?php
									}
								?>
							</select>
						</div>

						<div class="iump-form-line">
							<label class="iump-labels-special"><?php esc_html_e('Success Redirect:', 'ihc');?></label>
							<select  class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_double_email_redirect_success">
								<option value="-1" <?php if($meta_arr['ihc_double_email_redirect_success']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_double_email_redirect_success']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
						</div>

						<div class="iump-form-line">
							<label class="iump-labels-special"><?php esc_html_e('Error Redirect:', 'ihc');?></label>
							<select  class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_double_email_redirect_error">
								<option value="-1" <?php if($meta_arr['ihc_double_email_redirect_error']==-1)echo 'selected';?> >...</option>
								<?php
									if ($pages){
										foreach ($pages as $k=>$v){
											?>
												<option value="<?php echo $k;?>" <?php if($meta_arr['ihc_double_email_redirect_error']==$k)echo 'selected';?> ><?php echo $v;?></option>
											<?php
										}
									}
								?>
							</select>
						</div>

						<div class="iump-form-line">
							<label class="iump-labels-special"><?php esc_html_e('Delete User if is not verified:', 'ihc');?></label>
							<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_double_email_delete_user_not_verified">
								<?php
									$arr = array(
															'-1' => 'Never',
															'1' => 'After 1 day',
															'7' => 'After 7 days',
															'14' => 'After 14 days',
															'30' => 'After 30 days',
															);
									foreach ($arr as $k=>$v){
										?>
										<option value="<?php echo $k?>" <?php if ($k==$meta_arr['ihc_double_email_delete_user_not_verified']) echo 'selected';?> >
											<?php echo $v;?>
										</option>
										<?php
									}
								?>
							</select>
						</div>

						<div class="ihc-wrapp-submit-bttn iump-submit-form">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>
			</form>
			<?php
			break;
	case 'access':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				update_option('ihc_dashboard_allowed_roles', $_POST['ihc_dashboard_allowed_roles']);
		}

		$meta_value = get_option('ihc_dashboard_allowed_roles');
		$meta_values = (empty($meta_value)) ? array() : explode(',', $meta_value);
		?>
		<div class="iump-page-title">Ultimate Membership Pro -
			<span class="second-text">
				<?php esc_html_e('WP Admin Dashboard Access', 'ihc');?>
			</span>
		</div>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Enable access for specific WP Roles', 'ihc');?></h3>
				<div class="inside">
					<div class="ihc-gen-wprole-sec">
						<div class="iump-form-line ihc-gen-opacity">
							<span class="ihc-gen-span-st"><?php esc_html_e('Administrator', 'ihc');?></span>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<input type="checkbox" class="iump-switch" checked disabled/>
								<div class="switch ihc-display-inline"></div>
							</label>
						</div>
						<?php
							$roles = get_editable_roles();
							if (!empty($roles['administrator'])){
								unset($roles['administrator']);
							}
							if (!empty($roles['pending_user'])){
								unset($roles['pending_user']);
							}
							$count = count($roles) + 1;
							$break = ceil($count/2);
							$i = 1;
							foreach ($roles as $role=>$arr){
								?>
									<div class="iump-form-line">
										<span class="ihc-gen-span-st"><?php echo $arr['name'];?></span>
										<label class="iump_label_shiwtch ihc-switch-button-margin">
											<?php $checked = (in_array($role, $meta_values)) ? 'checked' : '';?>
											<input type="checkbox" class="iump-switch" onClick="ihcMakeInputhString(this, '<?php echo $role;?>', '#ihc_dashboard_allowed_roles');" <?php echo $checked;?>/>
											<div class="switch ihc-display-inline"></div>
										</label>
									</div>
								<?php
								$i++;
								if ($count>7 && $i==$break){
									?>
										</div>
										<div  class="ihc-gen-wprole-sec">
									<?php
								}
							}
						?>
					</div>
					<input type="hidden" name="ihc_dashboard_allowed_roles" id="ihc_dashboard_allowed_roles" value="<?php echo $meta_value;?>" />
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>
		</form>
		<?php
		break;
	case 'admin_workflow':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('admin_workflow');//save update metas
		}
		$meta_arr = ihc_return_meta_arr('admin_workflow');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

			<div class="ihc-stuffbox">
				<h3><?php esc_html_e('Show WP Admin bar Notifications', 'ihc');?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<div class="iump-form-line">

							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = ($meta_arr['ihc_admin_workflow_dashboard_notifications']) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_admin_workflow_dashboard_notifications');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_admin_workflow_dashboard_notifications" value="<?php echo $meta_arr['ihc_admin_workflow_dashboard_notifications'];?>" id="ihc_admin_workflow_dashboard_notifications" />
							<span class="ihc-gen-span-st"><?php esc_html_e('New Users & Orders', 'ihc');?></span>
						</div>
					</div>
					<div class="ihc-wrapp-submit-bttn iump-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>

				<div class="ihc-stuffbox ihc-display-none">
					<h3> <?php esc_html_e("Debugging Payment Data:", 'ihc');?></h3>
					<div class="inside">

						<input type="checkbox" onClick="iumpCheckAndH(this, '#ihc_debug_payments_db');" <?php if ($meta_arr['ihc_debug_payments_db']) echo 'checked';?> />
						<input type="hidden" value="<?php echo $meta_arr['ihc_debug_payments_db'];?>" name="ihc_debug_payments_db" id="ihc_debug_payments_db" />

						<div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Orders Settings', 'ihc');?></h3>
					<div class="inside">

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Order Invoice Prefix Code:', 'ihc');?></span>
							<input type="text" name="ihc_order_prefix_code" value="<?php echo (isset($meta_arr['ihc_order_prefix_code'])) ? $meta_arr['ihc_order_prefix_code'] : '';?>" />
						</div>

						<div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>


				<div class="ihc-stuffbox">
						<h3><?php esc_html_e('Unistall Settings', 'ihc');?></h3>
						<div class="inside">
								<div class="iump-form-line">

										<label class="iump_label_shiwtch ihc-switch-button-margin">
											<?php $checked = ($meta_arr['ihc_keep_data_after_delete']) ? 'checked' : '';?>
											<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_keep_data_after_delete');" <?php echo $checked;?> />
											<div class="switch ihc-display-inline"></div>
										</label>
										<input type="hidden" name="ihc_keep_data_after_delete" value="<?php echo $meta_arr['ihc_keep_data_after_delete'];?>" id="ihc_keep_data_after_delete" />
                                        <span class="ihc-gen-span-st"><?php esc_html_e('Keep data after delete plugin:', 'ihc');?></span>
								</div>
								<div>
										<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
								</div>
						</div>
				</div>

				<div class="ihc-stuffbox">
						<h3><?php esc_html_e('Custom WP Login page styling', 'ihc');?></h3>
						<div class="inside">
							<div class="iump-form-line">
								<span class="iump-labels-special"><?php esc_html_e('Enable UMP style', 'ihc');?></span>
									<?php $checked = ($meta_arr['ihc_wp_login_custom_css']) ? 'checked' : '';?>
									<label class="iump_label_shiwtch ihc-switch-button-margin">
										<input type="checkbox" class="iump-switch" onclick="iumpCheckAndH(this, '#ihc_wp_login_custom_css');" <?php echo $checked;?> />
										<div class="switch ihc-display-inline"></div>
									</label>
									<input type="hidden" name="ihc_wp_login_custom_css" id="ihc_wp_login_custom_css" value="<?php echo $meta_arr['ihc_wp_login_custom_css'];?>" />
							</div>

							<div class="iump-form-line">
									<span class="iump-labels-special"><?php esc_html_e('Logo image:', 'ihc');?></span>
									<input type="text" class="form-control ihc-gent-login-logo" onclick="openMediaUp( this, '#ihc_wp_login_logo_image' );" value="<?php echo $meta_arr['ihc_wp_login_logo_image'];?>" name="ihc_wp_login_logo_image" id="ihc_wp_login_logo_image">
									<i class="fa-ihc ihc-icon-remove-e ihc-js-admin-delete-logo-image" title="<?php esc_html_e( 'Remove logo', 'ihc' );?>"></i>
							</div>

							<div class="ihc-wrapp-submit-bttn">
								<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
							</div>
						</div>
				</div>

		</form>
		<?php
		break;
	case 'public_workflow':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('public_workflow');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('public_workflow');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Listing Pages/Posts', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Show hidden Pages/Posts Titles in listing:', 'ihc');?></span>

							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = ($meta_arr['ihc_listing_show_hidden_post_pages']) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_listing_show_hidden_post_pages');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_listing_show_hidden_post_pages" value="<?php echo $meta_arr['ihc_listing_show_hidden_post_pages'];?>" id="ihc_listing_show_hidden_post_pages" />

						</div>
						<div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>


				<div class="ihc-stuffbox" id="ihc_general_grace_period">
					<h3> <?php esc_html_e("Grace Subscription Period", 'ihc');?></h3>
					<div class="inside">
						<select class="iump-form-select ihc-form-element ihc-form-element-select ihc-form-select " name="ihc_grace_period"><?php
							for ($i=0;$i<365;$i++){
								$selected = ($meta_arr['ihc_grace_period']==$i) ? 'selected' : '';
								?>
									<option value="<?php echo $i;?>" <?php echo $selected;?>><?php echo $i . ' ' . esc_html__('Days', 'ihc');?></option>
								<?php
							}
						?></select>
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3> <?php esc_html_e("Avatar Settings", 'ihc');?></h3>
					<div class="inside">

						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Use Gravatar Image', 'ihc');?></span>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = ($meta_arr['ihc_use_gravatar']) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_use_gravatar');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_use_gravatar" value="<?php echo $meta_arr['ihc_use_gravatar'];?>" id="ihc_use_gravatar" />
						</div>

						<?php $display = (function_exists('bp_core_fetch_avatar')) ? 'ihc-display-block' : 'ihc-display-none';?>
						<div class="iump-form-line <?php echo $display;?>">
							<span class="iump-labels-special"><?php esc_html_e('Use BuddyPress Image', 'ihc');?></span>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = ($meta_arr['ihc_use_buddypress_avatar']) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_use_buddypress_avatar');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_use_buddypress_avatar" value="<?php echo $meta_arr['ihc_use_buddypress_avatar'];?>" id="ihc_use_buddypress_avatar" />
						</div>

						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>

					</div>
				</div>

                <div class="ihc-stuffbox">
					<h3> <?php esc_html_e("Email Address Black List", 'ihc');?></h3>

					<div class="inside">
                    	<p><?php esc_html_e("Will prevent visitors to Register with specified email address. All items must be separated by comma", 'ihc');?></p>
						<textarea name="ihc_email_blacklist" class="ihc_email_blacklist"><?php echo stripslashes($meta_arr['ihc_email_blacklist']);?></textarea>
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Default Country', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
								<?php
										wp_enqueue_style( 'ihc_select2_style' );
										wp_enqueue_script( 'ihc-select2' );
								?>

								<select name="ihc_default_country" >
										<?php $countries = ihc_get_countries();?>
										<?php foreach ( $countries as $key => $value ):?>
												<option value="<?php echo $key;?>" <?php if ( $meta_arr['ihc_default_country'] == $key ) echo 'selected';?> ><?php echo $value;?></option>
										<?php endforeach;?>
								</select>
								<ul id="ihc_countries_list_ul ihc-display-none"></ul>
						</div>
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

		</form>
		<?php
		break;
	case 'security':
		if ( isset( $_POST['ihc_save'] ) && !empty($_POST['ihc_admin_general_options_nonce']) && wp_verify_nonce( $_POST['ihc_admin_general_options_nonce'], 'ihc_admin_general_options_nonce' ) ){
				ihc_save_update_metas('security');//save update metas
		}

		$meta_arr = ihc_return_meta_arr('security');//getting metas
		echo ihc_check_default_pages_set();//set default pages message
		echo ihc_check_payment_gateways();
		echo ihc_is_curl_enable();
		do_action( "ihc_admin_dashboard_after_top_menu" );
		?>
		<form  method="post">

			<input type="hidden" name="ihc_admin_general_options_nonce" value="<?php echo wp_create_nonce( 'ihc_admin_general_options_nonce' );?>" />

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Authorize Search Engines', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Turn On access to Search engines for Restricted pages', 'ihc');?></span>
							<p><?php esc_html_e('Once a WordPress Page is restricted, Search Engines (such Google) may not be able to index the page content. When this option is enabled Search Engines are allowed to view protected content on your site. This can help search engines index your content. ', 'ihc');?></p>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = ($meta_arr['ihc_security_allow_search_engines']) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_security_allow_search_engines');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_security_allow_search_engines" value="<?php echo $meta_arr['ihc_security_allow_search_engines'];?>" id="ihc_security_allow_search_engines" />

						</div>
						<div  class="ihc-submit-button-wrapper">
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Block Username on SignUp', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<p><?php esc_html_e('Usernames which are setup on this section will be blocked on Registration process. Any keywords stored will not be allowed to be part of username submission. Ex: "admin" will block usernames as "admin123", "Badmin". Place each keyword separated by comma.', 'ihc');?></p>
							<textarea name="ihc_security_username" class="ihc_email_blacklist"><?php echo stripslashes($meta_arr['ihc_security_username']);?></textarea>
							<div class="row">
								<div class="col-xs-4">
									<div class="iump-form-line iump-no-border input-group">
											<span class="input-group-addon"><?php esc_html_e('Warning Message', 'ihc');?></span>
												<input type="text" class="form-control" name="ihc_security_block_username_message" value="<?php echo stripslashes($meta_arr['ihc_security_block_username_message']);?>">
									</div>
								</div>
							</div>
						</div>
					  <div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

				<div class="ihc-stuffbox">
					<h3><?php esc_html_e('Restrict entire website without Login', 'ihc');?></h3>
					<div class="inside">
						<div class="iump-form-line">
							<span class="iump-labels-special"><?php esc_html_e('Restrict access over entire Website. ', 'ihc');?></span>
							<p><?php esc_html_e('All pages, except WP Homepage, UMP default pages (Login,Register, etc) will be restricted. Visitors are automtically redirected to UMP Login page. ', 'ihc'); ?><b>Important:</b><?php esc_html_e(' Be sure that you already have UMP Login page properly setup and available for visitors.', 'ihc');?></p>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = (!empty($meta_arr['ihc_security_restrict_everything'])) ? 'checked' : '';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_security_restrict_everything');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<input type="hidden" name="ihc_security_restrict_everything" value="<?php echo $meta_arr['ihc_security_restrict_everything'];?>" id="ihc_security_restrict_everything" />

							<div class="row">
								<div class="col-xs-3">
									<p><?php esc_html_e('Exclude other pages from current Restriction:', 'ihc');?></p>
									<div class="iump-form-line iump-no-border input-group">

												<input type="text" class="form-control" name="ihc_security_restrict_everything_except" value="<?php echo $meta_arr['ihc_security_restrict_everything_except'];?>" />
									</div>
								</div>
							</div>
						</div>
						<div>
							<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
						</div>
					</div>
				</div>

								<div class="ihc-stuffbox ihc-display-none">
									<h3><?php esc_html_e('Rename wp-admin folder', 'ihc');?></h3>
									<div class="inside">
										<div class="iump-form-line">
											<span class="iump-labels-special"><?php esc_html_e('Hide Default "wp-admin" from Link. ', 'ihc');?></span>
											<p><?php esc_html_e('For backup, be sure that you have FTP access. In case you are not able to login anymore, just deactivate the plugin by changing the plugin folder name with something else', 'ihc');?></p>
											<label class="iump_label_shiwtch ihc-switch-button-margin">
												<?php $checked = (!empty($meta_arr['ihc_security_rename_wpadmin'])) ? 'checked' : '';?>
												<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_security_rename_wpadmin');" <?php echo $checked;?> />
												<div class="switch ihc-display-inline"></div>
											</label>
											<input type="hidden" name="ihc_security_rename_wpadmin" value="<?php echo $meta_arr['ihc_security_rename_wpadmin'];?>" id="ihc_security_rename_wpadmin" />

											<div class="row">
												<div class="col-xs-4">
													<div class="iump-form-line iump-no-border input-group">
															<span class="input-group-addon"><?php esc_html_e('New wp-admin name', 'ihc');?></span>
																<input type="text" class="form-control" name="ihc_security_rename_wpadmin_name" value="<?php echo $meta_arr['ihc_security_rename_wpadmin_name'];?>" />
													</div>
												</div>
											</div>
										</div>
										<div>
											<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
										</div>
									</div>
								</div>

		</form>

		<?php
		break;
}
