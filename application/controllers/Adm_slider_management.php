<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_slider_management extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a' && $mytype != 'e') {
         redirect(base_url(), "refresh");
      }
   }
   public function index() {
      $data = array();
      $data['title'] = "Slider Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['content'] = $this->load->view("back/slider-new", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function insert() {
      $this->load->library("form_validation");

      $ext1 = "";
      if ($_FILES["large_img"]["name"]) {
         $ext1 = pathinfo($_FILES["large_img"]["name"]);
         $ext1 = strtolower($ext1['extension']);
         if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" && $ext1 != "gif") {
            $ext1 = "";
         }
      }
      $ext2 = "";
      if ($_FILES["small_img"]["name"]) {
         $ext2 = pathinfo($_FILES["small_img"]["name"]);
         $ext2 = strtolower($ext2['extension']);
         if ($ext2 != "jpg" && $ext2 != "png" && $ext2 != "jpeg" && $ext2 != "gif") {
            $ext2 = "";
         }
      }

      $data = array(
          "title" => $this->input->post("title", TRUE),
          "description" => $this->input->post("descr", TRUE),
          "large_img" => $ext1,
          "small_img" => $ext2,
          "status" => $this->input->post("status", TRUE),
          "serial" => $this->input->post("serial", TRUE)
      );



      if ($this->am->Save_Data("slider", $data)) {
         $id = $this->am->Id;
         
         if ($ext1) {
            $this->load->library('upload');
            $config['upload_path'] = './images/large-slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            $config['file_name'] = "slider-{$id}.{$ext1}";
            $this->upload->initialize($config); //upload image data
            $this->upload->do_upload('large_img');
         }
         if ($ext2) {
            $this->load->library('upload');
            $config['upload_path'] = './images/small-slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            $config['file_name'] = "slider-{$id}.{$ext2}";
            $this->upload->initialize($config); //upload image data
            $this->upload->do_upload('small_img');
         }

         $sdata['msg'] = "Save Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "slider-management", "refresh");
      } else {
         $data = array();
         $data['title'] = "Slider Management | Black Box Internet";
         $data['keywords'] = "";
         $data['description'] = "";
         $data['menu'] = "";

         $data['content'] = $this->load->view("back/slider-new", $data, TRUE);
         $this->load->view('master', $data);
      }
   }

   public function view() {
      $data = array();
      $data['title'] = "Slider Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $data['allSlider'] = $this->am->View_Data("slider", "*", "", array("serial", "asc"), "");
      $data['content'] = $this->load->view("back/slider-view", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function edit($id) {
      $data = array();
      $data['title'] = "Slider Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['allSlider'] = $this->am->View_Data("slider", "*", array("id" => $id), array("serial", "asc"), "");
      $data['content'] = $this->load->view("back/slider-edit", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function update() {
      $id = $this->input->post("id");
      $sel_news = $this->am->View_Data("slider", "*", array("id" => $id), array("serial", "asc"), "");
      foreach ($sel_news as $value) {
         $old_ext1 = $value->large_img;
         $old_ext2 = $value->small_img;
      }

      $ext1 = "";
      if ($_FILES["large_img"]["name"]) {
         $ext1 = pathinfo($_FILES["large_img"]["name"]);
         $ext1 = strtolower($ext1['extension']);
         if ($ext1 != "jpg" && $ext1 != "png" && $ext1 != "jpeg" && $ext1 != "gif") {
            $ext1 = $old_ext1;
         } else {
            if (file_exists("images/large-slider/slider-{$id}.{$old_ext1}")) {
               unlink("images/large-slider/slider-{$id}.{$old_ext1}");
            }
            $this->load->library('upload');
            $config['upload_path'] = './images/large-slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            $config['file_name'] = "slider-{$id}.{$ext1}";
            $this->upload->initialize($config); //upload image data
            $this->upload->do_upload('large_img');
         }
      }
      else{
         $ext1 = $old_ext1;
      }

      $ext2 = "";
      if ($_FILES["small_img"]["name"]) {
         $ext2 = pathinfo($_FILES["small_img"]["name"]);
         $ext2 = strtolower($ext2['extension']);
         if ($ext2 != "jpg" && $ext2 != "png" && $ext2 != "jpeg" && $ext2 != "gif") {
            $ext2 = $old_ext2;
         } else {
            if (file_exists("images/small-slider/slider-{$id}.{$old_ext2}")) {
               unlink("images/small-slider/slider-{$id}.{$old_ext2}");
            }
            $this->load->library('upload');
            $config['upload_path'] = './images/small-slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            $config['file_name'] = "slider-{$id}.{$ext2}";
            $this->upload->initialize($config); //upload image data
            $this->upload->do_upload('small_img');
         }
      }
      else{
         $ext2 = $old_ext2;
      }

      $data = array(
          "title" => $this->input->post("title", TRUE),
          "description" => $this->input->post("descr", TRUE),
          "large_img" => $ext1,
          "small_img" => $ext2,
          "status" => $this->input->post("status", TRUE),
          "serial" => $this->input->post("serial", TRUE)
      );

      if ($this->am->Update_Data("slider", $data, array("id" => $this->input->post("id", TRUE)))) {
         $sdata['msg'] = "Update Successful";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "slider-management/view", "refresh");
      } else {
         $sdata['msg'] = "Some Error Occurs";
         $this->session->set_userdata($sdata);
         redirect(base_url() . "slider-management/view", "refresh");
      }
   }

}

