<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lager extends CI_Controller {

   public function __construct() {
      parent::__construct();
      date_default_timezone_get("Asia/Dhaka");
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a' && $mytype != 'e') {
         redirect(base_url(), "refresh");
      }
   }

   public function customer_payment($id) {
      $data = array();
      $data['id'] = $id;
      $this->load->library("form_validation");
      $data['title'] = "Lager | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";

      $where = array();
      $where2 = array();
      if (isset($_GET['cid']) && $_GET['cid'] > 0) {
         $where['customerid'] = $_GET['cid'];
      }
      if ($_GET['sdate'] != "" && $_GET['edate'] != "") {
         $where['date >='] = $_GET['sdate'];
         $where['date <='] = $_GET['edate'];
         $dt = $_GET['sdate'];
      } else if ($_GET['sdate'] != "") {
         $where['date'] = $_GET['sdate'];
         $dt = $_GET['sdate'];
      } else if ($_GET['edate'] != "") {
         $where['date'] = $_GET['edate'];
         $dt = $_GET['edate'];
      }

      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("type" => 0), array("username", "asc"));

      if ($where) {
         $where['customerid'] = $id;
         $where['active'] = 1;
         $where2['customerid'] = $id;
         $data['allPayment'] = $this->am->View_Data("billing", "*", $where, array("date", "asc"), "");
         $data['balance'] = $this->am->Lager($id, $dt);
         
      }
      $data['content'] = $this->load->view("back/lager-view", $data, TRUE);
      $this->load->view('master', $data);
   }

}