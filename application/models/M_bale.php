<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_bale extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_bales()
    {
        $this->db->where('deleted', 0);
        $this->db->from('tbl_bales');
        $this->db->order_by('bale_id', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_unit_id($bale_id)
    {
        $this->db->select('unit_id');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->unit_id;
        } else {
            return '';
        }
    }



    function get_expired_bales()
    {
        $yesterday_date = date('Y-m-d', strtotime('-1 day'));
        $this->db->where('deleted', 0);
        $this->db->where('expiry_date <=', $yesterday_date);
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_new_bales()
    {
        $current_date = date('Y-m-d');
        $two_weeks_from_now_date = date('Y-m-d', strtotime('+2 weeks'));
        $this->db->where('deleted', 0);
        $this->db->where('date_added >=', $current_date);
        $this->db->where('date_added <=', $two_weeks_from_now_date);
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_sales_by_sale_id($sale_id)
    {
        $this->db->where('sale_id', $sale_id);
        $this->db->from('tbl_sale_details');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_total_by_sale_id($sale_id)
    {
        $this->db->select('total');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get('tbl_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->total;
        } else {
            return 0;
        }
    }

    function get_vat_by_sale_id($sale_id)
    {
        $this->db->select('vat');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get('tbl_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->vat;
        } else {
            return 0;
        }
    }

    function get_tendered_by_sale_id($sale_id)
    {
        $this->db->select('tendered');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get('tbl_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->tendered;
        } else {
            return 0;
        }
    }

    function get_sub_by_sale_id($sale_id)
    {
        $this->db->select('sub_total');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get('tbl_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->sub_total;
        } else {
            return 0;
        }
    }

    function get_change_by_sale_id($sale_id)
    {
        $this->db->select('change');
        $this->db->where('sale_id', $sale_id);
        $query = $this->db->get('tbl_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->change;
        } else {
            return 0;
        }
    }

    function get_bales_running_low()
    {
        $this->db->where('deleted', 0);
        $this->db->where('expiry_date >', date('Y-m-d'));
        //$this->db->where('qty <= reorder_level');
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_depleted_bales()
    {
        $this->db->where('deleted', 0);
        $this->db->where('expiry_date >', date('Y-m-d'));
        //$this->db->where('qty <= 0');
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_shop_qty($bale_id, $shop_id)
    {
        $this->db->select('qty');
        $this->db->where('bale_id', $bale_id);
        $this->db->where('shop_id', $shop_id);
        $query = $this->db->get('tbl_quantities');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->qty;
        } else {
            return 0;
        }
    }

    function get_qty($bale_id)
    {
        $this->db->select('qty');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_quantities');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->qty;
        } else {
            return 0;
        }
    }

    function get_bale_in_cart($bale_id, $user_id, $client_id, $shop_id)
    {
        $this->db->select('*');
        $this->db->where('bale_id', $bale_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $query = $this->db->get('tbl_cart_sales')->result_array();
        return $query;
    }

    function get_cart_id_by_bale_id($bale_id, $user_id, $client_id, $shop_id)
    {
        $this->db->select('cart_id');
        $this->db->where('bale_id', $bale_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $query = $this->db->get('tbl_cart_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->cart_id;
        } else {
            return '';
        }
    }

    function get_cart_qty($cart_id)
    {
        $this->db->select('qty');
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get('tbl_cart_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->qty;
        } else {
            return 0;
        }
    }

    function get_cart_price($cart_id)
    {
        $this->db->select('price');
        $this->db->where('cart_id', $cart_id);
        $query = $this->db->get('tbl_cart_sales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->price;
        } else {
            return '';
        }
    }

    function get_total_sum_cart($user_id, $client_id, $shop_id)
    {
        $this->db->select_sum('total');
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $result = $this->db->get('tbl_cart_sales')->row();
        return $result->total ?? 0;
    }

    function get_sub_total_sum_cart($user_id, $client_id, $shop_id)
    {
        $this->db->select_sum('sub_total');
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $result = $this->db->get('tbl_cart_sales')->row();
        return $result->sub_total ?? 0;
    }

    function get_total_vat_cart($user_id, $client_id, $shop_id)
    {
        $this->db->select_sum('vat');
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $result = $this->db->get('tbl_cart_sales')->row();
        return $result->vat ?? 0;
    }

    function get_sales_details($user_id, $client_id, $shop_id, $sale_id)
    {
        $this->db->select_sum('vat');
        $this->db->where('user_id', $user_id);
        $this->db->where('client_id', $client_id);
        $this->db->where('shop_id', $shop_id);
        $this->db->where('sale_id', $sale_id);
        $result = $this->db->get('tbl_sale_details')->result_array();
        return $result;
    }

    function searchbales($barcode)
    {
        $this->db->select('bale_id, barcode,selling_price, unit_id,category_id, name, `desc`');
        $this->db->from('tbl_bales');
        $this->db->like('barcode', $barcode);
        $this->db->where('deleted', 0);
        $query = $this->db->get();
        $results = $query->result_array();
        if (empty($results)) {
            $allbalesQuery = $this->db->get('tbl_bales');
            return $allbalesQuery->result_array();
        }
        return $results;
    }

    function get_bale_by_cart_id($cart_id)
    {
        $this->db->where('cart_id', $cart_id);
        $this->db->from('tbl_cart_sales');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_paused_sales()
    {
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from('tbl_cart_sales');
        $this->db->group_by('session_id');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_cart($user_id, $client_id, $shop_id)
    {
        return $this->db
            ->select('*')
            ->from('tbl_cart_sales')
            ->where('user_id', $user_id)
            ->where('client_id', $client_id)
            ->where('shop_id', $shop_id)
            ->order_by('cart_id', 'desc')
            ->get()
            ->result_array();
    }

    function get_bale_by_barcode($barcode)
    {
        $this->db->where('deleted', 0);
        $this->db->where('barcode', $barcode);
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_price($bale_id)
    {
        $this->db->select('selling_price');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->selling_price;
        } else {
            return 0;
        }
    }

    function get_bales_by_category($category_id)
    {
        $this->db->where('deleted', 0);
        $this->db->where('category_id', $category_id);
        $this->db->from('tbl_bales');
        $query = $this->db->get();
        return $query->result_array();
    }



    function get_bales()
    {
        $this->db->where('deleted', 0);
        $this->db->from('tbl_bales');
        $this->db->order_by('bale_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }





    function check_category_existance($cat_name)
    {
        $this->db->where('category_name', $cat_name);
        $query = $this->db->get('tbl_categories');
        return $query->num_rows();
    }


    function get_pending_disposal()
    {
        $this->db->where('deleted', 0);
        $this->db->where('dispose_state', 'pending');
        $this->db->order_by('bale_id', 'DESC');
        $query = $this->db->get('tbl_bales');
        return $query->result_array();
    }





    function get_cost_price($bale_id)
    {
        $this->db->select('cost_price');
        $this->db->where('bale_id', $bale_id);
        $result = $this->db->get('tbl_bales')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->cost_price;
        }
    }

    function get_deleted_or_not($bale_id)
    {
        $this->db->select('deleted');
        $this->db->where('bale_id', $bale_id);
        $result = $this->db->get('tbl_bales')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->deleted;
        }
    }

    function get_barcode($bale_id)
    {
        $this->db->select('barcode');
        $this->db->where('bale_id', $bale_id);
        $result = $this->db->get('tbl_bales')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->barcode;
        }
    }

    function get_name($bale_id)
    {
        $this->db->select('name');
        $this->db->where('bale_id', $bale_id);
        $result = $this->db->get('tbl_bales')->row();
        if ($result == NULL) {
            return "";
        } else {
            return $result->name;
        }
    }


    function get_bale_by_id($bale_id)
    {
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        return $query->result_array();
    }


}
