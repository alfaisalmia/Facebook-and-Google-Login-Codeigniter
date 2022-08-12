<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_logo_management extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a' && $mytype != 'e') {
         redirect(base_url(), "refresh");
      }
   }
   public function index() {
      $data = array();
      $data['title'] = "Logo Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "";
      $this->load->library("form_validation");
      $data['content'] = $this->load->view("back/logo-new", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function insert() {
      if ($_FILES["logo"]["name"]) {
         $ext = pathinfo($_FILES["logo"]["name"]);
         $ext = strtolower($ext['extension']);
         if ($ext == "png") {
            if(file_exists("images/logo.png")){
               unlink("images/logo.png");
            }
            
            $this->load->library('upload');
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '10000';
            $config['max_width'] = '3000';
            $config['max_height'] = '2000';
            $config['file_name'] = "logo.png";
            $this->upload->initialize($config); //upload image data
            $this->upload->do_upload('logo');
            $sdata['msg'] = "Logo change successful";
            $sdata['err'] = 0;
            $this->session->set_userdata($sdata);
            redirect(base_url() . "logo-management", "refresh");
         } else {
            $sdata['err'] = 1;
            $sdata['msg'] = "Invalid logo format. Please upload png image";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "logo-management", "refresh");
         }
      }

      $sdata['msg'] = "Invalid logo format. Please upload png image";
      $this->session->set_userdata($sdata);
      redirect(base_url() . "logo-management", "refresh");
   }

}
