<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Branch extends CI_Controller
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
        $data["page_title"] = "Branch List";
        $this->load->view("branch/_list", $data);
    }


    function get_form_data()
    {
        $data["branch_name"] = $this->input->post("branch_name");
        $data["description"] = $this->input->post("description");
        $data["address"] = $this->input->post("address");
        return $data;
    }

    function get_db_data($update_id)
    {
        $query = $this->M_branch->get_branch_by_id($update_id);
        foreach ($query as $row) {
            $data["branch_name"] = $row["branch_name"];
            $data["description"] = $row["description"];
            $data["address"] = $row["address"];
        }
        return $data;
    }

    function read()
    {
        $update_id = $this->uri->segment(3);
        if (!isset($update_id)) {
            $update_id = $this->input->post("update_id", $update_id);
        }
        if (is_numeric($update_id)) {
            $data = $this->get_db_data($update_id);
            $data["update_id"] = $update_id;
        } else {
            $data = $this->get_form_data();
        }
        $data["page_title"] = "Create branch";
        $this->load->view("branch/_form", $data);
    }

    function save()
    {
        $data = $this->get_form_data();
        $update_id = $this->input->post("update_id", true);
        if (isset($update_id)) {
            $this->db->where("branch_id", $update_id);
            $this->db->update("tbl_branches", $data);
            $this->sync_quantities($update_id);
        } else {
            $this->db->insert("tbl_branches", $data);
            $branch_id = $this->db->insert_id();
            $this->sync_quantities($branch_id);
        }
        if ($update_id != ""):
            redirect("Branch");
        else:
            redirect("Branch/read");
        endif;
        $this->session->set_flashdata("message", "Branch saved successfully!");
    }



    function delete($param = "")
    {
        $data["deleted"] = 1;
        $this->db->where("branch_id", $param);
        $this->db->update("tbl_branches", $data);
        $this->session->set_flashdata("message", "Branch Removed Successfully!");
        redirect("Branch");
    }


}