<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ajax extends CI_Controller {

        public function format_date(){
            $raw_date = $this->input->post('raw_date');
            echo date("l, F jS", strtotime($raw_date));
        }

        public function generate_calendar(){
            $this->load->model('ajax_model');
            $generate_calendar = $this->ajax_model->generate_calendar();
            echo $generate_calendar;
        }

        public function validate_coupon(){
            $this->load->model('ajax_model');
            $validate_coupon = $this->ajax_model->validate_coupon();
            echo $validate_coupon;
        }

    }
?>
