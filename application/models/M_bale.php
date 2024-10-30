<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bale extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_bales()
    {
        $this->db->where('deleted', 0);
        $this->db->from('tbl_bales');
        $this->db->order_by('bale_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_category_id($bale_id)
    {
        $this->db->select('category_id');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->category_id;
        } else {
            return '';
        }
    }


    function get_barcode($bale_id)
    {
        $this->db->select('barcode');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->barcode;
        } else {
            return '';
        }
    }

    function get_unique_number($bale_id)
    {
        $this->db->select('unique_number');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->unique_number;
        } else {
            return '';
        }
    }

    function get_total_weight($bale_id)
    {
        $this->db->select('total_weight');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->total_weight;
        } else {
            return '';
        }
    }

    function get_client_id($bale_id)
    {
        $this->db->select('client_id');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->client_id;
        } else {
            return '';
        }
    }




}
