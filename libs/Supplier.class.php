<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supplier
 *
 * @author eranga
 */
class Supplier {
    private static $_tablename = "usmgt_supplier";
    private static $_primarykey = "sup_id";
    
    private $supId = null;
    private $sup_name = null;
    private $sup_address = null;
    private $sup_tel = null;
    private $status = null;
    
    function __construct($supId, $sup_name, $sup_address, $sup_tel, $status) {
        $this->supId = $supId;
        $this->sup_name = $sup_name;
        $this->sup_address = $sup_address;
        $this->sup_tel = $sup_tel;
        $this->status = $status;
    }

    static function get_tablename() {
        return self::$_tablename;
    }

    static function get_primarykey() {
        return self::$_primarykey;
    }

    function getSupId() {
        return $this->supId;
    }

    function getSup_name() {
        return $this->sup_name;
    }

    function getSup_address() {
        return $this->sup_address;
    }

    function getSup_tel() {
        return $this->sup_tel;
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

    function setSupId($supId) {
        $this->supId = $supId;
    }

    function setSup_name($sup_name) {
        $this->sup_name = $sup_name;
    }

    function setSup_address($sup_address) {
        $this->sup_address = $sup_address;
    }

    function setSup_tel($sup_tel) {
        $this->sup_tel = $sup_tel;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function Update(){
        $insArray["sup_id"] = $this->supId;
        $insArray["sup_name"] = $this->sup_name;
        $insArray["sup_address"] = $this->sup_address;   
        $insArray["sup_tel"] = $this->sup_tel;
        $insArray["status"] = $this->status;
        
        $supId =  DBAccess::queryUpdate(self::$_tablename, $insArray, self::$_primarykey . '=' . $this->supId);
        return $supId;
    }
    
    static function Find($supId) {
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey . '=' . $supId);
        $row = $result->fetch_object();
        return new Supplier($row->sup_id, $row->sup_name, $row->sup_address,$row->sup_tel, $row->status);
    }
    
    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Supplier($row->sup_id, $row->sup_name, $row->sup_address,$row->sup_tel, $row->status);
        }
        return $arr;
    }
    
    static function getSupName($supId){
        $supdata = self::Find($supId);
        return $supdata->getSup_name();
    }
    
}
