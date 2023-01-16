<?php
defined ('BASEPATH') OR exit('No direct script access allowed. ');

class ParcelModel extends CI_Model
{
  public function __construct(){
    $this->load->database();
}

public function get_parcel() {
    $query = $this->db->get('parcel');
    if($query->num_rows() > 0) {
        $result = $query->result_array();
        return $result;
    }

    else{
        return false;
    }
}

public function save($capsule)
{
    $insert = $this->db->insert('parcel', $capsule);

    if($insert)
    {
       return $msg = ("Data Inserted Successfully");
    }
}


}

?>