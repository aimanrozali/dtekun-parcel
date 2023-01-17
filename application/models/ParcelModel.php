<?php
defined('BASEPATH') or exit('No direct script access allowed. ');

class ParcelModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_parcel()
    {
        $query = $this->db->select('*')->from('Parcel')->get()->result();
        // if ($query->num_rows() > 0) {
        //     $result = $query->result_array();
        //     return $result;
        // } else {
        //     return false;
        // }
        return $query;
    }

    public function save($capsule)
    {
        $insert = $this->db->insert('Parcel', $capsule);

        if ($insert) {
            return $msg = ("Data Inserted Successfully");
        }
    }


}

?>