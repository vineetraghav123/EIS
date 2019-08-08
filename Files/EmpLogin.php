<?php
session_start();

if(isset($_REQUEST['success'])){
    echo "<script>alert(\" successfully Registered!\")</script>";
}
$err="";
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	//echo "$username $password";
	include 'db.php';
	$q="select * from employee where username='$username';";
	//echo $q;
	$result=mysqli_query($conn,$q);
	
	if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_assoc($result);
		$p=$row['password'];
		if($p==$password){
            $_SESSION['username']=$username;
			header("location:EmpHome.php");
		}else{
			$err="Incorrect Username/Password";
		}
	}else{$err="Incorrect Username/Password";}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Employee Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    body{
    	background-image:url('assets/img/city_bg.jpg');
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size:cover;
	
	}
</style>
</head>
<body >

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
            <a href="../index.html"  class="btn btn-success btn-block">Home</a>

        </div>
        
        <center class="text-center"><a href="EmpReg.php">Create an Account</a></center>
        
        <br/>    
       <p align="center" style="color:red;"><?php echo $err;?>  </p>
    </form>
   
</div>
</body>
</html>                                		                            