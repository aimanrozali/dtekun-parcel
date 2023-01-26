<?php
defined('BASEPATH') or exit('No direct script access allowed. ');

class ParcelModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    //retrieve all parcel record
    public function get_parcel()
    {
        $query = $this->db->get('Parcel');
        return $query->result();
    }

    //save parcel record
    public function save($capsule)
    {
        //$insert = $this->db->insert('Parcel', $capsule);
        if(!$this->db->insert('Parcel', $capsule))
        {
            return $this->db->error();
        }

    }

    //verify/change parcel status
    public function changeStatus($tracking_number, $data, $dateClaimed)
    {
		$this->db->where('tracking_number', $tracking_number);
		$this->db->update('Parcel', $data);  //Update status here
		$this->db->update('Parcel', array('date_claimed' => $dateClaimed));
    }

    //delete parcel from list and database
    public function deleteParcel($trackingNo)
    {
        return $this->db->delete('Parcel', ['tracking_number' => $trackingNo]);
    }

    //parcel track and trace function
    public function searchParcelbyTrackingNum($trackingNum)
    {
       $this->db->select('*');
       $this->db->from('Parcel');
       $this->db->where('tracking_number', $trackingNum);
       $query = $this->db->get();

       return $query;
    }

    //update parcel in list and database
    public function update_data($tracking_number, $data) 
    {
        $this->db->where('tracking_number', $tracking_number);
        $this->db->update('Parcel', $data);
        return $this->db->affected_rows();
    }

}
