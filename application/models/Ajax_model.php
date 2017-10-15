<?php

    class Ajax_model extends CI_Model {

        function generate_calendar(){
            $month_value = $this->input->post('month_value');
            $year_value  = $this->input->post('year_value');
            $current_month = ($month_value === date('m'))? "&nbsp;": '<a href="{previous_url}" class="monthNav">&#10094;</span></a>';
            if($month_value == "12"){
                $year = date('Y') + 1 ."-";
    			$month = "01-";
            }else{
                $year = date('Y')."-";
    			$month = "0".date('m') + 1 ."-";
            }
            $prefs = array (
				'start_day'    => 'sunday',
				'show_next_prev'  => TRUE,
				'next_prev_url'   => '/ajax/calendar'
			);

            $prefs['template'] = array(
                'table_open'           => '<table class="calendar" width="50%">',
                'heading_previous_cell' => '<th>'.$current_month.'</th>',
                'heading_next_cell' => '<th><a href="{next_url}" class="monthNav">&#10095;</a></th>',
                'cal_cell_start_today' => '<td class="today">',
                'cal_cell_no_content_future' => '<span class="pickUpDay" data-fulldate="'.$year.$month.'{day}">{day}</span>'

            );
			$this->load->library('calendar', $prefs);
			echo $this->calendar->generate($year_value, $month_value);

		} // generate_calendar ends

        function validate_coupon(){
            $coupon_name = $this->input->post('coupon_name');
            $sql = "SELECT * FROM coupons WHERE coupon_name='$coupon_name'";
            $query = $this->db->query($sql);
            if($query->num_rows() == 0){
                $coupon = array("invalid_coupon" => "true");
                return json_encode($coupon);
            }elseif($query->num_rows() > 0){
                $valid_coupon = $query->row_array();
                $today = date('Y-m-d');
                $expired = ($valid_coupon['coupon_expires'] < $today)? "true": "false";
                $disabled = ($valid_coupon['coupon_enable'])? "false": "true";
                $coupon = array(
                    "coupon_amount" => $valid_coupon['coupon_amount'],
                    "coupon_expired" => $expired,
                    "coupon_disabled" => $disabled,
                    "coupon_name" => $valid_coupon['coupon_name']
                );
                return json_encode($coupon);
            }
        }

    }

?>
