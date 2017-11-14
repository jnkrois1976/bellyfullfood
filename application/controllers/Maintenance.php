<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

	public function index(){
        $this->load->model('admin_model');
		$maintenance = $this->admin_model->maintenance();
		if($maintenance['status'] == '1'){
			header('Location: /site/index');
		}else{
            $this->load->view('pages/maintenance_view');
        }
	}
}
