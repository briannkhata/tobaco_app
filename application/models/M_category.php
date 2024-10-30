<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_category extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_categories()
    {
        $this->db->where('deleted', 0);
        $this->db->order_by('category_id', 'DESC');
        $query = $this->db->get('tbl_categories');
        return $query->result_array();
    }

    function get_category_by_id($category_id)
    {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('tbl_categories');
        return $query->result_array();
    }

    function get_category_name($category_id)
    {
        $this->db->select('category_name');
        $this->db->where('category_id', $category_id);
        $result = $this->db->get('tbl_categories')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->category_name;
        }
    }

    function get_category_description($category_id)
    {
        $this->db->select('description');
        $this->db->where('category_id', $category_id);
        $result = $this->db->get('tbl_categories')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->description;
        }
    }

}
