<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller {

	function __construct(){
        parent::__construct();
		if ($this->session->userdata("user_login") != 1) {
            redirect(base_url(), "refresh");
        }
    }

	function index(){
		$data['page_title'] = "departments";
		$this->load->view('department/_list',$data);
	}

	function get_department_form_data(){
        $data['department_name'] = $this->input->post('department_name');
		$data['description'] = $this->input->post('description');
		return $data;
    }

	function get_department_db_data($update_id){
		$query = $this->M_department->get_department_by_id($update_id);
		foreach ($query as $row) {
		  $data['department_name'] = $row['department_name'];
		  $data['description'] = $row['description'];
		}
		return $data;
	}

	function read(){
		$update_id = $this->uri->segment(3);
		if(!isset($update_id)){
			$update_id = $this->input->post('update_id',$update_id);
		}
		if(is_numeric($update_id)){
			$data = $this->get_department_db_data($update_id);
			$data['update_id'] = $update_id;
		}
		else{
			$data = $this->get_department_form_data();
		}

		$data['page_title'] = "Create department";
		$this->load->view('department/_form',$data);			
	}

	function save(){
		$data = $this->get_department_form_data();
		$update_id = $this->input->post('update_id', TRUE);
        
		if (isset($update_id)){
			$this->db->where('department_id',$update_id);
			$this->db->update('tbl_departments',$data);
		 }else{
			$this->db->insert('tbl_departments',$data);
		}
			if($update_id !=''):
    			redirect('Department');
			else:
				redirect('Department/read');
			endif;
			$this->session->set_flashdata('message','Department saved successfully!');
	}

	function delete($department_id){
		$data['deleted'] = 1;
		$this->db->where('department_id',$department_id);
        $this->db->update('tbl_departments',$data);
    	$this->session->set_flashdata('message','Department removed successfully!');
		redirect('Department');
	}

}
