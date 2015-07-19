<?php
date_default_timezone_set('Asia/Colombo');
error_reporting(E_ALL);
ini_set('display_errors', "no");
require("config.php");
require("twitteroauth/twitteroauth.php");
//require_once "/var/www/html/phpInsight-master/autoload.php";
require_once "libs/phpInsight-master/autoload.php";
$sentiment = new \PHPInsight\Sentiment();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Tweet Tweet</title>
<meta name="keywords" content="">
<meta name="description" content="">
<link href="css/twstyles.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
</head>
<body>
<div id="TweetTweet">
	<header><div id="Header">
    	<hgroup><a href="#" class="Logo">tweet</a><h1><a href="#">Tweetspher</a></h1>	
        <h2>Admin</h2></hgroup>
        <nav><ul id="Navi">
        <li><a href="index.php?page=tweets">View Tweets</a></li>
        <li><a href="index.php?page=scrap">Scrap Data</a></li>
        <li><a href="index.php?page=showdata">Sentiment</a></li>
		<li><a href="index.php?page=users">Users</a></li>
        </ul></nav>
<?php
if (!$link = mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWORD_)) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db(_DB_NAME_, $link)) {
    echo 'Could not select database';
    exit;
}
            if (isset($_GET['page'])) {
                $includePage = "includes/" . $_GET['page'] . ".php";
            } else {
                $includePage = "includes/tweets.php";
            }
            if (isset($includePage)) {
                include($includePage);
            }
?>
<footer>
<p>Copyright &copy; 2015 SLIIT WE Group 50</p>
</footer>     
</div><!--TweetTweet-->
</body>
</html>
