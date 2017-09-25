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
		$this->load->model('calendar_model');
		$generate_calendar = $this->calendar_model->generate_calendar();
        $data = array(
            'page_class' => 'order',
            'main_content' => 'pages/order_view',
			'get_meals' => $get_meals,
			'generate_calendar' => $generate_calendar
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }

	public function cart(){
		$this->load->model('site_model');
		$get_meal_names = $this->site_model->get_meal_names();
		if($this->input->post(NULL, FALSE) != null){
			$this->site_model->add_to_cart();
		}
        $data = array(
            'page_class' => 'cart',
            'main_content' => 'pages/cart_view',
			'meal_names' => $get_meal_names
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

	public function authorize_card(){
		require 'vendor/autoload.php';
		if($this->config->item('square_sandbox') == TRUE){
            $location_id = 'CBASEEg5rewNq27HHcoz-gV-6WIgAQ';
    		$access_token = 'Bearer sandbox-sq0atb-Mu5w72FrcF7b2b5JeZ74nQ';
        }elseif($this->config->item('square_sandbox') == FALSE){
            $location_id = '8YCM7KPQPJK4P';
    		$access_token = 'Bearer sq0atp-Q2uCkPFJeXG_Z-WzQ9GbkQ';
        }
		$nonce = $_POST['nonce_value'];
		SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
		$transactions_api = new \SquareConnect\Api\TransactionsApi();
		$request_body = array (
			"card_nonce" => $nonce,
			"amount_money" => array (
				"amount" => 100,
				"currency" => "USD"
			),
			"idempotency_key" => uniqid()
		);
		try {
			print_r($transactions_api->charge($location_id, $request_body));
		} catch (Exception $e) {
			echo "Caught exception " . $e->getMessage();
		}
		// if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		// 	error_log("Received a non-POST request");
		// 	echo "Request not allowed";
		// 	http_response_code(404);
		// 	return;
		// }
		// if (is_null($nonce)) {
		// 	echo "Invalid card data";
		// 	http_response_code(422);
		// 	return;
		// }
		// SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
		// $transaction_api = new \SquareConnect\Api\TransactionsApi();
		// $request_body = array (
		// 	"card_nonce" => $nonce,
		// 	"amount_money" => array (
		// 		"amount" => $_POST['dollar_amount'] * 100,
		// 		"currency" => "USD"
		// 	),
		// 	"idempotency_key" => uniqid()
		// );
		// try {
        //     $response = array('transaction_status' => "", 'transaction_id' => "");
		// 	$result = $transaction_api->charge($access_token, $location_id, $request_body);
        //     $transaction_result = (array) $result['transaction'];
        //     $this->session->set_userdata("transaction_result", serialize($transaction_result));
        //     $transaction_status = (array) $result['transaction']['tenders'][0]['card_details']['status'];
        //     $response['transaction_status'] = $transaction_status[0];
		// 	$resultArray = (array) $result['transaction']['id'];
		// 	if($resultArray != null){
        //         $response['transaction_id'] = $resultArray[0];
        //         $this->session->set_userdata("transaction_id", $resultArray[0]);
        //         $this->session->unset_userdata('quoteId');
		// 		echo json_encode($response);
		// 	}
		// } catch (\SquareConnect\ApiException $e) {
		// 	$result = (array) $e->getResponseBody();
		//     $resultCode = (array) $result['errors'][0];
		// 	switch ($resultCode['code']) {
		// 		case 'VERIFY_CVV_FAILURE':
		// 			$error_message = "The CVV code you provided is not valid";
		// 			break;
		// 		case 'VERIFY_AVS_FAILURE':
		// 			$error_message = "The zip code you provided is not valid";
		// 			break;
		// 		case 'INVALID_EXPIRATION':
		// 			$error_message = "The expiration date you provided is not valid";
		// 			break;
        //         case 'CARD_DECLINED':
        //             $error_message = "Card declined. Please contact your bank";
        //             break;
		// 		default:
		// 			$error_message = "There was an error processing the card";
		// 			break;
		// 	}
        //     $error_response = array("error_message" => $error_message, 'error_code' => $resultCode['code']);
		// 	echo json_encode($error_response);
		// }

	}

	public function place_order(){
		$this->load->model('site_model');
		$place_order = $this->site_model->place_order();
		if($place_order){
			header('Location: /thank_you');
		}
	}

	public function thank_you(){
		$this->load->model('site_model');
		$get_last_order = $this->site_model->get_last_order();
		$data = array(
			'page_class' => 'confirmation',
			'main_content' => 'pages/confirmation_view',
			'order_details' => $get_last_order
		);
		$this->load->view('templates/template_view', array('data' =>$data));
	}

}
