<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Amar_Model extends CI_Model {

   public $Id;

   public function Save_Data($table, $data) {
      if ($this->db->insert($table, $data)) {
         $this->Id = $this->db->insert_id();
         return TRUE;
      }
      return FALSE;
   }

   public function Update_Data($table, $data, $where) {
      if ($where) {
         $this->db->where($where);
      }
      if ($this->db->update($table, $data)) {
         return TRUE;
      }
      return FALSE;
   }

   public function View_Data($table, $sel, $where = NULL, $order = NULL, $limit = NULL) {
      if ($where != NULL) {
         $this->db->where($where);
      }
      $this->db->select($sel);
      $this->db->from($table);
      if ($order != NULL) {
         $this->db->order_by($order[0], $order[1]);
      }
      if ($limit != NULL) {
         $this->db->limit($limit[0], $limit[1]);
      }
      return $this->db->get()->result();
   }

   public function Lager($id, $dt) {
      $this->db->where("customerid", $id);
      $this->db->where("date <", $dt);
      $this->db->select("(select sum(amount) from billing where type=0 and date < '$dt' and customerid = $id and active=1) as credit, (select sum(amount) from billing where type=1 and date < '$dt' and customerid = $id and active=1) as debit");
      $this->db->from("billing");
      $this->db->group_by("customerid");
      return $this->db->get()->result();
   }

   public function View_Data_Two_Table($table1, $table2, $sel, $rel, $where, $order, $limit) {
      if ($where) {
         $this->db->where($where);
      }
      $this->db->select($sel);
      $this->db->from($table1);
      $this->db->join($table2, $rel);
      if ($order) {
         $this->db->order_by($order[0], $order[1]);
      }
      if ($limit) {
         $this->db->limit($limit[0], $limit[1]);
      }
      return $this->db->get()->result();
   }

   public function Delete_Data($table, $where) {
      $this->db->where($where);
      $this->db->delete($table);
      if ($this->db->affected_rows()) {
         return TRUE;
      }
      return FALSE;
   }

   public function Billing($cid, $date) {
      $this->db->where("customerid", $cid);
      $this->db->where("type", 1);
      $this->db->select("id");
      $this->db->from("billing");
      $this->db->like("date", $date, 'after');
      return $this->db->get()->result();
   }

   public function TotalData($table) {
      $this->db->select("id");
      $this->db->from($table);
      return $this->db->count_all_results();
   }

   public function GetMultipleQueryResult($queryString) {
      if (empty($queryString)) {
         return false;
      }
      $index = 0;
      $ResultSet = array();
      if (mysqli_multi_query($this->db->conn_id, $queryString)) {
         do {
            if (false != $result = mysqli_store_result($this->db->conn_id)) {
               $rowID = 0;
               while ($row = $result->fetch_object()) {
                  $ResultSet[$index][$rowID] = $row;
                  $rowID++;
               }
            }
            $index++;
         } while (mysqli_more_results($this->db->conn_id) && mysqli_next_result($this->db->conn_id));
      }
      return $ResultSet;
   }

}
