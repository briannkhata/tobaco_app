<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Bale extends CI_Controller
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
        $data["page_title"] = "bales";
        $this->load->view("bale/_list", $data);
    }

    function get_form_data()
    {
        $data["client_id"] = $this->input->post("client_id");
        $data["barcode"] = $this->input->post("barcode");
        $data["category_id"] = $this->input->post("category_id");
        $data["total_weight"] = $this->input->post("total_weight");
        $data["unique_number"] = $this->input->post("unique_number");
        return $data;
    }

    function get_db_data($update_id)
    {
        $query = $this->M_bale->get_bale_by_id($update_id);
        foreach ($query as $row) {
            $data["client_id"] = $row["client_id"];
            $data["barcode"] = $row["barcode"];
            $data["category_id"] = $row["category_id"];
            $data["total_weight"] = $row["total_weight"];
            $data["unique_number"] = $row["unique_number"];
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
        $data["page_title"] = "Create Bale";
        $this->load->view("bale/_form", $data);
    }

    function save()
    {
        $data = $this->get_form_data();
        $update_id = $this->input->post("update_id", true);
        if (isset($update_id)) {
            $data["updated_by"] = $this->session->userdata("user_id");
            $data["date_updated"] = date("Y-m-d");
            $this->db->where("bale_id", $update_id);
            $this->db->update("tbl_bales", $data);

        } else {
            $data["added_by"] = $this->session->userdata("user_id");
            $data["date_added"] = date("Y-m-d");
            $this->db->insert("tbl_bales", $data);
        }

        if ($update_id != ""):
            redirect("bale");
        else:
            redirect("bale/read");
        endif;
        $this->session->set_flashdata("message", "Bale saved successfully!");
    }

    function delete($param = "")
    {
        $data["deleted"] = 1;
        $this->db->where("bale_id", $param);
        $this->db->update("tbl_bales", $data);
        $this->session->set_flashdata("message", "Bale Removed Successfully!");
        redirect("Bale");
    }


}