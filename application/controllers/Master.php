<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

   public function __construct() {
      parent::__construct();
      date_default_timezone_get("Asia/Dhaka");
   }

   public function index() {
      $data = array();
      $data['title'] = "Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "home";
      $data['myip'] = "114.130.31.178";
      $data['allSlider'] = $this->am->View_Data("slider", "*", array("status" => 1), array("serial", "asc"), "");
      $this->load->view('front/home', $data);
   }
   
   public function coverage_area() {
      $data = array();
      $data['title'] = "Coverage Area | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "coverage-area";
      $data['content'] = $this->load->view('front/coverage-area', $data, TRUE);
      $this->load->view('master', $data);
   }

   public function packages() {
      $data = array();
      $data['title'] = "Packages | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "packages";
      $data['allPackage'] = $this->am->View_Data("package", "*", array("status" => 1), array("serial", "asc"));
      $data['content'] = $this->load->view('front/packages', $data, TRUE);
      $this->load->view('master', $data);
   }

   public function package_order($id) {
      $data = array();
      $data['title'] = "Order Your Package | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "packages";
      $data['id'] = $id;
      $this->load->library("form_validation");

      $order = $this->input->post("order", TRUE);
      if ($order != NULL) {
         $this->load->helper('security');
         $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
         $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('addr', 'Address', 'trim|required|min_length[10]');

         if ($this->form_validation->run() == FALSE) {
            $data['allPackage'] = $this->am->View_Data("package", "*", array("status" => 1), array("serial", "asc"));
            $data['content'] = $this->load->view('front/packages-order', $data, TRUE);
            $this->load->view('master', $data);
         } else {
            $msg = "<html><body>";
            $msg .= "Requested Package: " . $this->input->post("packageid", TRUE);
            $msg .= "Full Name: " . $this->input->post("name", TRUE);
            $msg .= "Phone Number: " . $this->input->post("phone", TRUE);
            $msg .= "Email: " . $this->input->post("email", TRUE);
            $msg .= "Address: " . $this->input->post("addr", TRUE);
            $msg .= "</body></html>";
            $subject = 'Package Order form blackboxinternet.net';
            $headers = "From: " . $this->input->post("email", TRUE) . "\r\n";
            $headers .= "Reply-To: " . $this->input->post("email", TRUE) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail("blackboxnet1@gmail.com", $subject, $msg, $headers);
            redirect(base_url() . "package-confirmation", "refresh");
         }
      } else {
         $data['allPackage'] = $this->am->View_Data("package", "*", array("status" => 1), array("serial", "asc"));
         $data['content'] = $this->load->view('front/packages-order', $data, TRUE);
         $this->load->view('master', $data);
      }
   }

   public function package_confirmation() {
      $data = array();
      $data['title'] = "Packages Confirmation | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "packages";

      $data['content'] = $this->load->view('front/packages-order-confirmation', $data, TRUE);
      $this->load->view('master', $data);
   }
   
   public function referral_confirmation(){
      $data = array();
      $data['title'] = "Referral Confirmation | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "referral";

      $data['content'] = $this->load->view('front/referral-confirmation', $data, TRUE);
      $this->load->view('master', $data);
   }

   public function referral() {
      $data = array();
      $data['title'] = "Packages | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "referral";
      $this->load->library("form_validation");

      $referral = $this->input->post("referral", TRUE);
      if ($referral != NULL) {
         $this->load->helper('security');
         $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
         $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
         $this->form_validation->set_rules('pass', 'Password', 'trim|required');
         $this->form_validation->set_rules('addr', 'Address', 'trim|required');
         if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->load->view('front/referral', $data, TRUE);
            $this->load->view('master', $data);
         } else {
            $ddata = array(
                "email" => $this->input->post("email", TRUE),
                "password" => md5($this->input->post("pass", TRUE))
            );
            $result = $this->am->View_Data("customer", "username", $ddata);
            if ($result) {
               $msg = "<html><body>";
               $msg .= "<h3>Friend Full Name: " . $this->input->post("name", TRUE) . "</h3>";
               $msg .= "<p>Friend Phone Number: " . $this->input->post("phone", TRUE) . "</p>";
               $msg .= "<p>Address: " . $this->input->post("addr", TRUE) . "</p>";
               foreach ($result as $value) {
                  $msg .= "<p>Client User Name: " . $value->username . "</p>";
               }
               $msg .= "<p>Client Email: " . $this->input->post("email", TRUE) . "</p>";
               $msg .= "</body></html>";
               $subject = 'Package Order form blackboxinternet.net';
               $headers = "From: " . $this->input->post("email", TRUE) . "\r\n";
               $headers .= "Reply-To: " . $this->input->post("email", TRUE) . "\r\n";
               $headers .= "MIME-Version: 1.0\r\n";
               $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
               mail("blackboxnet1@gmail.com", $subject, $msg, $headers);
               redirect(base_url() . "referral-confirmation", "refresh");
            } else {
               $this->session->set_userdata(array("msg" => "Invalid Email or Password"));
               $data['content'] = $this->load->view('front/referral', $data, TRUE);
               $this->load->view('master', $data);
            }
         }
      } else {
         $data['content'] = $this->load->view('front/referral', $data, TRUE);
         $this->load->view('master', $data);
      }
   }

   public function estimate_bandwidth_ap() {
      $data = array();
      $data['title'] = "Estimate Bandwidth | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "home";
      //$data['content'] = $this->load->view("front/package-management", $data, TRUE);
      //$this->load->view('master', $data);
      $this->load->view("front/package-management", $data);
   }

}

