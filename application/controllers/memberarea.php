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

		$service = $this->get_analytics_service();
		$profiles = $service->management_profiles->listManagementProfiles("~all", "~all");
		$data['web_profiles'] = $profiles;

		$this->load->view('template/loader', $data);
	}

	public function showstats(){
		$selected_props = $this->input->post('web_properties');
		$service = $this->get_analytics_service();
		$html="";
		foreach ($selected_props as $wp) {
			$query = $service->data_ga->get(
	          'ga:'.$wp,
	          '2014-01-01',
	          '2014-02-01',
	          'ga:visits',
	          array(
	              'dimensions' => 'ga:source,ga:keyword',
	              'sort' => '-ga:visits,ga:keyword',
	              'max-results' => '25'));
	      $html .= "<h1>" . $query['profileInfo']['profileName'] . "</h1>"
	      . "<pre>Visitas: " . $query['totalsForAllResults']['ga:visits'] . "</pre>";
		}
		$data['html'] = $html;
		print_r($data['html']);
	}

	public function get_view_data($title, $content, $args=null){
		$data['title'] = $title;
		$data['content'] = $content;
		return $data;
	}
	

	public function get_analytics_service(){
		$accesstoken = $this->session->userdata('token');
		$this->client->setAccessToken($accesstoken);
		return new Google_AnalyticsService($this->client);
	}
}

/* End of file memberarea.php */
/* Location: ./application/controllers/memberarea.php */