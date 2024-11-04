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
		$data['client_id'] = $this->input->post("client_id");
		$data['page_title'] = "Bales | " . ($data['client_id'] ? $this->M_client->get_trading_name($data['client_id']) : "All Clients");
		$this->load->view('report/_refresh_bales', $data);
	}
	


}
