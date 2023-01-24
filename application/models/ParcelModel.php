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

    
    public function register_admin()
    {
        $password = $this->input->post('password');
        $password2 = $this->input->post('password-confirm');

        if ($password!=$password2){
            $this->session->set_flashdata('wrong', 'The password not equal with confirmation!');
            redirect('Parcel/register');
            }else{
            $data=array(
            "f_name"=>$this->input->post ('f_name'),
            "l_name"=>$this->input->post ('l_name'),
            "email"=>$this->input->post ('email'),
            "password"=>$password
            );

            $this->db->insert('admin',$data);
            $this->session->set_flashdata('suc', 'You are registered. Please login');
            redirect ('Parcel/login');

    }}

    public function login_admin(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $this->db->where('email', $email);
        $this->db->where('password',$password);
        $query=$this->db->get('admin'); 
        $find_admin=$query->num_rows($query);
        
        if($find_admin>0){
        $this->session->set_flashdata('suc', "You are logged in");
        redirect ('Dashboard/index');
        }else{
            $this->session->set_flashdata('warning','Incorrect Authentication!!!');
        redirect ('Parcel/login');
        }
    }

    //save parcel record
    public function save($capsule)
    {
        $insert = $this->db->insert('Parcel', $capsule);

        if ($insert) {
            return $msg = ("Data Inserted Successfully");
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

?>