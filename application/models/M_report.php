<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_report extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function get_bales($client_id)
    {
        $this->db->where('deleted', 0);
        if ($client_id !== null) {
            $this->db->where('client_id', $client_id);
        }
        $this->db->from('tbl_bales');
        $this->db->order_by('bale_id', 'desc');
        $query = $this->db->get();
        
        return $query->result_array();
    }
    

}
