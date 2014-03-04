<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'application/libraries/google-api-php-client/src/Google_Client.php';
require_once 'application/libraries/google-api-php-client/src/contrib/Google_AnalyticsService.php';

class Memberarea extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->is_logged_in();
		$this->client = new Google_Client();
		$this->client->setApplicationName("Google Analytics PHP Starter Application");
	}

	public function is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		if (!$is_logged_in) {
			redirect('index.php/site/');
		}
	}

	public function index(){
		$data = $this->get_view_data("Welcome to Members Area ;)", "members/home");

		/*
		*/
		$accesstoken = $this->session->userdata('token');
		$this->client->setAccessToken($accesstoken);
		$this->service = new Google_AnalyticsService($this->client);
		$data['accounts'] = $this->service->management_accounts->listManagementAccounts();

		$this->load->view('template/loader', $data);
	}

	public function get_view_data($title, $content, $args=null){
		$data['title'] = $title;
		$data['content'] = $content;
		return $data;
	}
}

/* End of file memberarea.php */
/* Location: ./application/controllers/memberarea.php */