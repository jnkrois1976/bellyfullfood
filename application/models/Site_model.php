<?php

    class Site_model extends CI_Model {

        function get_meals(){
            $sql = "SELECT * FROM meals";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               foreach ($query->result() as $row) {
                   $data[] = $row;
               }
               return $data;
            }
        }

        function place_order(){
            $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        	$strlength = strlen($characters);
        	$random = '';
        	for ($i = 0; $i < 7; $i++) {
        		$random .= $characters[rand(0, $strlength - 1)];
        	}
            $meals = array(
                '1001' => 'Buffalo Chicken',
                '1002' => 'Chicken Fajitas',
                '1003' => 'Chicken Kabobs',
                '1004' => 'Chicken Parmesan',
                '1005' => 'Chicken Teriyaki',
                '1006' => 'Mojo Pork',
                '1007' => 'Pesto Chicken',
                '1008' => 'Pesto Shrimp',
                '1009' => 'Steak Fajitas',
                '1010' => 'Surf & Turf',
                '1011' => 'Spring Mix Salad ~VEGAN~',
                '1012' => 'Turkey-Quinoa Meatballs',
                '1013' => 'Grilled Pork Tenderloin',
                '1014' => 'Grilled Chicken Breast',
                '1015' => 'BBQ Chicken Breast',
                '1016' => 'Wild-Caught Atlantic Salmon',
                '1017' => 'Skirt Steak'
            );

            $meal_data = $this->input->post('name');
            $parsed_meals_data = array();
            for ($i=0; $i < count($meal_data) ; $i++) {
                $break_meal_data = explode("-", $meal_data[$i]);
                $meal_item = $break_meal_data[1]."-".$meals[$break_meal_data[0]].",";
                array_push($parsed_meals_data, $meal_item);
            }
            $data = array(
                'order_number' => $random,
                'order_date' => date("Y-m-d H:i:s"),
                'order_meals' => implode($parsed_meals_data),
                'order_dollar_amount' => $this->input->post('order_total'),
                'cust_name' => $this->input->post('customerName'),
                'cust_email' => $this->input->post('customerEmail'),
                'cust_phone' => $this->input->post('customerPhone'),
                'cust_street_number' => $this->input->post('street_number'),
                'cust_street_name' => $this->input->post('route'),
                'cust_apt_number' => $this->input->post('shippingAptNumber'),
                'cust_city' => $this->input->post('locality'),
                'cust_state' => $this->input->post('administrative_area_level_1'),
                'cust_zip' => $this->input->post('postal_code')
            );
            $create_order = $this->db->insert('orders', $data);

            if($create_order){
                return $data;
            }
        }

    } /* login model ends */

?>
