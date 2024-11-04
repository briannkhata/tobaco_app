<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_bale_details($client_id)
    {
        if ($client_id !== 'ALL') {
            $this->db->where('client_id', $client_id);
        }
        $query = $this->db->get('vwbale_details');
        return $query->result_array();
    }


    function get_weight_unit()
    {
        $this->db->select('weight_units');
        $result = $this->db->get('tbl_settings')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->weight_units;
        }
    }

    function get_currency()
    {
        $this->db->select('currency');
        $result = $this->db->get('tbl_settings')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->currency;
        }
    }


}
