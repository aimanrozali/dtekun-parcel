<?php

class DashboardModel extends CI_Model
{
  function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function fetchParcelCount()
  {

    $query = "SELECT DATE(date_arrived) as DateArrived, count(tracking_number) as total FROM Parcel GROUP BY DATE(date_arrived) order by DATE(date_arrived) ASC LIMIT 7";
    $res = $this->db->query($query);
    return $res->result();
  }

  function fetchSales()
  {
    $sql = "SELECT closing_date as DateClose, SUM(total_sales) as total FROM Finance GROUP BY closing_date order by closing_date ASC LIMIT 7";

    return $this->db->query($sql)->result();
  }
}

?>