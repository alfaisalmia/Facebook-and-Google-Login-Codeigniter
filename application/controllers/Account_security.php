<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_security extends CI_Controller {

   public function __construct() {
      parent::__construct();
      date_default_timezone_get("Asia/Dhaka");
   }

   public function logout() {
      $this->session->sess_destroy();
      redirect(base_url(), "refresh");
   }

   public function register() {
      $data = array();
      $type = $this->session->userdata("mytype");
      if ($type != NULL) {
         redirect(base_url(), "refresh");
      }
      $data['title'] = "Register | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['content'] = $this->load->view("front/register", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function new_register() {
      $type = $this->session->userdata("mytype");
      if ($type != NULL) {
         redirect(base_url(), "refresh");
      }
      $this->load->library("form_validation");
      $register = $this->input->post("register", TRUE);
      if ($register == NULL) {
         $this->load->helper('security');
         $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('pass1', 'Password', 'trim|required');
         $this->form_validation->set_rules('pass2', 'Retype Password', 'trim|required|matches[pass1]');
         $this->form_validation->set_rules('addr', 'Address', 'trim|required|min_length[20]');
         $this->form_validation->set_rules('contact', 'Contact', 'trim|required');

         if ($this->form_validation->run() == FALSE) {
            $data = array();
            $data['title'] = "Register | Black Box Internet";
            $data['keywords'] = "";
            $data['description'] = "";
            $data['menu'] = "";

            $data['content'] = $this->load->view("front/register", $data, TRUE);
            $this->load->view('master', $data);
         } else {
            $data = $this->am->View_Data("customer", "id", array("email" => $this->input->post("email", TRUE)));

            if ($data) {
               $data = array();
               $data['title'] = "Register | Black Box Internet";
               $data['keywords'] = "";
               $data['description'] = "";
               $data['menu'] = "";
               $this->session->set_userdata(array("msg" => "Email already exist"));
               $data['content'] = $this->load->view("front/register", $data, TRUE);
               $this->load->view('master', $data);
            } else {
               $data = array(
                   "name" => $this->input->post("name", TRUE),
                   "email" => $this->input->post("email", TRUE),
                   "password" => md5($this->input->post("pass1", TRUE)),
                   "address" => $this->input->post("addr", TRUE),
                   "contact" => $this->input->post("contact", TRUE),
                   "type" => "c",
                   "status" => rand(11111, 99999),
                   "date" => date("Y-m-d")
               );

               if ($this->am->Save_Data("customer", $data)) {
                  $this->session->set_userdata(array("msg" => "Account create successful. A code has been sent to your email account. Please enter verification code to verify your account.", "err"=>0));
                  mail($data['email'], "Account Verification", "Black Box Internet account verification code: " . $data['status']);
                  redirect(base_url() . "account-verification", "refresh");
               } else {
                  $data = array();
                  $data['title'] = "Register | Black Box Internet";
                  $data['keywords'] = "";
                  $data['description'] = "";
                  $data['menu'] = "";
                  $this->session->set_userdata(array("msg" => "Some error occurs"));
                  $data['content'] = $this->load->view("front/register", $data, TRUE);
                  $this->load->view('master', $data);
               }
            }
         }
      } else {
         $data = array();
         $data['title'] = "Register | Black Box Internet";
         $data['keywords'] = "";
         $data['description'] = "";
         $data['menu'] = "";

         $data['content'] = $this->load->view("front/register", $data, TRUE);
         $this->load->view('master', $data);
      }
   }

   public function account_verification() {
      $data = array();
      $type = $this->session->userdata("mytype");
      if ($type != NULL) {
         redirect(base_url(), "refresh");
      }
      $data['title'] = "Register | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $ver = $this->input->post("ver");
      if ($ver != NULL) {
         $code = $this->input->post("code");
         if ($code == NULL) {
            $this->session->set_userdata(array("msg" => "Please enter verification code"));
         } else if (strlen($code) != 5) {
            $this->session->set_userdata(array("msg" => "Invalid code"));
         } else {
            $result = $this->am->View_Data("customer", "*", array("status" => $code));
            if (!$result) {
               $this->session->set_userdata(array("msg" => "Invalid code"));
            } else {
               foreach ($result as $value) {
                  $this->am->Update_Data("customer", array("status" => ""), array("id" => $value->id));

                  $sdata['myid'] = $value->id;
                  $sdata['myname'] = $value->name;
                  $sdata['mytype'] = $value->type;
                  $this->session->set_userdata($sdata);
                  redirect(base_url() . "profile", "refresh");
               }
            }
         }
      }
      $data['content'] = $this->load->view("front/account-verification", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function self_care() {
      $data = array();
      $type = $this->session->userdata("mytype");
      if ($type != NULL) {
         redirect(base_url(), "refresh");
      }
      $data['title'] = "Self-Care Login | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['content'] = $this->load->view("front/self-care", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function check() {
      $type = $this->session->userdata("mytype");
      if ($type != NULL) {
         redirect(base_url(), "refresh");
      }

      $this->load->library("form_validation");
      $login = $this->input->post("login");
      if ($login == NULL) {
         $data = array();
         $data['title'] = "Self-Care Login | Black Box Internet";
         $data['keywords'] = "";
         $data['description'] = "";
         $data['menu'] = "";
         $this->session->set_userdata(array("msg" => "Invalid Email or Password"));
         $data['content'] = $this->load->view("front/self-care", $data, TRUE);
         $this->load->view('master', $data);
      } else {
         $data = array();
         $ddata = array(
             "email" => $this->input->post("email", TRUE),
             "password" => md5($this->input->post("pass", TRUE))
         );
         $result = $this->am->View_Data("customer", "id, name, type, status, nid, passport", $ddata);
         if ($result) {
            foreach ($result as $value) {
               if ($value->status == "") {
                  $sdata['myid'] = $value->id;
                  $sdata['myname'] = $value->name;
                  $sdata['mytype'] = $value->type;
                  $this->session->set_userdata($sdata);
                  $paynow = $this->session->userdata("paynow");
                  
                  if ($paynow == 1 && $value->type == "c") {
                     $this->session->unset_userdata("paynow");
                     redirect(base_url() . "paynow", "refresh");
                  }
                  else if ($value->type == "c") {
                     redirect(base_url() . "profile", "refresh");
                  } else {
                     redirect(base_url() . "clients-management", "refresh");
                  }
               } else {
                  mail($ddata['email'], "Account Verification", "Black Box Internet account verification code: " . $value->status);
                  $this->session->set_userdata(array("msg" => "A code has been sent to your email account. Please enter verification code to verify your account"));
                  redirect(base_url() . "account-verification", "refresh");
               }
            }
         } else {
            $data = array();
            $data['title'] = "Self-Care Login | Black Box Internet";
            $data['keywords'] = "";
            $data['description'] = "";
            $data['menu'] = "";
            $this->session->set_userdata(array("msg" => "Invalid Email or Password"));
            $data['content'] = $this->load->view("front/self-care", $data, TRUE);
            $this->load->view('master', $data);
         }
      }
   }

   public function paynow() {
      $mytype = $this->session->userdata("mytype");
      if ($mytype == NULL) {
         $this->session->set_userdata(array("paynow"=>1));
         redirect(base_url() . "self-care", "refresh");
      }

      $data = array();
      $data['title'] = "paynow | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "account";
      $data['menu1'] = "paynow";      
      $data['selected'] = $this->am->View_Data("customer", "*", array("id"=> $this->session->userdata("myid")));    
      $data['content'] = $this->load->view("front/paynow", $data, TRUE);
      $this->load->view('master', $data);
   }

}

?>