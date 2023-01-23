<?php

class FinanceModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  //We will put queries in functions
  public function fetchAllFinance()
  {
    //Queries here
    $query = $this->db->get('Finance');
    return $query->result();

  }

  public function getRevenue($totalSales)
  {
    // $dateBefore = date_create($closingDate)->modify('-1 days')->format('Y-m-d');

    //Fetch Latest Total Opening 
    $sql = "SELECT openingNextDay FROM Finance ORDER BY closing_ID DESC LIMIT 1";

    $totalOpeningBefore = $this->db->query($sql)->result();
    return $totalSales - $totalOpeningBefore[0]->openingNextDay;
  }

  public function saveFinance($finance)
  {
    //Separate Data
    $closing_date = $finance['closingDate'];
    $closingManager = $finance['picClosing'];
    $totalCash = $finance['totalCash'];
    $totalOnline = $finance['totalOnline'];
    $totalSales = $totalCash + $totalOnline;
    $revenue = $this->getRevenue($totalSales);
    $cashInHand = $finance['totalCashManager'];
    $cashToManager = $finance['cashToManager'];
    $openingNextDay = $finance['totalOpening'];

    //Create Into Query
    $query = array('closing_date' => $closing_date, 'closing_manager' => $closingManager, 'total_cash' => $totalCash, 'total_Online' => $totalOnline, 'total_sales' => $totalSales, 'total_revenue' => $revenue, 'cash_in_hand' => $cashInHand, 'cash_to_manager' => $cashToManager, 'openingNextDay' => $openingNextDay);

    //Save to DB
    if ($this->db->insert('Finance', $query)) {
      return "Data Inserted";
    } else {
      return "Failed to Insert Closing Details";
    }
  }
}

?>