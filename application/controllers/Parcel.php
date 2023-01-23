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

	public function parcelList()
	{
		// retrieve data from model
		$data['parcelList'] = $this->ParcelModel->get_parcel();

		// load data to view
		$this->template->content->view('parcel-list', $data);
		
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

		
		if($this->ParcelModel->save($capsule)){
			redirect('Parcel/recordParcel');
		}

	}

	public function change_status()
	{
		//get hidden values in variables
		$tracking_number = $this->input->post('tracking_number');
		$parcel_status = $this->input->post('parcel_status');

		//check condition
		if ($parcel_status == '1') {
			$parcel_status = '0';
		} else {
			$parcel_status = '1';
		}

		$data = array('parcel_status' => $parcel_status);

		date_default_timezone_set("Asia/Kuala_Lumpur");

		$dateClaimed = date("d/m/Y");

		$this->ParcelModel->changeStatus($tracking_number, $data,$dateClaimed);

		return redirect('Parcel/parcelList');
	}

	public function trackParcel()
	{
		//$data = $this->data;

		$data = $this->db->select('*')->from('Parcel')->get()->result();

		//$data['parcel'] = $this->parcelmodel->get_parcel();
		$this->template->content->view('track-parcel', ['data' => $data]);

		// Publish the template
		$this->template->publish();
	}
}