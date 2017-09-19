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

        function get_product(){
            $product = $this->uri->segment(3, 0);
            $sql = "SELECT * FROM products WHERE product_code_name = '$product' LIMIT 1 ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               $row = $query->row_array();
               return $row;
            }
        }

    } /* login model ends */

?>
