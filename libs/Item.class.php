<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author eranga
 */
class Item {
    private static $_tablename = " items";
    private static $_primarykey = "item_id";
    
    private $item_id = null;
    private $catId = null;
    private $title = null;
    private $imgUrl = null;
    private $price = null;
    private $rtPrice = null;
    private $discount = null;
    private $order = null;
    private $status = null;
    
    function __construct($item_id, $catId, $title, $imgUrl, $price, $rtPrice, $discount, $order, $status) {
        $this->item_id = $item_id;
        $this->catId = $catId;
        $this->title = $title;
        $this->imgUrl = $imgUrl;
        $this->price = $price;
        $this->rtPrice = $rtPrice;
        $this->discount = $discount;
        $this->order = $order;
        $this->status = $status;
    }
    public function getItem_id() {
        return $this->item_id;
    }

    public function setItem_id($item_id) {
        $this->item_id = $item_id;
    }

    public function getCatId() {
        return $this->catId;
    }

    public function setCatId($catId) {
        $this->catId = $catId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getImgUrl() {
        return $this->imgUrl;
    }

    public function setImgUrl($imgUrl) {
        $this->imgUrl = $imgUrl;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getRtPrice() {
        return $this->rtPrice;
    }

    public function setRtPrice($rtPrice) {
        $this->rtPrice = $rtPrice;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function Insert() {

        $insArray["item_id"] = "Null";
        $insArray["category_id"] = $this->catId;
        $insArray["title"] = $this->title;
        $insArray["img_url"] = $this->imgUrl;
        $insArray["price"] = $this->price;
        $insArray["rt_price"] = $this->rtPrice;
        $insArray["discount"] = $this->discount;
        $insArray["order_pat"] = $this->order;
        $insArray["status"] = $this->status;
        
        $itemId = DBAccess::queryInsert(self::$_tablename, $insArray);
        return $itemId;
    }
    
    function Update() {

        $insArray["item_id"] = $this->item_id;
        $insArray["category_id"] = $this->catId;
        $insArray["title"] = $this->title;
        $insArray["img_url"] = $this->imgUrl;
        $insArray["price"] = $this->price;
        $insArray["rt_price"] = $this->rtPrice;
        $insArray["discount"] = $this->discount;
        $insArray["order_pat"] = $this->order;
        $insArray["status"] = $this->status;
        $itemId = DBAccess::queryUpdate(self::$_tablename, $insArray, self::$_primarykey . '=' . $this->item_id);
        return $itemId;
    }
    
       static function Find($itemId) {
        $result = DBAccess::querySelect(self::$_tablename, self::$_primarykey . '=' . $itemId);
        $row = $result->fetch_object();
        return new Item($row->item_id, $row->category_id,$row->title, $row->img_url, $row->price,$row->rt_price,$row->discount,$row->order,$row->status);
    }

    static function FindAll($wh = null, $arrFields = "*", $sort = array(), $sortBy = "A", $lStart = 0, $numRecs = 0, $status = array(_ACTIVE_)) {
        $result = DBAccess::querySelect(self::$_tablename, $wh, $arrFields, $sort, $sortBy, $lStart, $numRecs, $status);
        $arr = array();
        while ($row = $result->fetch_object()) {
            $arr[] = new Item($row->item_id, $row->category_id,$row->title, $row->img_url, $row->price,$row->rt_price,$row->discount,$row->order,$row->status);
        }
        return $arr;
    }
    
    public static function getItems(){
        $resualts = self::FindAll("status ='"._ACTIVE_."'");
        return $resualts;
    }
    
    public static function getItemsByCatId($catId){
        $resualts = self::FindAll("category_id = '".$catId."' AND status='"._ACTIVE_."'");
        return $resualts;
    }
    
    public static function getItem($itemId){
        $resualts = self::FindAll("item_id = '".$itemId."' AND status='"._ACTIVE_."'");
        //$item = $resualts->fetch_object();
        return $resualts;
    }
    
}

?>
