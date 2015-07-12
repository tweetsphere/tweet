<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common
 *
 * @author eranga
 */
class Common {
    public function getColorRowInner($num){
        if($num % 2 == 0){
            $style = "tablecontentinner";
        }
        else{
            $style = "tablecontentinnerred";
        }
        return $style;
    }
    
    public function getColorRow($num){
        if($num % 2 == 0){
            $style = "tablecontent";
        }
        else{
            $style = "tablecontentred";
        }
        return $style;
    }
    
    public static function findStatus($status){
        if($status == 1){
            return "Active";
        }
        if($status == 2){
            return "Pending";
        }
        if($status == 3){
            return "Accepted";
        }
        if($status == 0){
            return "Inactive";
        }
    }
}
