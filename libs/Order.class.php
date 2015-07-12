<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author eranga
 */
class Order {
    private static $_tablename = "orders";
    private static $_primarykey = "orderid";
    
    private $order_id = null;
    private $customer_id = null;    
    private $order_details = null; 
    private $order_cost = null;
    private $request_date = null;
    private $order_status = null;
    private $status = null;
    
    function __construct($order_id, $customer_id, $order_details, $order_cost, $request_date, $order_status, $status) {
        $this->order_id = $order_id;
        $this->customer_id = $customer_id;
        $this->order_details = $order_details;
        $this->order_cost = $order_cost;
        $this->request_date = $request_date;  
        $this->order_status = $order_status;
        $this->status = $status;
    }

    static function get_tablename() {
        return self::$_tablename;
    }

    static function get_primarykey() {
        return self::$_primarykey;
    }

    function getOrder_id() {
        return $this->order_id;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getOrder_details() {
        return $this->order_details;
    }

    function getRequest_date() {
        return $this->request_date;
    }

    function getOrder_cost() {
        return $this->order_cost;
    }

    function getOrder_status() {
        return $this->order_status;
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

    function setOrder_id($order_id) {
        $this->order_id = $order_id;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setOrder_details($order_details) {
        $this->order_details = $order_details;
    }

    function setRequest_date($request_date) {
        $this->request_date = $request_date;
    }

    function setOrder_cost($order_cost) {
        $this->order_cost = $order_cost;
    }

    function setOrder_status($order_status) {
        $this->order_status = $order_status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function Insert() {
        
    }
    public function Update(){
        $insArray["orderid"] = $this->order_id;
        $insArray["customer_id"] = $this->customer_id;
        $insArray["order_details"] = $this->order_details;
        $insArray["cost"] = $this->order_cost;    
        $insArray["request_date"] = $this->request_date;
        $insArray["order_status"] = $this->order_status;
        $insArray["status"] = $this->status;
        
        $orderId =  DBAccess::queryUpdate(self::$_tablename, $insArray, self::$_primarykey . '=' . $this->customer_id);
        return $orderId;
        
    }
    
    static function Find($orderid) {
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey . '=' . $orderid);
        $row = $result->fetch_object();
        return new Order($row->orderid, $row->customer_id, $row->order_details, $row->cost, $row->request_date, $row->order_status, $row->status);
    }
    
    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Order($row->orderid, $row->customer_id, $row->order_details, $row->cost, $row->request_date, $row->order_status, $row->status);
        }
        return $arr;
    }
    
    static function explodeCartArray($array){
        return json_decode($array);
    }
    
    public static function checkQtyAvailable($prodId,$requestQty){
        $productIns = new Product($prod_id="", $prod_cat_id="", $prod_sup_id="", $prod_title="", $prod_dec="", $imagepath="", $prod_available_qty="", $prod_price="", $status="");
        $productData = $productIns->Find($prodId);
        $systemQty = $productData->getProd_available_qty();
        if($systemQty>=$requestQty){
            return TRUE;
        }
        FALSE;
    }
    
}
