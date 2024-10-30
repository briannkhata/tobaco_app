<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_branch extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_branches()
    {
        $this->db->where('deleted', 0);
        $this->db->order_by('branch_id', 'DESC');
        $query = $this->db->get('tbl_branches');
        return $query->result_array();
    }

    function get_branch_by_id($branch_id)
    {
        $this->db->where('branch_id', $branch_id);
        $query = $this->db->get('tbl_branches');
        return $query->result_array();
    }

    function get_branch_name($branch_id)
    {
        $this->db->select('branch_name');
        $this->db->where('branch_id', $branch_id);
        $result = $this->db->get('tbl_branches')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->branch_name;
        }
    }

    function get_branch_description($branch_id)
    {
        $this->db->select('description');
        $this->db->where('branch_id', $branch_id);
        $result = $this->db->get('tbl_branches')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->description;
        }
    }

    function get_branch_address($branch_id)
    {
        $this->db->select('address');
        $this->db->where('branch_id', $branch_id);
        $result = $this->db->get('tbl_branches')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->address;
        }
    }

    function get_primary_contact($branch_id)
    {
        $this->db->select('primary_contact');
        $this->db->where('branch_id', $branch_id);
        $result = $this->db->get('tbl_branches')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->primary_contact;
        }
    }

    function get_other_contact($branch_id)
    {
        $this->db->select('other_contact');
        $this->db->where('branch_id', $branch_id);
        $result = $this->db->get('tbl_branches')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->other_contact;
        }
    }


}
