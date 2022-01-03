<?php
$levels = \Indeed\Ihc\Db\Memberships::getAll();

if (!empty($_POST['ihc_save'])){
	update_option('ihc_level_dynamic_price_on', $_POST['ihc_level_dynamic_price_on']);
	update_option('ihc_level_dynamic_price_step', $_POST['ihc_level_dynamic_price_step']);
	/// RESTRICT LEVELs
	$ihc_level_dynamic_price_levels_on = array();
	$ihc_level_dynamic_price_levels_min = array();
	$ihc_level_dynamic_price_levels_max = array();
	foreach ($levels as $id=>$level){
		$ihc_level_dynamic_price_levels_on[$id] = (isset($_POST['ihc_level_dynamic_price_levels_on'][$id])) ? $_POST['ihc_level_dynamic_price_levels_on'][$id] : '';
		$ihc_level_dynamic_price_levels_min[$id] = (isset($_POST['ihc_level_dynamic_price_levels_min'][$id])) ? $_POST['ihc_level_dynamic_price_levels_min'][$id] : '';
		$ihc_level_dynamic_price_levels_max[$id] = (isset($_POST['ihc_level_dynamic_price_levels_max'][$id])) ? $_POST['ihc_level_dynamic_price_levels_max'][$id] : '';
	}
	update_option('ihc_level_dynamic_price_levels_on', $ihc_level_dynamic_price_levels_on);
	update_option('ihc_level_dynamic_price_levels_min', $ihc_level_dynamic_price_levels_min);
	update_option('ihc_level_dynamic_price_levels_max', $ihc_level_dynamic_price_levels_max);
}

$data['metas'] = ihc_return_meta_arr('level_dynamic_price');//getting metas


echo ihc_check_default_pages_set();//set default pages message
echo ihc_check_payment_gateways();
echo ihc_is_curl_enable();
do_action( "ihc_admin_dashboard_after_top_menu" );
?>
<form  method="post">
	<div class="ihc-stuffbox">
		<h3 class="ihc-h3"><?php esc_html_e('Membership Dynamic Price', 'ihc');?></h3>
		<div class="inside">
			<div class="iump-form-line">
				<h2><?php esc_html_e('Activate/Hold Membership Dynamic Price', 'ihc');?></h2>
				<label class="iump_label_shiwtch ihc-switch-button-margin">
					<?php $checked = ($data['metas']['ihc_level_dynamic_price_on']) ? 'checked' : '';?>
					<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '#ihc_level_dynamic_price_on');" <?php echo $checked;?> />
					<div class="switch ihc-display-inline"></div>
				</label>
				<input type="hidden" name="ihc_level_dynamic_price_on" value="<?php echo $data['metas']['ihc_level_dynamic_price_on'];?>" id="ihc_level_dynamic_price_on" />
			</div>
			<div class="iump-form-line">
			<div class="row">
				<div class="col-xs-4">
				   <div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><?php esc_html_e('Step', 'ihc');?></span>
						<input type="number" min="0" step="0.01" class="form-control" value="<?php echo $data['metas']['ihc_level_dynamic_price_step'];?>" name="ihc_level_dynamic_price_step">
			   		</div>
				</div>
			</div>
		</div>


			<div class="ihc-submit-form">
				<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
			</div>

		</div>
	</div>

	<?php if ($levels):?>
		<?php foreach ($levels as $id=>$level):?>
			<div class="ihc-stuffbox">

				<h3 class="ihc-h3"><?php echo esc_html__('Membership: ', 'ihc') . $level['label'];?></h3>
				<div class="inside">
					<div class="iump-form-line">
						<label><?php esc_html_e('Activate Dynamic Price for this membership', 'ihc');?></label>
						<div>
							<label class="iump_label_shiwtch ihc-switch-button-margin">
								<?php $checked = (empty($data['metas']['ihc_level_dynamic_price_levels_on'][$id])) ? '' : 'checked';?>
								<input type="checkbox" class="iump-switch" onClick="iumpCheckAndH(this, '<?php echo '#ihc_level_dynamic_price_levels_on'.$id;?>');" <?php echo $checked;?> />
								<div class="switch ihc-display-inline"></div>
							</label>
							<?php $hidden_value = (empty($data['metas']['ihc_level_dynamic_price_levels_on'][$id])) ? 0 : $data['metas']['ihc_level_dynamic_price_levels_on'][$id];?>
							<input type="hidden" name="ihc_level_dynamic_price_levels_on[<?php echo $id;?>]" value="<?php echo $hidden_value;?>" id="<?php echo 'ihc_level_dynamic_price_levels_on'.$id;?>" />
						</div>
					</div>
					<div class="iump-form-line">
					<div class="row">
						<div class="col-xs-4">
						   <div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><?php esc_html_e('Minimum Price', 'ihc');?></span>
								<?php $min_value = (isset($data['metas']['ihc_level_dynamic_price_levels_min'][$id])) ? $data['metas']['ihc_level_dynamic_price_levels_min'][$id] : 0;?>
								<input type="number" min="0" step="0.01" class="form-control" value="<?php echo $min_value;?>" name="ihc_level_dynamic_price_levels_min[<?php echo $id;?>]" />
					   		</div>
						</div>
					</div>
				</div>
				<div class="iump-form-line">
					<div class="row">
						<div class="col-xs-4">
						   <div class="input-group">
								<span class="input-group-addon" id="basic-addon1"><?php esc_html_e('Maximum Price', 'ihc');?></span>
								<?php $standard_price = (isset($levels[$id]['price'])) ? $levels[$id]['price'] : '';?>
								<?php $max_value = (isset($data['metas']['ihc_level_dynamic_price_levels_max'][$id])) ? $data['metas']['ihc_level_dynamic_price_levels_max'][$id] : $standard_price;?>
								<input type="number" min="0" step="0.01" class="form-control" value="<?php echo $max_value;?>" name="ihc_level_dynamic_price_levels_max[<?php echo $id;?>]" />
					   		</div>
						</div>
					</div>
				</div>
					<div class="ihc-submit-form">
						<input type="submit" value="<?php esc_html_e('Save Changes', 'ihc');?>" name="ihc_save" class="button button-primary button-large" />
					</div>
				</div>
			</div>
		<?php endforeach;?>
	<?php endif;?>


</form>
