<?php

class Parcel extends CI_Controller {


	public function index()
	{	
		$this->template->content->view('parcel-list');
       
		// Publish the template
		$this->template->publish();
	}

	public function recordParcel()
	{	
		$this->template->content->view('record-parcel');
       
		// Publish the template
		$this->template->publish();
	}

}
