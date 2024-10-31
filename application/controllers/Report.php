<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("user_login") != 1) {
			redirect(base_url(), "refresh");
		}
	}

	function bales()
	{
		$data['page_title'] = "Bales Report";
		$this->load->view('report/_bales', $data);
	}

	function refresh_bales()
	{
		$client_id = $this->input->post("client_id");
	
		// If client_id is "ALL", set it to null to disregard the filter
		if ($client_id == "ALL") {
			$client_id = null;
		}
	
		$data['bales'] = $this->M_report->get_bales($client_id);
		$data['page_title'] = "Bales | " . ($client_id ? $this->M_client->get_trading_name($client_id) : "All Clients");
		
		$this->load->view('report/_refresh_bales', $data);
	}
	


}
