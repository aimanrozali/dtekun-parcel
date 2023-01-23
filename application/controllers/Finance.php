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
		if ($this->FinanceModel->saveFinance($financeDet)) {
			redirect('Finance/financialHistory');
		}
	}

	public function financialHistory()
	{

		$data['financehist'] = $this->FinanceModel->fetchAllFinance();
		$this->template->content->view('financial-history', $data);

		// Publish the template
		$this->template->publish();
	}

}