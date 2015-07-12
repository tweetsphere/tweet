<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of product
 *
 * @author eranga
 */
class Product {
    private static $_tablename = "usmgt_products";
    private static $_primarykey = "prod_id";
    
    private $prod_id = null;
    private $prod_cat_id = null;
    private $prod_sup_id = null;
    private $prod_title = null;
    private $prod_dec = null;
    private $imagepath = null;
    private $prod_available_qty = null;
    private $prod_price = null;
    private $status = null;
    
    function __construct($prod_id, $prod_cat_id, $prod_sup_id, $prod_title, $prod_dec, $imagepath, $prod_available_qty, $prod_price, $status) {
        $this->prod_id = $prod_id;
        $this->prod_cat_id = $prod_cat_id;
        $this->prod_sup_id = $prod_sup_id;
        $this->prod_title = $prod_title;
        $this->prod_dec = $prod_dec;
        $this->imagepath = $imagepath;
        $this->prod_available_qty = $prod_available_qty;
        $this->prod_price = $prod_price;
        $this->status = $status;
    }
    static function get_tablename() {
        return self::$_tablename;
    }

    static function get_primarykey() {
        return self::$_primarykey;
    }

    function getProd_id() {
        return $this->prod_id;
    }

    function getProd_cat_id() {
        return $this->prod_cat_id;
    }

    function getProd_sup_id() {
        return $this->prod_sup_id;
    }

    function getProd_title() {
        return $this->prod_title;
    }

    function getProd_dec() {
        return $this->prod_dec;
    }

    function getImagepath() {
        return $this->imagepath;
    }

    function getProd_available_qty() {
        return $this->prod_available_qty;
    }

    function getProd_price() {
        return $this->prod_price;
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

    function setProd_id($prod_id) {
        $this->prod_id = $prod_id;
    }

    function setProd_cat_id($prod_cat_id) {
        $this->prod_cat_id = $prod_cat_id;
    }

    function setProd_sup_id($prod_sup_id) {
        $this->prod_sup_id = $prod_sup_id;
    }

    function setProd_title($prod_title) {
        $this->prod_title = $prod_title;
    }

    function setProd_dec($prod_dec) {
        $this->prod_dec = $prod_dec;
    }

    function setImagepath($imagepath) {
        $this->imagepath = $imagepath;
    }

    function setProd_available_qty($prod_available_qty) {
        $this->prod_available_qty = $prod_available_qty;
    }

    function setProd_price($prod_price) {
        $this->prod_price = $prod_price;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function Insert() {
        //$insArray["prod_id"] = $this->prod_id;
        $insArray["prod_cat_id"] = $this->prod_cat_id;
        $insArray["prod_sup_id"] = $this->prod_sup_id;
        $insArray["prod_title"] = $this->prod_title;
        $insArray["prod_dec"] = $this->prod_dec;
        $insArray["imagepath"] = $this->imagepath;
        $insArray["prod_available_qty"] = $this->prod_available_qty;
        $insArray["prod_price"] = $this->prod_price;
        $insArray["status"] = $this->status;
        
        $prodId = DBAccess::queryInsert(self::$_tablename,$insArray);
        return $prodId;
    }
    public function Update(){
        $insArray["prod_id"] = $this->prod_id;
        $insArray["prod_cat_id"] = $this->prod_cat_id;
        $insArray["prod_sup_id"] = $this->prod_sup_id;
        $insArray["prod_title"] = $this->prod_title;
        $insArray["prod_dec"] = $this->prod_dec;
        $insArray["imagepath"] = $this->imagepath;
        $insArray["prod_available_qty"] = $this->prod_available_qty;
        $insArray["prod_price"] = $this->prod_price;
        $insArray["status"] = $this->status;
        
        $prodId =  DBAccess::queryUpdate(self::$_tablename, $insArray, self::$_primarykey . '=' . $this->prod_id);
        return $prodId;
        
    }
    
    static function Find($prodId) {
        //echo $prodId;
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey.'='.$prodId);
        $row = $result->fetch_object();
        return new Product($row->prod_id, $row->prod_cat_id, $row->prod_sup_id, $row->prod_title,$row->prod_dec,$row->imagepath,$row->prod_available_qty,$row->prod_price,$row->status);
    }
    
    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Product($row->prod_id, $row->prod_cat_id, $row->prod_sup_id, $row->prod_title,$row->prod_dec,$row->imagepath,$row->prod_available_qty,$row->prod_price,$row->status);
        }
        return $arr;
    }
    
    public static function getProductTitle($prodId){
        $productData  = self::Find($prodId);
        return $productData->getProd_title();
    }
    
    public static function getProductPrice($prodId){
        $productData  = self::Find($prodId);
        return $productData->getProd_price();
    }
    
    public static function getProductImage($prodId){
        $productData  = self::Find($prodId);
        return $productData->getImagepath();
    }
}
