<?php

class Parcel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('ParcelModel');

	}

	public function index()
	{
		$data = $this->db->select('*')->from('Parcel')->order_by('tracking_number', 'asc')->get()->result(); //here i'm fetching the data form the table
		$this->template->content->view('parcel-list', ['data' => $data]);
		// Publish the template
		$this->template->publish();
	}

	public function recordParcel()
	{
		$this->template->content->view('record-parcel');

		// Publish the template
		$this->template->publish();
	}

	public function data_insert()
	{
		$taggingNum = $this->input->post('parcelTag');
		$trackingNo = $this->input->post('trackingNum');
		$cust = $this->input->post('custName');
		$phone = $this->input->post('phoneNum');
		$cour = $this->input->post('courier');
		$size = $this->input->post('size');

		if ($size == "S") {
			$price = "0.50";
		} else if ($size == "M") {
			$price = "1.00";
		} else {
			$price = "2.00";
		}

		$capsule = array('tagID' => $taggingNum, 'tracking_number' => $trackingNo, 'parcel_name' => $cust, 'parcel_phone' => $phone, 'parcel_courier' => $cour, 'parcel_size' => $size, 'price' => $price);

		$this->ParcelModel->save($capsule);

	}

	public function change_status()
	{
		//get hidden values in variables
		$parcel_id = $this->input->post('parcel_id');
		$status = $this->input->post('status');

		//check condition
		if ($status == '1') {
			$parcel_status = '0';
		} else {
			$parcel_status = '1';
		}

		$data = array('status' => $parcel_status);

		$this->db->where('tracking_number', $parcel_id);
		$this->db->update('parcel', $data); //Update status here

		return redirect('parcel');
	}

	public function trackParcel()
	{
		$this->template->content->view('track-parcel');

		// Publish the template
		$this->template->publish();
	}
}