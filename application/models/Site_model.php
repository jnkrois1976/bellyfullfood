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
            [meal] => Array
                (
                    [0] => 1002-2
                    [1] => 1003-2
                    [2] => 1004-3
                )
            [order_total] => 59.5
            [customerName] => Juan Rois
            [customerEmail] => jnkrois@gmail.com
            [customerPhone] => 305-496-1989
            [street_number] => 9045
            [route] => Watercrest Cir W
            [shippingAptNumber] =>
            [locality] => Parkland
            [administrative_area_level_1] => FL
            [postal_code] => 33076
            [cardNumber] => 4444555566667777
            [sq-expiration-date] => 03/19
            [cardCvv] => 123
            [sq-postal-code] => 33076

            $meals_data = $this->input->post('meal');
            $data = array(
                ''
            );
        }

    } /* login model ends */

?>
