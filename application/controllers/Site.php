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

	public function faq(){
        $data = array(
            'page_class' => 'faq',
            'main_content' => 'pages/faq_view'
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function order(){
		$this->load->model('site_model');
		$get_meals = $this->site_model->get_meals();
        $data = array(
            'page_class' => 'order',
            'main_content' => 'pages/order_view',
			'get_meals' => $get_meals
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function cart(){
        $data = array(
            'page_class' => 'cart',
            'main_content' => 'pages/cart_view'
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function contact(){
        $data = array(
            'page_class' => 'contact',
            'main_content' => 'pages/contact_view'
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function place_order(){
		$this->load->model('site_model');
		$place_order = $this->site_model->place_order();
		$data = array(
            'page_class' => 'confirmation',
            'main_content' => 'pages/confirmation_view'
        );
        $this->load->view('templates/template_view', array('data' =>$data));
	}
}
