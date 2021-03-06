<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER'] != 'AdamDaniel' || $_SERVER['PHP_AUTH_PW'] != 'twin1029') {
			header('WWW-Authenticate: Basic realm="MyProject"');
			header('HTTP/1.0 401 Unauthorized');
			die('Access Denied');
		}
	}

	public function index(){
		$this->load->model('admin_model');
		$status = $this->admin_model->maintenance();
        $data = array(
            'page_class' => 'home',
            'main_content' => 'admin_pages/dashboard_view',
			'status' => $status
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
    }

	public function orders(){
		$this->load->model('admin_model');
		$get_orders = $this->admin_model->get_orders();
		$count_orders = $this->admin_model->count_orders();
        $this->load->library('pagination');
        $config['base_url'] = base_url()."/".$this->uri->segment(1, 0)."/".$this->uri->segment(2, 0);
        $config['total_rows'] = $count_orders;
        $config['per_page'] = 10;
        $config['num_links'] = 10;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagItem');
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<b class="pagItem">';
        $config['cur_tag_close'] = '</b>';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';
        $this->pagination->initialize($config);
        $data = array(
            'page_class' => 'home',
            'main_content' => 'admin_pages/orders_view',
			'get_orders' => $get_orders
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
    }

	public function menu(){
		$this->load->model('admin_model');
		$get_meals = $this->admin_model->get_meals();
		$get_last_meal_id = $this->admin_model->get_last_meal_id();
        $data = array(
            'page_class' => 'menu',
            'main_content' => 'admin_pages/menu_items_view',
			'get_meals' => $get_meals,
			'last_id' => $get_last_meal_id
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
    }

	public function update_menu_item(){
		$this->load->model('admin_model');
		$update_menu_item = $this->admin_model->update_menu_item();
		$get_last_meal_id = $this->admin_model->get_last_meal_id();
		$get_meals = $this->admin_model->get_meals();
        $data = array(
            'page_class' => 'menu',
            'main_content' => 'admin_pages/menu_items_view',
			'get_meals' => $get_meals,
			'last_id' => $get_last_meal_id
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
	}

	public function create_menu_item(){
		$this->load->model('admin_model');
		$create_menu_item = $this->admin_model->create_menu_item();
		$get_last_meal_id = $this->admin_model->get_last_meal_id();
		$get_meals = $this->admin_model->get_meals();
        $data = array(
            'page_class' => 'menu',
            'main_content' => 'admin_pages/menu_items_view',
			'get_meals' => $get_meals,
			'last_id' => $get_last_meal_id
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
	}

	public function create_coupon(){
		$this->load->model('admin_model');
		$create_coupon = $this->admin_model->create_coupon();
		header('Location: /admin/coupons');
	}

	public function update_coupon(){
		$this->load->model('admin_model');
		$update_coupon = $this->admin_model->update_coupon();
		header('Location: /admin/coupons');
	}

	public function coupons(){
		$this->load->model('admin_model');
		$get_coupons = $this->admin_model->get_coupons();
        $data = array(
            'page_class' => 'coupons',
            'main_content' => 'admin_pages/coupons_view',
			'coupons' => $get_coupons
        );
        $this->load->view('admin_templates/template_view', array('data' =>$data));
    }

	public function set_maintenance(){
		$this->load->model('admin_model');
		$set_mode = $this->admin_model->set_maintenance();
		if($set_mode){
			header('Location: /admin/index');
		}

	}
}
