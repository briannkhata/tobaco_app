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

    function get_bale_by_id($bale_id)
    {
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        return $query->result_array();
    }
    // function get_bale_details($bale_id)
    // {
    //     $this->db->where('bale_id', $bale_id);
    //     $query = $this->db->get('vwbale_details');
    //     return $query->result_array();
    // }





    // function get_bale_details($bale_id)
    // {
    //     $this->db->where('bale_id', $bale_id);
    //     $query = $this->db->get('vwbale_details');
    //     $result = $query->result_array();

    //     $string_representation = "";
    //     foreach ($result as $row) {
    //         foreach ($row as $key => $value) {
    //             $string_representation .= "$key: $value\n";
    //         }
    //         $string_representation .= "\n";
    //     }

    //     return $string_representation;
    // }


    // function get_bale_details($bale_id)
    // {
    //     $this->db->where('bale_id', $bale_id);
    //     $query = $this->db->get('vwbale_details');
    //     $result = $query->result_array();

    //     if (empty($result)) {
    //         return "No details found for bale ID: $bale_id";
    //     }

    //     $string_representation = [];
    //     $max_key_length = 0;

    //     // First pass to determine the maximum key length
    //     foreach ($result as $row) {
    //         foreach ($row as $key => $value) {
    //             // Skip 'bale_id' and 'client_id' keys
    //             if ($key === 'bale_id' || $key === 'client_id') {
    //                 continue;
    //             }
    //             $max_key_length = max($max_key_length, strlen($key));
    //         }
    //     }

    //     // Second pass to build the formatted string
    //     foreach ($result as $row) {
    //         foreach ($row as $key => $value) {
    //             // Skip 'bale_id' and 'client_id' keys
    //             if ($key === 'bale_id' || $key === 'client_id') {
    //                 continue;
    //             }
    //             // Align key and value
    //             $formatted_line = str_pad($key, $max_key_length + 2) . ": $value"; // Add padding
    //             $string_representation[] = $formatted_line;
    //         }
    //         $string_representation[] = ""; // Blank line for separation
    //     }

    //     return implode("\n", $string_representation);
    // }


    function get_bale_details($bale_id)
    {
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('vwbale_details');
        $result = $query->result_array();

        if (empty($result)) {
            return "No details found for bale ID: $bale_id";
        }

        $string_representation = [];
        $max_key_length = 0;

        // First pass to determine the maximum key length after modifying keys
        foreach ($result as $row) {
            foreach ($row as $key => $value) {
                // Skip 'bale_id' and 'client_id' keys
                if ($key === 'bale_id' || $key === 'client_id') {
                    continue;
                }
                // Remove underscores and capitalize each word
                $formatted_key = ucwords(str_replace('_', ' ', $key));
                $max_key_length = max($max_key_length, strlen($formatted_key));
            }
        }

        // Second pass to build the formatted string
        foreach ($result as $row) {
            foreach ($row as $key => $value) {
                // Skip 'bale_id' and 'client_id' keys
                if ($key === 'bale_id' || $key === 'client_id') {
                    continue;
                }
                // Format the key
                $formatted_key = ucwords(str_replace('_', ' ', $key));
                // Align key and value
                $formatted_line = str_pad($formatted_key, $max_key_length + 2) . ": $value"; // Add padding
                $string_representation[] = $formatted_line;
            }
            $string_representation[] = ""; // Add horizontal separator
        }

        return implode("\n", $string_representation);
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

    function get_price($bale_id)
    {
        $this->db->select('price');
        $this->db->where('bale_id', $bale_id);
        $query = $this->db->get('tbl_bales');
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->price;
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
