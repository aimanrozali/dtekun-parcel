<?php

class Finance extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('FinanceModel');

	}

	public function recordFinance()
	{
		$this->template->content->view('record-finance');

		// Publish the template
		$this->template->publish();
	}

	public function submitClosing()
	{
		$financeDet = $this->input->post();
		$this->FinanceModel->saveFinance($financeDet);
		//redirect(recordFinance());
	}

	public function financialHistory()
	{
		$data = $this->data;

		$data['financehist'] = $this->financemodel->fetchAllFinance();
		$this->template->content->view('financial-history', ['financehist' => $data['financehist']]);

		// Publish the template
		$this->template->publish();
	}

}