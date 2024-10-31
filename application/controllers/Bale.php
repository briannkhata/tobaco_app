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

    function view($param="")
    {
        $data["page_title"] = "Bale Details";
        $data["bale_id"] = $param;
        $this->load->view("bale/_details", $data);
    }

    function get_form_data()
    {
        $data["client_id"] = $this->input->post("client_id");
        //$data["barcode"] = $this->input->post("barcode");
        $data["category_id"] = $this->input->post("category_id");
        $data["total_weight"] = $this->input->post("total_weight");
       // $data["unique_number"] = $this->input->post("unique_number");
        $data["description"] = $this->input->post("description");
        $data["price"] = $this->input->post("price");
        return $data;
    }

    function get_db_data($update_id)
    {
        $query = $this->M_bale->get_bale_by_id($update_id);
        foreach ($query as $row) {
            $data["client_id"] = $row["client_id"];
            //$data["barcode"] = $row["barcode"];
            $data["category_id"] = $row["category_id"];
            $data["total_weight"] = $row["total_weight"];
           // $data["unique_number"] = $row["unique_number"];
            $data["description"] = $row["description"];
            $data["price"] = $row["price"];
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

    function generate_barcode()
    {
        return strtoupper(uniqid());
    }

    function save()
    {
        $data = $this->get_form_data();
        $update_id = $this->input->post("update_id", true);
        if (isset($update_id)) {
            $this->db->where("bale_id", $update_id);
            $this->db->update("tbl_bales", $data);

        } else {
            $data["barcode"] = $this->generate_barcode();
            $this->db->insert("tbl_bales", $data);
        }

        $this->session->set_flashdata("message", "Bale saved successfully!");
        if ($update_id != ""):
            redirect("Bale");
        else:
            redirect("Bale/read");
        endif;
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