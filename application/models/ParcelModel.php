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
        $query = $this->db->get('Parcel');
        return $query->result();
    }

    public function save($capsule)
    {
        $insert = $this->db->insert('Parcel', $capsule);

        if ($insert) {
            return $msg = ("Data Inserted Successfully");
        }
    }

    public function changeStatus($tracking_number, $data, $dateClaimed)
    {
		$this->db->where('tracking_number', $tracking_number);
		$this->db->update('Parcel', $data);  //Update status here
		$this->db->update('Parcel', array('date_claimed' => $dateClaimed));
    }

    public function deleteParcel($trackingNo)
    {
        return $this->db->delete('Parcel', ['tracking_number' => $trackingNo]);
    }

    public function searchParcelbyTrackingNum($trackingNum)
    {
       $this->db->select('*');
       $this->db->from('Parcel');
       $this->db->where('tracking_number', $trackingNum);
       $query = $this->db->get();

       return $query;
    }

    public function update_data($tracking_number, $data) 
    {
        $this->db->where('tracking_number', $tracking_number);
        $this->db->update('Parcel', $data);
        return $this->db->affected_rows();
    }

}

?>