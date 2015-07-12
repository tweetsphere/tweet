

<div class="loginboxmain">
<form  name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		
        <div class="loginbox">
        <div style="float:left;"><span>User name : </span><input type="text" name="username_login" id="username_login"  value="" class="TextBoxInput" style="width: 170px"/></div>        
            <div style="float:left; margin-left:50px;"><span>Password : </span><input type="password" name="password_login" id="password_login"  value="" class="TextBoxInput" style="width: 170px;"/></div>
		</div>
		<div class="loginbox">
        	<a href="#" class="forgotpass">Forgot your password?</a>
			<input type="submit" name="login" value="Login" class="loginButtonSmall"/>
		</div>
        
</form>
</div>
        
</div>
</body>
 <?php
$err = "";

$validate = new Validate();
        
if(isset($_POST['login'])){
    $userName = $_POST["username_login"];
    $passWord = $_POST["password_login"];
    
    if($validate->checkNull($userName) && $validate->checkNull($passWord)){
                    $err.="Fields are empty Please check";
    }
    echo $err;
    if($err == ""){
      $result = DBAccess::queryManual("SELECT userid,status FROM usmgt_user WHERE usname = '".$userName."' AND psword = '".md5($passWord)."'");
      $row= $result->fetch_object();
       if(count($row)> 0){
            $status = $row->status;
            if(isset($status) && $status == _ACTIVE_){
                echo "login success please wait...";
                $_SESSION['userId'] = $row->userid;
                echo '<SCRIPT language="JavaScript">window.location="index.php?page=dashboard";</SCRIPT>';
            }
        }      
      else{
          echo "user not valied";
      }
        
    }
}


?>   
    