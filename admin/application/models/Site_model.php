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

        function get_orders(){
            $offset = $this->uri->segment(3, 0);
            $sql = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 10 OFFSET $offset";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0){
               foreach ($query->result() as $row) {
                   $data[] = $row;
               }
               return $data;
            }
        }

        function count_orders(){
            $query = $this->db->query('SELECT id FROM orders');
            return $query->num_rows();
        }

        function get_last_meal_id(){
            $sql = "SELECT meal_id FROM meals";
            $query = $this->db->query($sql);
            $last_id = $query->last_row();
            return $last_id->meal_id;
        }

        function update_menu_item(){
            $data = array(
                'meal_id' => $this->input->post('meal_id'),
                'meal_desc' => $this->input->post('meal_desc'),
                'meal_img_name' => $this->input->post('meal_img_name'),
                'meal_ingredients' => $this->input->post('meal_ingredients'),
                'meal_heating_inst' => $this->input->post('meal_heating_inst'),
                'meal_nutrition_info' => $this->input->post('meal_nutrition_info'),
                'meal_enable' => ($this->input->post('meal_enable') == 'on') ? true: false
            );
            $this->db->where('meal_id', $data['meal_id']);
            $this->db->update('meals', $data);
        }

        function create_menu_item(){
            $data = array(
                'meal_id' => $this->input->post('meal_id'),
                'meal_title' => $this->input->post('meal_title'),
                'meal_desc' => $this->input->post('meal_desc'),
                'meal_img_name' => $this->input->post('meal_img_name'),
                'meal_ingredients' => $this->input->post('meal_ingredients'),
                'meal_heating_inst' => $this->input->post('meal_heating_inst'),
                'meal_nutrition_info' => $this->input->post('meal_nutrition_info'),
                'meal_enable' => ($this->input->post('meal_enable') == 'on') ? true: false
            );
            $this->db->insert('meals', $data);
        }

    } /* login model ends */

?>
