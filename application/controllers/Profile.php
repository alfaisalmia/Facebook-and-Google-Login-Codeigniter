<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $mytype = $this->session->userdata("mytype");
        if ($mytype == NULL) {
            redirect(base_url() . "self-care", "refresh");
        }
    }

    public function payment_with_bkash() {
        $data = array();
        $data['title'] = "Payment with bKash | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "paynow";
        $this->load->library("form_validation");
        $paynow = $this->input->post("paynow", TRUE);
        $this->form_validation->set_rules('num', 'Transaction ID', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|integer');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                "customerid" => $this->session->userdata("myid"),
                "amount" => $this->input->post("amount"),
                "paymentmethod" => 3,
                "number" => $this->input->post("num"),
                "date" => date("Y-m-d"),
                "operatorid" => $this->session->userdata("myid")
            );
            

            if ($this->am->Save_Data("billing", $data)) {
                $this->session->set_userdata(array("msg" => "Send successful. Balance shall be added within 24 hours", "err" => 0));
                redirect(base_url() . "payment-with-bkash", "refresh");
            } else {
                $this->session->set_userdata(array("msg" => "Some error occurs", "err" => 1));
                redirect(base_url() . "payment-with-bkash", "refresh");
            }
        }

        $data['content'] = $this->load->view("front/bkash", $data, TRUE);
        $this->load->view('master', $data);
    }
    public function payment_with_rocket() {
        $data = array();
        $data['title'] = "Payment with Rocket | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "paynow";
        $this->load->library("form_validation");
        $paynow = $this->input->post("paynow", TRUE);
        $this->form_validation->set_rules('num', 'Transaction ID', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|integer');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                "customerid" => $this->session->userdata("myid"),
                "amount" => $this->input->post("amount"),
                "paymentmethod" => 4,
                "number" => $this->input->post("num"),
                "date" => date("Y-m-d"),
                "operatorid" => $this->session->userdata("myid")
            );
            

            if ($this->am->Save_Data("billing", $data)) {
                $this->session->set_userdata(array("msg" => "Send successful. Balance shall be added within 24 hours", "err" => 0));
                redirect(base_url() . "payment-with-rocket", "refresh");
            } else {
                $this->session->set_userdata(array("msg" => "Some error occurs", "err" => 1));
                redirect(base_url() . "payment-with-rocket", "refresh");
            }
        }

        $data['content'] = $this->load->view("front/rocket", $data, TRUE);
        $this->load->view('master', $data);
    }
    public function payment_with_dbbl() {
        $data = array();
        $data['title'] = "Payment with DBBL | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "paynow";
        $this->load->library("form_validation");
        $paynow = $this->input->post("paynow", TRUE);
        $this->form_validation->set_rules('num', 'Transaction ID', 'trim|required');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|integer');
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                "customerid" => $this->session->userdata("myid"),
                "amount" => $this->input->post("amount"),
                "paymentmethod" => 2,
                "number" => $this->input->post("num"),
                "date" => date("Y-m-d"),
                "operatorid" => $this->session->userdata("myid")
            );
            

            if ($this->am->Save_Data("billing", $data)) {
                $this->session->set_userdata(array("msg" => "Send successful. Balance shall be added within 24 hours", "err" => 0));
                redirect(base_url() . "payment-with-dbbl", "refresh");
            } else {
                $this->session->set_userdata(array("msg" => "Some error occurs", "err" => 1));
                redirect(base_url() . "payment-with-dbbl", "refresh");
            }
        }

        $data['content'] = $this->load->view("front/dbbl", $data, TRUE);
        $this->load->view('master', $data);
    }
    public function index() {
        $data = array();
        $data['title'] = "Profile | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "profile";
        $data['selCustomer'] = $this->am->View_Data("customer", "*", array("id" => $this->session->userdata("myid")));
        $data['allPackage'] = $this->am->View_Data("package", "*");
        $data['content'] = $this->load->view("front/profile", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function lager() {
        $data = array();
        $id = $this->session->userdata("myid");
        $this->load->library("form_validation");
        $data['title'] = "Lager | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "lager";

        $where = array();
        $where2 = array();



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
        $data['content'] = $this->load->view("front/lager-view", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function edit() {
        $data = array();
        $data['title'] = "Edit Profile | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "profile";
        $this->load->library("form_validation");

        $upd = $this->input->post("upd", TRUE);
        if ($upd != NULL) {
            $this->load->helper('security');
            $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
            //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            //$this->form_validation->set_rules('addr', 'Address', 'trim|required|min_length[20]');
            $this->form_validation->set_rules('contact', 'Contact', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['selCustomer'] = $this->am->View_Data("customer", "*", array("id" => $this->session->userdata("myid")));
                $data['allPackage'] = $this->am->View_Data("package", "*");
                $data['content'] = $this->load->view("front/profile-edit", $data, TRUE);
                $this->load->view('master', $data);
            } else {
                $data = array(
                    "name" => $this->input->post("name", TRUE),
                    "address" => $this->input->post("addr", TRUE),
                    "contact" => $this->input->post("contact", TRUE)
                );
                $this->am->Update_Data("customer", $data, array("id" => $this->session->userdata("myid")));
                $this->session->set_userdata(array("msg" => "Update Successful", "err" => 0));
                redirect(base_url() . "profile", "refresh");
            }
        } else {
            $data['selCustomer'] = $this->am->View_Data("customer", "*", array("id" => $this->session->userdata("myid")));
            $data['allPackage'] = $this->am->View_Data("package", "*");
            $data['content'] = $this->load->view("front/profile-edit", $data, TRUE);
            $this->load->view('master', $data);
        }
    }

    public function myreferral() {
        $data = array();
        $data['title'] = "Profile | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "referral";
        $data['allCustomer'] = $this->am->View_Data("customer", "*", "", array("username", "asc"));
        $data['selCustomer'] = $this->am->View_Data("customer", "*", array("referralid" => $this->session->userdata("myid")), array("id" => "desc"));


        $data['content'] = $this->load->view("front/myreferral", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function billing() {
        $data = array();
        $id = $this->session->userdata("myid");
        $this->load->library("form_validation");
        $data['title'] = "Billing | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "billing";

        $where = array();
        $where['customerid'] = $id;
        if ($_GET['sdate'] != "" && $_GET['edate'] != "") {
            $where['date >='] = $_GET['sdate'];
            $where['date <='] = $_GET['edate'];
        } else if ($_GET['sdate'] != "") {
            $where['date'] = $_GET['sdate'];
        } else if ($_GET['edate'] != "") {
            $where['date'] = $_GET['edate'];
        }

        $data['allCustomer'] = $this->am->View_Data("customer", "*", "", array("username", "asc"));

        if ($where) {
            $data['allPayment'] = $this->am->View_Data("billing", "*", $where, array("date", "desc"), array(30, 0));
        }
        $data['content'] = $this->load->view("front/billing-view", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function change_password() {
        $data = array();
        $data['title'] = "Billing Management | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "change-password";

        $this->load->library("form_validation");
        $cp = $this->input->post("cp", TRUE);
        if ($cp != NULL) {
            $password = $this->am->View_Data("customer", "password", array("id" => $this->session->userdata("myid")));
            foreach ($password as $p) {
                $pass = $p->password;
            }
            $pass1 = $this->input->post("pass1");
            $pass2 = $this->input->post("pass2");
            $pass3 = $this->input->post("pass3");

            if ($pass1 == "") {
                $sdata['msg'] = "Current Password Required";
            } else if ($pass2 == "") {
                $sdata['msg'] = "New Password Required";
            } else if ($pass2 != $pass3) {
                $sdata['msg'] = "Password Not Match";
            } else if ($pass != md5($pass1)) {
                $sdata['msg'] = "Invalid Current Password";
            } else {
                $this->am->Update_Data("customer", array("password" => md5($pass2)), array("id" => $this->session->userdata("myid")));
                $sdata['msg'] = "Password Change Successful";
            }
            $this->session->set_userdata($sdata);
        }
        $data['content'] = $this->load->view("front/change-password", $data, TRUE);
        $this->load->view('master', $data);
    }

    public function documents() {
        $data = array();
        $data['title'] = "Upload Documents | Black Box Internet";
        $data['keywords'] = "";
        $data['description'] = "";
        $data['menu'] = "account";
        $data['menu1'] = "profile";

        $selCustomer = $this->am->View_Data("customer", "*", array("id" => $this->session->userdata("myid"), "activation" => 0));

        if (!$selCustomer) {
            redirect(base_url() . "profile", "refresh");
        }

        $this->load->library("form_validation");
        $docup = $this->input->post("docup", TRUE);
        if ($docup != NULL) {
            $id = $this->session->userdata("myid");
            $data = $this->am->View_Data("customer", "*", array("id" => $id));
            foreach ($data as $value) {
                $name = $value->name;
                $old_ext1 = $value->picture;
                $old_ext2 = $value->nid;
                $old_ext3 = $value->passport;
            }

            //Profile Picture
            if ($_FILES['pic']['name']) {
                $ext1 = pathinfo($_FILES["pic"]["name"]);
                $ext1 = strtolower($ext1['extension']);
                if ($ext1 != "jpg" && $ext1 != "jpeg" && $ext1 != "png" && $ext1 != "gif") {
                    $ext1 = $old_ext1;
                } else {
                    if (file_exists("images/documents/" . md5($value->id . "kichu-na") . "-profile.{$old_ext1}")) {
                        unlink("images/documents/" . md5($value->id . "kichu-na") . "-profile.{$old_ext1}");
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = './images/documents';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '10000';
                    $config['max_width'] = '1000';
                    $config['max_height'] = '1000';
                    $config['file_name'] = md5($id . "kichu-na") . "-profile.{$ext1}";
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload('pic');
                }
            } else {
                $ext1 = $old_ext1;
            }

            //NID
            if ($_FILES['nid']['name']) {
                $ext2 = pathinfo($_FILES["nid"]["name"]);
                $ext2 = strtolower($ext2['extension']);
                if ($ext2 != "jpg" && $ext2 != "jpeg" && $ext2 != "png" && $ext2 != "gif") {
                    $ext2 = $old_ext2;
                } else {
                    if (file_exists("images/documents/" . md5($value->id . "nid-kichu-na") . "-nid.{$old_ext2}")) {
                        unlink("images/documents/" . md5($value->id . "nid-kichu-na") . "-nid.{$old_ext2}");
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = './images/documents';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '10000';
                    $config['max_width'] = '1500';
                    $config['max_height'] = '1500';
                    $config['file_name'] = md5($id . "nid-kichu-na") . "-nid.{$ext2}";
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload('nid');
                }
            } else {
                $ext2 = $old_ext2;
            }

            //Passport
            if ($_FILES['passport']['name']) {
                $ext3 = pathinfo($_FILES["passport"]["name"]);
                $ext3 = strtolower($ext3['extension']);
                if ($ext3 != "jpg" && $ext3 != "jpeg" && $ext3 != "png" && $ext3 != "gif") {
                    $ext3 = $old_ext3;
                } else {
                    if (file_exists("images/documents/" . md5($id . "passport-kichu-na") . "-passport.{$old_ext3}")) {
                        unlink("images/documents/" . md5($id . "passport-kichu-na") . "-passport.{$old_ext3}");
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = './images/documents';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '10000';
                    $config['max_width'] = '1500';
                    $config['max_height'] = '1500';
                    $config['file_name'] = md5($id . "passport-kichu-na") . "-passport.{$ext3}";
                    $this->upload->initialize($config); //upload image data
                    $this->upload->do_upload('passport');
                }
            } else {
                $ext3 = $old_ext3;
            }


            $data = array(
                "nid" => $ext2,
                "nid_number" => $this->input->post("nid_number", TRUE),
                "passport" => $ext3,
                "passport_number" => $this->input->post("passport_number", TRUE),
                "picture" => $ext1
            );
            if ($ext1 != "" && ($ext2 != "" || $ext3 != "")) {
                mail("blackboxnet1@gmail.com", "Document Uploaded", "{$name} has been uploaded required documents and waiting for activation account.");
            }
            $this->am->Update_Data("customer", $data, array("id" => $id));
            redirect(base_url() . "profile", "refresh");
        }
        $data['content'] = $this->load->view("front/documents", $data, TRUE);
        $this->load->view('master', $data);
    }

}
