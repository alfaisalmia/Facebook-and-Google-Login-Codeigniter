<?php
if (!$_FILES['passport']['name']) {
            $ext3 = pathinfo($_FILES["passport"]["name"]);
            $ext3 = strtolower($ext3['extension']);
            if ($ext3 != "jpg" && $ext3 != "jpeg" && $ext3 != "png" && $ext3 != "gif") {
               $ext3 = $old_ext3;
            }
            else{
               if(file_exists("images/documents/" . md5($value->id . "passport-kichu-na") . "-passport.{$old_ext3}")){
                  unlink("images/documents/" . md5($value->id . "passport-kichu-na") . "-passport.{$old_ext3}");
                  $this->load->library('upload');
                  $config['upload_path'] = './images/documents';
                  $config['allowed_types'] = 'gif|jpg|png|jpeg';
                  $config['max_size'] = '10000';
                  $config['max_width'] = '400';
                  $config['max_height'] = '500';
                  $config['file_name'] = md5($id . "passport-kichu-na") . "-passport.{$ext3}";
                  $this->upload->initialize($config); //upload image data
                  $this->upload->do_upload('passport');
               }
            }
         }
         else{
            $ext3 = $old_ext3;
         }
?>
