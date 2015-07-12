<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author eranga
 */
class Customer {
      private static $_tablename = "customer";
      private static $_primarykey = "cus_id";
      
      private $cus_id = null;
      private $cus_name = null;
      private $company_name = null;
      private $cus_address1 = null;
      private $cus_address2 = null;
      private $city = null;
      private $phone = null;
      private $state = null;
      private $email= null;
      private $username = null;
      private $password = null;
      private $status= null;
      
      function __construct($cus_id, $cus_name, $company_name, $cus_address1, $cus_address2, $city, $phone, $state, $email, $username, $password, $status) {
          $this->cus_id = $cus_id;
          $this->cus_name = $cus_name;
          $this->company_name = $company_name;
          $this->cus_address1 = $cus_address1;
          $this->cus_address2 = $cus_address2;
          $this->city = $city;
          $this->phone = $phone;
          $this->state = $state;
          $this->email = $email;
          $this->username = $username;
          $this->password = $password;
          $this->status = $status;
      }

      static function get_tablename() {
          return self::$_tablename;
      }

      static function get_primarykey() {
          return self::$_primarykey;
      }

      function getCus_id() {
          return $this->cus_id;
      }

      function getCus_name() {
          return $this->cus_name;
      }

      function getCompany_name() {
          return $this->company_name;
      }

      function getCus_address1() {
          return $this->cus_address1;
      }

      function getCus_address2() {
          return $this->cus_address2;
      }

      function getCity() {
          return $this->city;
      }

      function getPhone() {
          return $this->phone;
      }

      function getState() {
          return $this->state;
      }

      function getEmail() {
          return $this->email;
      }

      function getUsername() {
          return $this->username;
      }

      function getPassword() {
          return $this->password;
      }

      function getStatus() {
          return $this->status;
      }

      static function set_tablename($_tablename) {
          self::$_tablename = $_tablename;
      }

      static function set_primarykey($_primarykey) {
          self::$_primarykey = $_primarykey;
      }

      function setCus_id($cus_id) {
          $this->cus_id = $cus_id;
      }

      function setCus_name($cus_name) {
          $this->cus_name = $cus_name;
      }

      function setCompany_name($company_name) {
          $this->company_name = $company_name;
      }

      function setCus_address1($cus_address1) {
          $this->cus_address1 = $cus_address1;
      }

      function setCus_address2($cus_address2) {
          $this->cus_address2 = $cus_address2;
      }

      function setCity($city) {
          $this->city = $city;
      }

      function setPhone($phone) {
          $this->phone = $phone;
      }

      function setState($state) {
          $this->state = $state;
      }

      function setEmail($email) {
          $this->email = $email;
      }

      function setUsername($username) {
          $this->username = $username;
      }

      function setPassword($password) {
          $this->password = $password;
      }

      function setStatus($status) {
          $this->status = $status;
      }

    public function Insert() {
        
    }
    public function Update(){
        
    }
    
    static function Find($cusId) {
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey . '=' . $cusId);
        $row = $result->fetch_object();
        return new Customer($row->cus_id, $row->cus_name, $row->company_name, $row->cus_address1,$row->cus_address2,$row->city,$row->phone,$row->state,$row->email,$row->username,$row->password,$row->status);
    }
    
    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Customer($row->cus_id, $row->cus_name, $row->company_name, $row->cus_address1,$row->cus_address2,$row->city,$row->phone,$row->state,$row->email,$row->username,$row->password,$row->status);
        }
        return $arr;
    }
    public static function getCustomerName($cusId){
        return self::Find($cusId)->getCus_name();
    }
    
    public static function getCustomerCompanyName($cusId){
        return self::Find($cusId)->getCompany_name();
    }
}
