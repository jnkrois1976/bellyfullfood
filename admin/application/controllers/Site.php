<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
		$this->load->model('site_model');
		$get_meals = $this->site_model->get_meals();
        $data = array(
            'page_class' => 'home',
            'main_content' => 'pages/homepage_view',
			'get_meals' => $get_meals
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function menu(){
		$this->load->model('site_model');
		$get_meals = $this->site_model->get_meals();
        $data = array(
            'page_class' => 'menu',
            'main_content' => 'pages/menu_view',
			'get_meals' => $get_meals
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function update_menu_item(){
		$this->load->model('site_model');
		$update_menu_item = $this->site_model->update_menu_item();
		$get_meals = $this->site_model->get_meals();
        $data = array(
            'page_class' => 'menu',
            'main_content' => 'pages/menu_view',
			'get_meals' => $get_meals
        );
        $this->load->view('templates/template_view', array('data' =>$data));
	}
}
