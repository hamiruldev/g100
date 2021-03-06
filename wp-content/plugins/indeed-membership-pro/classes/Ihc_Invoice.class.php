<?php

if (!class_exists('Ihc_Invoice')):



class Ihc_Invoice{

	private $uid = 0;

	private $order_id = 0;

	private $metas = array();

	private $is_preview = FALSE;



	public function __construct($uid=0, $order_id=0, $metas=array()){

		/*

		 * @param int(user id), int(order id), array(metas for preview)

		 * @return none

		 */

		if ($metas){

			$this->is_preview = TRUE;

			$this->metas = $metas;

		} else {

			$this->metas = ihc_return_meta_arr('invoices');

		}

		$this->uid = $uid;

		$this->order_id = $order_id;

	}



	public function output($return_popup=FALSE){

		/*

		 * @param none

		 * @return string

		 */



		///settings

		$data = $this->metas;

		$data['icon_print_id'] = 'iump-print-popup-content';

		$data['wrapp_id'] = 'iump_invoice_' . $this->order_id;

		$data['ihc_invoices_bill_to'] = ihc_replace_constants($data['ihc_invoices_bill_to'], $this->uid, FALSE, FALSE);

		$data['ihc_invoices_bill_to'] = stripslashes(htmlspecialchars_decode(ihc_format_str_like_wp($data['ihc_invoices_bill_to'])));

		$data['ihc_invoices_company_field'] = stripslashes(htmlspecialchars_decode(ihc_format_str_like_wp($data['ihc_invoices_company_field'])));

		$data['ihc_invoices_footer'] = stripslashes(htmlspecialchars_decode(ihc_format_str_like_wp($data['ihc_invoices_footer'])));

		$data['ihc_invoices_title'] = stripslashes($data['ihc_invoices_title']);

		$data ['css'] = stripslashes((isset($data['ihc_invoices_custom_css'])) ? $data['ihc_invoices_custom_css'] : '');



		///db data

		if (empty($this->is_preview)){

			require_once IHC_PATH . 'classes/Orders.class.php';

			$order_object = new \Ump\Orders();

			$data['order_details'] = $order_object->get_data($this->order_id) + $order_object->get_metas($this->order_id);

			$level_details = ihc_get_level_by_id($data['order_details']['lid']);

			$data['level_label'] = $level_details['label'];

			$data['total_amount'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['order_details']['amount_value']);

			//Added on v.7.0
			$data['level_price'] =$data['order_details']['amount_value'];

			if (!empty($data['order_details']['discount_value'])){

				$data['total_discount'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['order_details']['discount_value']);

				//Added on v.7.0
				$data['level_price'] = $data['level_price'] +	$data['order_details']['discount_value'];
			}

			if (!empty($data['order_details']['taxes_amount'])){
				 // v 9.5
				 $data['level_price'] = $data['level_price'] - $data['order_details']['taxes_amount'];
				 $data['total_taxes'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['order_details']['taxes_amount']);
			} else if (!empty($data['order_details']['tax_value'])){
			    // v.7.0
					$data['level_price'] = $data['level_price'] - $data['order_details']['tax_value'];
					$data['total_taxes'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['order_details']['tax_value']);
			} else if (!empty($data['order_details']['taxes'])){
					$data['level_price'] = $data['level_price'] - (float)$data['order_details']['taxes'];
					$data['total_taxes'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['order_details']['taxes']);
			}

			//Added on v.7.0
			$data['level_price'] = ihc_format_price_and_currency($data['order_details']['amount_type'], $data['level_price']);

		} else {

			/// dummy data

			$currency = get_option('ihc_currency');

			$data['level_label'] = 'Level A';

			$data['total_amount'] = 10;

			$data['level_price'] = 10;

			$data['total_amount'] = ihc_format_price_and_currency($currency, $data['total_amount']);

			$data['level_price'] = ihc_format_price_and_currency($currency, $data['level_price']);

			$data['order_details']['code'] = 'IUMP12345678';

			$data['order_details']['code'] = 'qwerty_123';

			$data['order_details']['create_date'] = indeed_get_current_time_with_timezone();

		}



		$data['order_details']['create_date'] = ihc_convert_date_to_us_format($data['order_details']['create_date']);

		/// output

		$fullPath = IHC_PATH . 'public/views/invoice.php';
		$searchFilename = 'invoice.php';
		$template = apply_filters('ihc_filter_on_load_template', $fullPath, $searchFilename );

		ob_start();

		require_once $template;

		$output = ob_get_contents();

		ob_end_clean();

		if ($return_popup){

			$output = $this->wrapp_into_popup($output);

		}

		return $output;

	}



	private function wrapp_into_popup($input=''){

		/*

		 * @param string

		 * @return string

		 */

		$data['content'] = $input;

		$data['title'] =  esc_html__('Invoice', 'ihc');

		$fullPath = IHC_PATH . 'public/views/popup.php';
		$searchFilename = 'popup.php';
		$template = apply_filters('ihc_filter_on_load_template', $fullPath, $searchFilename );

		ob_start();

		require_once $template;

		$output = ob_get_contents();

		ob_end_clean();

		return $output;

	}



}



endif;
