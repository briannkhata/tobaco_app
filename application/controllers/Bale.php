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
        $data["page_title"] = "Bales |";
        $this->load->view("bale/_list", $data);
    }

    function view($param = "")
    {
        $data["page_title"] = "Bale Details";
        $data["bale_id"] = $param;
        $this->load->view("bale/_details", $data);
    }

    function get_form_data()
    {
        $data["client_id"] = $this->input->post("client_id");
        $data["category_id"] = $this->input->post("category_id");
        $data["total_weight"] = $this->input->post("total_weight");
        $data["description"] = $this->input->post("description");
        $data["price"] = $this->input->post("price");
        return $data;
    }

    function get_db_data($update_id)
    {
        $query = $this->M_bale->get_bale_by_id($update_id);
        foreach ($query as $row) {
            $data["client_id"] = $row["client_id"];
            $data["category_id"] = $row["category_id"];
            $data["total_weight"] = $row["total_weight"];
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



    function generate_qrcode($data)
    {
        $this->load->library('ciqrcode');

        $data = is_array($data) ? json_encode($data) : $data;

        $filename = bin2hex($data);
        $filename = substr($filename, 0, 50) . '.png';

        // Define the directory for saving QR codes
        $dir = 'assets/images/qrcode/';
        if (!file_exists($dir) && !mkdir($dir, 0775, true)) {
            throw new Exception('Failed to create directory: ' . $dir);
        }

        // QR Code configuration
        $config = [
            'cacheable' => false,
            'imagedir' => $dir,
            'quality' => true,
            'size' => '1024',
            'black' => [0, 0, 0],
            'white' => [255, 255, 255]
        ];
        $this->ciqrcode->initialize($config);

        $params = [
            'data' => $data,
            'level' => 'L',
            'size' => 10,
            'savename' => $dir . $filename
        ];

        if (!$this->ciqrcode->generate($params)) {
            throw new Exception('Failed to generate QR code for data: ' . $data);
        }
        return $dir . $filename;
    }


    function save()
    {
        $data = $this->get_form_data();

        $update_id = $this->input->post("update_id", true);
        if (isset($update_id)) {
            $this->db->where("bale_id", $update_id);
            $this->db->update("tbl_bales", $data);

        } else {
            $data['qr_code'] = $this->generate_qrcode($data);
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