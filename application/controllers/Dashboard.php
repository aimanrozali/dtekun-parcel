<?php

class Dashboard extends CI_Controller {

	//constructor
	public function __construct()
	{
		parent::__construct();
		

	}

	//display dashboard
	public function index()
	{	
		$this->template->content->view('dashboard');
       
		// Publish the template
		$this->template->publish();
	}

}
