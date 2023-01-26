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
		$data['revenue'] = $this->DashboardModel->fetchRevenue();

		$data['parcel'] = $this->DashboardModel->fetchParcelCount();

		$this->template->content->view('dashboard', $data);

		// Publish the template
		$this->template->publish();
	}

}