<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_clients_management extends CI_Controller {

   public function __construct() {
      parent::__construct();
      date_default_timezone_get("Asia/Dhaka");
      $mytype = $this->session->userdata("mytype");
      if ($mytype != 'a' && $mytype != 'e') {
         redirect(base_url(), "refresh");
      }
   }

   public function index() {
      $data = array();
      $data['title'] = "Clients Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "management";
      $data['menu1'] = "clients";
      $this->load->library("form_validation");
      $data['allCustomer'] = $this->am->View_Data("customer", "customer.*, (select count(c.referralid) from customer c where c.referralid = customer.id and c.referralid > 0 and c.activation = 1) totalreferral", array("customer.type" => "c"), array("customer.username", "asc"));
            
      $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
      $data['content'] = $this->load->view("back/clients-view", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function edit($id) {
      $data = array();
      $data['title'] = "Clients Management | Black Box Internet";
      $data['keywords'] = "";
      $data['description'] = "";
      $data['menu'] = "management";
      $data['menu1'] = "clients";
      $this->load->library("form_validation");
      $data['allCustomer'] = $this->am->View_Data("customer", "*", array("type" => "c", "id" => $id), array("username", "asc"));
      $data['allClient'] = $this->am->View_Data("customer", "*", array("id!="=>$id, "activation"=>1, "type"=>"c"), array("username", "asc"));
      
      
      $data['allPackage'] = $this->am->View_Data("package", "*", "", array("name", "asc"));
      $data['content'] = $this->load->view("back/clients-edit", $data, TRUE);
      $this->load->view('master', $data);
   }

   public function update() {
      $this->load->library("form_validation");
      $id = $this->input->post("id", TRUE);
      $docup = $this->input->post("reg", TRUE);
      if ($docup != NULL) {

         $data = $this->am->View_Data("customer", "*", array("id" => $id));
         foreach ($data as $value) {
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
               if (file_exists("images/documents/" . md5($value->id . "passport-kichu-na") . "-passport.{$old_ext3}")) {
                  unlink("images/documents/" . md5($value->id . "passport-kichu-na") . "-passport.{$old_ext3}");
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
             "name" => $this->input->post("name", TRUE),
             "email" => $this->input->post("email", TRUE),
             "address" => $this->input->post("addr", TRUE),
             "contact" => $this->input->post("contact", TRUE),
             "username" => $this->input->post("username", TRUE),
             "userpass" => $this->input->post("userpass", TRUE),
             "packageid" => $this->input->post("packageid", TRUE),
             "status" => "",
             "nid" => $ext2,
             "passport" => $ext3,
             "picture" => $ext1,
             "activation" => $this->input->post("activation", TRUE),
             "referralid" => $this->input->post("referralid", TRUE)
         );

         if ($this->am->Update_Data("customer", $data, array("id" => $id))) {
            $sdata['msg'] = "Update Successful";
            $sdata['err'] = 0;
            $this->session->set_userdata($sdata);
            redirect(base_url() . "clients-management", "refresh");
         }
      } else {
         redirect(base_url(), "refresh");
      }
   }

}