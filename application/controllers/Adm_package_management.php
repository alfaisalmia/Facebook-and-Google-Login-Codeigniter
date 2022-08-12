<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_package_management extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a') {
         redirect(base_url(), "refresh");
      }
   }
   public function index() {
      $data = array();
      $data['title'] = "Package Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['content'] = $this->load->view("back/package-new", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function insert() {
      $this->load->library("form_validation");
      $data = array(
          "name" => $this->input->post("name", TRUE),
          "price" => $this->input->post("price", TRUE),
          "time1" => $this->input->post("time1", TRUE),
          "speed1" => $this->input->post("speed1", TRUE),
          "time2" => $this->input->post("time2", TRUE),
          "speed2" => $this->input->post("speed2", TRUE),
          "yt" => $this->input->post("yt", TRUE),
          "bdix" => $this->input->post("bdix", TRUE),
          "status" => $this->input->post("status", TRUE),
          "serial" => $this->input->post("serial", TRUE)
      );

      if ($this->am->Save_Data("package", $data)) {
         $sdata['msg'] = "Save Successful";
         $sdata['err'] = 0;
         $this->session->set_userdata($sdata);
         redirect(base_url() . "package-management", "refresh");
      } else {
         $data = array();
         $data['title'] = "Package Management | Black Box Internet";
         $data['keywords'] = "";
         $data['description'] = "";
         $data['menu'] = "";

         $data['content'] = $this->load->view("back/package-new", $data, TRUE);
         $this->load->view('master', $data);
      }
   }
   
   public function view() {
      $data = array();
      $data['title'] = "Package Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $data['allPackage'] = $this->am->View_Data("package", "*", "", array("serial", "asc"), "");
      $data['content'] = $this->load->view("back/package-view", $data, TRUE);
      $this->load->view('master', $data);
   }
   
   public function edit($id) {
      $data = array();
      $data['title'] = "Package Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['allPackage'] = $this->am->View_Data("package", "*", array("id"=>$id), array("serial", "asc"), "");
      $data['content'] = $this->load->view("back/package-edit", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function update() {
      $data = array(
          "name" => $this->input->post("name", TRUE),
          "price" => $this->input->post("price", TRUE),
          "time1" => $this->input->post("time1", TRUE),
          "speed1" => $this->input->post("speed1", TRUE),
          "time2" => $this->input->post("time2", TRUE),
          "speed2" => $this->input->post("speed2", TRUE),
          "yt" => $this->input->post("yt", TRUE),
          "bdix" => $this->input->post("bdix", TRUE),
          "status" => $this->input->post("status", TRUE),
          "serial" => $this->input->post("serial", TRUE)
      );
      
      if ($this->am->Update_Data("package", $data, array("id"=>$this->input->post("id", TRUE)))) {
         $sdata['err'] = 0;
         $sdata['msg'] = "Update Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "package-management/view", "refresh");
      } else {
         $sdata['err'] = 1;
         $sdata['msg'] = "Some Error Occurs";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "package-management/view", "refresh");
      }
      
   }
}

