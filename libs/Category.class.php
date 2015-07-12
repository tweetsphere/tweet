<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Category
 *
 * @author eranga
 */
class Category {
    private static $_tablename = "usmgt_category";
    private static $_primarykey = "cat_id";
    
    private $cat_id = null;
    private $cat_name = null;
    private $cat_dec = null;
    private $status = null;
    
    function __construct($cat_id, $cat_name, $cat_dec, $status) {
        $this->cat_id = $cat_id;
        $this->cat_name = $cat_name;
        $this->cat_dec = $cat_dec;
        $this->status = $status;
    }
    
    function getCat_id() {
        return $this->cat_id;
    }

    function getCat_name() {
        return $this->cat_name;
    }

    function getCat_dec() {
        return $this->cat_dec;
    }

    function getStatus() {
        return $this->status;
    }

    function setCat_id($cat_id) {
        $this->cat_id = $cat_id;
    }

    function setCat_name($cat_name) {
        $this->cat_name = $cat_name;
    }

    function setCat_dec($cat_dec) {
        $this->cat_dec = $cat_dec;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function Insert() {
        //$insArray["cat_id"] = "Null";
        $insArray["cat_name"] = $this->cat_name;
        $insArray["cat_discription"] = $this->cat_dec;    
        $insArray["status"] = $this->status;
        
        $catId = DBAccess::queryInsert(self::$_tablename, $insArray);
        return $catId;
    }
    public function Update(){
        $insArray["cat_id"] = $this->cat_id;
        $insArray["cat_name"] = $this->cat_name;
        $insArray["cat_discription"] = $this->cat_dec;    
        $insArray["status"] = $this->status;
        
        $catId =  DBAccess::queryUpdate(self::$_tablename, $insArray, self::$_primarykey . '=' . $this->cat_id);
        return $catId;
    }
    
    static function Find($catId) {
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey . '=' . $catId);
        $row = $result->fetch_object();
        return new Category($row->cat_id, $row->cat_name, $row->cat_discription, $row->status);
    }
    
    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Category($row->cat_id, $row->cat_name, $row->cat_discription, $row->status);
        }
        return $arr;
    }
    
    static function displayCatName($catId){
        return self::Find($catId)->getCat_name();
    }

}
