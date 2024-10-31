<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata("user_login") != 1) {
			redirect(base_url(), "refresh");
		}
	}

	function index()
	{
		$data['page_title'] = "Categories";
		$this->load->view('category/_list', $data);
	}

	function get_cat_form_data()
	{
		$data['category_name'] = $this->input->post('category_name');
		$data['description'] = $this->input->post('description');
		return $data;
	}

	function get_cat_db_data($update_id)
	{
		$query = $this->M_category->get_category_by_id($update_id);
		foreach ($query as $row) {
			$data['category_name'] = $row['category_name'];
			$data['description'] = $row['description'];
		}
		return $data;
	}

	function read()
	{
		$update_id = $this->uri->segment(3);
		if (!isset($update_id)) {
			$update_id = $this->input->post('update_id', $update_id);
		}
		if (is_numeric($update_id)) {
			$data = $this->get_cat_db_data($update_id);
			$data['update_id'] = $update_id;
		} else {
			$data = $this->get_cat_form_data();
		}
		$data['page_title'] = "Create Category";
		$this->load->view('category/_form', $data);
	}

	function save()
	{
		$data = $this->get_cat_form_data();
		$update_id = $this->input->post('update_id', TRUE);

		if (isset($update_id)) {
			$this->db->where('category_id', $update_id);
			$this->db->update('tbl_categories', $data);
		} else {
			$this->db->insert('tbl_categories', $data);
		}
		
		$this->session->set_flashdata('message', 'Category saved successfully!');
		if ($update_id != ''):
			redirect('Category');
		else:
			redirect('Category/read');
		endif;
	}

	function delete($param = "")
	{
		$data['deleted'] = 1;
		$this->db->where('category_id', $param);
		$this->db->update('tbl_categories', $data);
		$this->session->set_flashdata('message', 'Category Removed successfully!');
		redirect('Category');
	}


}
