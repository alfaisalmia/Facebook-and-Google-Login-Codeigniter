<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_billing_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_get("Asia/Dhaka");
        $mytype = $this->session->userdata("mytype");
        if ($mytype != 'a') {
            redirect(base_url(), "refresh");
        }
    }

    public function index() {
        $data = array();
        $data['title'] = "Billing Management | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "";
        $this->load->library("form_validation");
        $data['allCustomer'] = $this->am->View_Data("customer", "*", array("activation" => 1, "packageid > " => 0, "type" => "c"), array("username", "asc"));
        $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
        $data['content'] = $this->load->view("back/billing-new", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function insert() {
        $custid = $this->input->post("customerid", TRUE);
        $date = $this->input->post("date", TRUE);

        if ($custid > 0) {
            
        } else {
            $allCust = $this->am->View_Data_Two_Table("customer c", "package p", "c.id, p.price", "c.packageid=p.id", array("c.activation" => 1, "type" => "c"), "", "");

            foreach ($allCust as $value) {
                $result = $this->am->Billing($value->id, substr($date, 0, 7));
                if (!$result) {
                    $data = array(
                        "customerid" => $value->id,
                        "amount" => $value->price,
                        "date" => $date,
                        "operatorid" => $this->session->userdata("myid"),
                        "type" => 1,
                        "active" => 1
                    );
                    //print_r($data);
                    $this->am->Save_Data("billing", $data);
                }
            }
            $sdata['msg'] = "Billing Create Successful";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billing-management", "refresh");
        }
    }

    public function view() {
        $data = array();
        $this->load->library("form_validation");
        $data['title'] = "Billing Management | Black Box Internet";
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
            $where['type'] = 1;
            $data['allBilling'] = $this->am->View_Data("billing", "*", $where, array("id", "desc"), "");
        }
        $data['content'] = $this->load->view("back/billing-view", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function edit($id) {
        $data = array();
        $data['title'] = "Billing Management | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "";
        $this->load->library("form_validation");
        $data['selBill'] = $this->am->View_Data("billing", "*", array("id" => $id), array("id", "asc"));
        $data['content'] = $this->load->view("back/billing-edit", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function update() {
        $mytype = $this->session->userdata("mytype");
        if ($mytype != 'a') {
            redirect(base_url(), "refresh");
        }

        $data = array(
            "amount" => $this->input->post("amount", TRUE)
        );

        if ($this->am->Update_Data("billing", $data, array("id" => $this->input->post("id", TRUE)))) {
            $sdata['msg'] = "Update Successful";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billing-management/view", "refresh");
        } else {
            $sdata['msg'] = "Some Error Occurs";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billing-management/view", "refresh");
        }
    }

    public function delete($id) {
        $mytype = $this->session->userdata("mytype");
        if ($mytype != 'a') {
            redirect(base_url(), "refresh");
        }
        if ($this->am->Delete_Data("billing", array("id" => $id))) {
            $sdata['msg'] = "Delete Successful";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billing-management/view", "refresh");
        } else {
            $sdata['msg'] = "Some Error Occurs";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "billing-management/view", "refresh");
        }
    }

}
