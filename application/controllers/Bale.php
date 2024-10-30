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
        $this->load->view("bale/_bale_list", $data);
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
            $data["name"] = $row["name"];
            $data["barcode"] = $row["barcode"];
            $data["category_id"] = $row["category_id"];
            $data["selling_price"] = $row["selling_price"];
            $data["brand_id"] = $row["brand_id"];
            $data["unit_id"] = $row["unit_id"];
            $data["reorder_level"] = $row["reorder_level"];
            $data["expiry_date"] = $row["expiry_date"];
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
        $data["page_title"] = "Create bale";
        $this->load->view("bale/_add_bale", $data);
    }

    function save()
    {
        $data = $this->get_form_data();
        $update_id = $this->input->post("update_id", true);
        if (isset($update_id)) {
            $data["modified_by"] = $this->session->userdata("user_id");
            $data["modified_date"] = date("Y-m-d");
            $this->db->where("bale_id", $update_id);
            $this->db->update("tbl_bales", $data);

            $this->sync_quantities_by_shop($update_id);
        } else {
            $this->db->insert("tbl_bales", $data);
            $bale_id = $this->db->insert_id();
            $this->sync_quantities_by_shop($bale_id);
        }
        
        if ($update_id != ""):
            redirect("bale");
        else:
            redirect("bale/read");
        endif;
        $this->session->set_flashdata("message", "bale saved successfully!");
    }

    function delete($param = "")
    {
        $data["deleted"] = 1;
        $data["deleted_by"] = $this->session->userdata("user_id");
        $data["date_deleted"] = date("Y-m-d");
        $this->db->where("bale_id", $param);
        $this->db->update("tbl_bales", $data);
        $this->session->set_flashdata("message", "bale Removed!");
        redirect("bale");
    }

    function sync_quantities_by_shop($bale_id)
    {
        $shops = $this->M_shop->get_shops();
        foreach ($shops as $shop) {
            $qty_exists = $this->M_move->get_shop_quantities($bale_id, $shop['shop_id']);
            if (!$qty_exists) {
                $data = array(
                    "bale_id" => $bale_id,
                    "shop_id" => $shop['shop_id'],
                    "qty" => 0
                );
                $this->db->insert("tbl_quantities", $data);
            }
        }

        $whs = $this->M_warehouse->get_warehouses();
        foreach ($whs as $wh) {
            $qty_exists = $this->M_move->get_warehouse_quantities($bale_id, $wh['warehouse_id']);
            if (!$qty_exists) {
                $data = array(
                    "bale_id" => $bale_id,
                    "warehouse_id" => $wh['warehouse_id'],
                    "qty" => 0
                );
                $this->db->insert("tbl_wh_quantities", $data);
            }
        }
    }
    function search_bale()
    {
        $barcode = $this->input->post('barcode');
        $results = $this->M_bale->searchbales($barcode);
        echo json_encode($results);
    }

    function get_address()
    {
        $results = $this->M_user->get_shop_address();
        echo json_encode($results);
    }

}