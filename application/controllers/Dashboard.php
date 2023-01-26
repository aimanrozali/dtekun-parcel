<?php

class Dashboard extends CI_Controller
{

	//constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		$this->load->helper('url');


	}

	//display dashboard
	public function index()
	{
		$data['sales'] = array_reverse($this->DashboardModel->fetchSales(), true);

		$data['parcel'] = array_reverse($this->DashboardModel->fetchParcelCount(), true);

		$this->template->content->view('dashboard', $data);

		// Publish the template
		$this->template->publish();
	}

}