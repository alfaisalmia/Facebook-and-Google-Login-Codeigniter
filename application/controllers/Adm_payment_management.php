<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_payment_management extends CI_Controller {

   public function __construct() {
      parent::__construct();
      date_default_timezone_get("Asia/Dhaka");
      $mytype = $this->session->userdata("mytype");
      if ($mytype != "a" && $mytype != "e") {
         redirect(base_url() . "self-care", "refresh");
      }
   }

   public function index() {
      $data = array();
      $data['title'] = "Payment Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("activation !=" => 0, "packageid > " => 0, "type" => "c"), array("username", "asc"));
      $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
      $data['content'] = $this->load->view("back/payment-new", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function insert() {
      $custid = $this->input->post("customerid", TRUE);

      if ($custid > 0) {
         $mytype = $this->input->post("mytype", TRUE);
         $data = array(
             "customerid" => $this->input->post("customerid", TRUE),
             "amount" => $this->input->post("amount", TRUE),
             "date" => $this->input->post("date", TRUE),
             "operatorid" => $this->session->userdata("myid"),
             "paymentmethod" => $this->input->post("payment", TRUE)
         );

         if ($mytype == 'a') {
            $data['active'] = 1;
         }


         if ($this->input->post("payment", TRUE) == 1 || $this->input->post("payment", TRUE) == 5) {
            $data['number'] = "";
         } else {
            $data['number'] = $this->input->post("num", TRUE);
         }

         if ($this->am->Save_Data("billing", $data)) {
            $sdata['msg'] = "Save Successful";
            $sdata['err'] = 0;
            $this->session->set_userdata($sdata);
            redirect(base_url() . "payment-management", "refresh");
         } else {
            $data = array();
            $data['title'] = "Payment Management | Black Box Internet";
            $data['keywords'] = "";
            $data['description'] = "";
            $data['menu'] = "";
            $this->load->library("form_validation");
            $data['allCustomer'] = $this->am->View_Data("customer", "*", array("activation" => 1, "packageid > " => 0, "type" => "c"), array("username", "asc"));
            $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
            $sdata['msg'] = "Value missing in required field";
            $sdata['err'] = 1;
            $this->session->set_userdata($sdata);
            $data['content'] = $this->load->view("back/payment-new", $data, TRUE);
            $this->load->view('master', $data);
         }
      } else {
         $data = array();
         $data['title'] = "Payment Management | Black Box Internet";
         $data['keywords'] = "";
         $data['description'] = "";
         $data['menu'] = "";
         $this->load->library("form_validation");
         $data['allCustomer'] = $this->am->View_Data("customer", "*", array("activation" => 1, "packageid > " => 0, "type" => "c"), array("username", "asc"));
         $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
         $sdata['err'] = 1;
         $sdata['msg'] = "Value missing in required field";
         $this->session->set_userdata($sdata);
         $data['content'] = $this->load->view("back/payment-new", $data, TRUE);
         $this->load->view('master', $data);
      }
   }

   public function pending_payment() {
      $mytype = $this->session->userdata("mytype");
      if ($mytype != "a") {
         redirect(base_url(), "refresh");
      }

      $data = array();
      $this->load->library("form_validation");
      $data['title'] = "Payment Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";

      $url = "";

      $id = $this->uri->segment(3);
      if ($id != NULL) {
         $this->am->Update_Data("billing", array("active" => 1), array("id" => $id));
         $this->session->set_userdata(array("msg" => "Payment confirm successful", "err" => 0));
      }


      $where = array();
      if (isset($_GET['cid']) && $_GET['cid'] > 0) {
         $where['customerid'] = $_GET['cid'];
         $url .= "cid={$_GET['cid']}";
      }
      if ($_GET['sdate'] != "" && $_GET['edate'] != "") {
         $where['date >='] = $_GET['sdate'];
         $where['date <='] = $_GET['edate'];
         $url .= "sdate={$_GET['sdate']}&edate={$_GET['sdate']}";
      } else if ($_GET['sdate'] != "") {
         $where['date'] = $_GET['sdate'];
         $url .= "sdate={$_GET['sdate']}";
      } else if ($_GET['edate'] != "") {
         $where['date'] = $_GET['edate'];
         $url .= "edate={$_GET['sdate']}";
      }

      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("type" => 0), array("username", "asc"));

      if ($where) {
         $where['type'] = 0;
         $where['active'] = 0;
         $data['allPayment'] = $this->am->View_Data("billing", "*", $where, array("id", "desc"), "");
      } else {
         $where['type'] = 0;
         $where['active'] = 0;
         $data['allPayment'] = $this->am->View_Data("billing", "*", $where, array("id", "desc"), "");
      }
      $data['url'] = $url;
      $data['content'] = $this->load->view("back/pending-payment", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function view() {
      $data = array();
      $this->load->library("form_validation");
      $data['title'] = "Payment Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";

      $where = array();
      if (isset($_GET['cid']) && $_GET['cid'] > 0) {
         $where['customerid'] = $_GET['cid'];
      }
      if ($_GET['sdate'] != "" && $_GET['edate'] != "") {
         $where['date >='] = $_GET['sdate'];
         $where['date <='] = $_GET['edate'];
      } else if ($_GET['sdate'] != "") {
         $where['date'] = $_GET['sdate'];
      } else if ($_GET['edate'] != "") {
         $where['date'] = $_GET['edate'];
      }

      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("type" => 0), array("username", "asc"));

      if ($where) {
         $where['type'] = 0;
         $data['allPayment'] = $this->am->View_Data("billing", "*", $where, array("id", "desc"), "");
      }
      $data['content'] = $this->load->view("back/payment-view", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function edit($id) {
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a') {
         redirect(base_url(), "refresh");
      }

      $data = array();
      $data['title'] = "Payment Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("activation" => 1, "packageid > " => 0, "type" => "c"), array("username", "asc"));
      $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
      $data['selBill'] = $this->am->View_Data("billing", "*", array("id" => $id), array("id", "asc"));
      $data['content'] = $this->load->view("back/payment-edit", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function update() {
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a') {
         redirect(base_url(), "refresh");
      }

      $data = array(
          "customerid" => $this->input->post("customerid", TRUE),
          "amount" => $this->input->post("amount", TRUE),
          "date" => $this->input->post("date", TRUE),
          "operatorid" => $this->session->userdata("myid"),
          "paymentmethod" => $this->input->post("payment", TRUE)
      );

      if ($mytype == 'a') {
         $data['active'] = 1;
      } else {
         $data['active'] = 0;
      }

      if ($this->input->post("payment", TRUE) == 1 || $this->input->post("payment", TRUE) == 5) {
         $data['number'] = "";
      } else {
         $data['number'] = $this->input->post("num", TRUE);
      }


      if ($this->am->Update_Data("billing", $data, array("id" => $this->input->post("id", TRUE)))) {
         $sdata['err'] = 0;
         $sdata['msg'] = "Update Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "payment-management/view", "refresh");
      } else {
         $sdata['err'] = 1;
         $sdata['msg'] = "Some Error Occurs";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "payment-management/view", "refresh");
      }
   }

   public function delete($id) {
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a') {
         redirect(base_url(), "refresh");
      }
      if ($this->am->Delete_Data("billing", array("id" => $id))) {
         $sdata['err'] = 0;
         $sdata['msg'] = "Delete Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "payment-management/view", "refresh");
      } else {
         $sdata['err'] = 1;
         $sdata['msg'] = "Some Error Occurs";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "payment-management/view", "refresh");
      }
   }

}