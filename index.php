<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'yes');

require("config.php");
require 'libs/Validate.class.php';
require 'libs/DBAccess.php';
require 'libs/Category.class.php';
require 'libs/Order.class.php';
require 'libs/Customer.class.php';
require 'libs/Product.class.php';
require 'libs/Common.class.php';
require 'libs/Supplier.class.php';
require_once 'libs/ExcelRead.class.php';
    
 if(isset($_GET['logout'])== true){
    unset($_SESSION['userId']);
 }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Rfabric Admin</title>
<link href="styles/style.css" rel="stylesheet" type="text/css" />
<script>
function myFunction() {
    window.print();
}
</script>
</head>
<body>
<div id="Wrap">
<div id="header"><a href="index.php" id="logo-main"><img src="images/rfabric-logo-main.png" title="Rfabric" alt="Rfabric Logo" border="0" /></a>

    
 <?php if(isset($_SESSION['userId']) && $_SESSION['userId']!=""){ ?> 
<div id="loginusr">Welcome <b>Admin</b>, <a href="index.php?page=login&logout=true">Log out</a></div>
</div>
<div id="sidebar">
<div class="sidetitle">Category</div>
<div class="sidetitlesub"><a href="index.php?page=categories">Categories</a></div>
<div class="sidetitlesub"><a href="index.php?page=add_category">Add Category</a></div>

<div class="sidetitle">Vendor</div>
<div class="sidetitlesub"><a href="#">Vendors</a></div>
<div class="sidetitlesub"><a href="#">Add New Vendor</a></div>

<div class="sidetitle">Product</div>
<div class="sidetitlesub"><a href="index.php?page=products">Products</a></div>
<div class="sidetitlesub"><a href="index.php?page=add_product">Add Product</a></div>


<div class="sidetitle">Order Tracking</div>
<div class="sidetitlesub"><a href="index.php?page=transactions">Transactions/Orders</a></div>

<div class="sidetitle">Reports</div>
<div class="sidetitlesub"><a href="#">Daily Transaction</a></div>
<div class="sidetitlesub"><a href="#">Customers</a></div>
</div>
     
<?php }?>
<div id="bodymain">
<?php 
        if(isset($_GET['page'])){                       
                $includePage = "includes/".$_GET['page'].".php";                     
        }
        else{
            $includePage = "includes/login.php";
        }
        if(isset($includePage)){
                include($includePage);
            }      
      ?>

</div>

</div>
<div id="footermain"><div>
<p style="float:left;"><a href="#">Documentation</a> | <a href="#">Support</a></p>
<span id="footerinner">Powered by : <a href="#">Powered By SLIIT WE Group 41</a></span></div>
</div>
</body>
</html>