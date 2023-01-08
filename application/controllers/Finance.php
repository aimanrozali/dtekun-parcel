<?php

class Finance extends CI_Controller {

	public function recordFinance()
	{	
		$this->template->content->view('record-finance');
       
		// Publish the template
		$this->template->publish();
	}

	public function financialHistory()
	{	
		$this->template->content->view('financial-history');
       
		// Publish the template
		$this->template->publish();
	}

}
