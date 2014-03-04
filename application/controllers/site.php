<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'application/libraries/google-api-php-client/src/Google_Client.php';
require_once 'application/libraries/google-api-php-client/src/contrib/Google_AnalyticsService.php';

class Site extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->client = new Google_Client();
		$this->client->setApplicationName("Google Analytics PHP Starter Application");
		
	}

	public function index(){
		$this->service = new Google_AnalyticsService($this->client);
		$data['authUrl'] = $this->client->createAuthUrl();
		/*
		*/
		$this->load->view('oauth/connect', $data);
		/*
		*/
	}

	public function connected(){
		print_r($_GET['code']);
		echo "<br />connected";
	}
}

/* End of file site.php */
/* Location: ./application/controllers/site.php */