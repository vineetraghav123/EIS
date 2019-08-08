<?php

$err="";
	if(isset($_POST['submit'])){
		$cname=$_POST['name'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		include 'db.php';
		
		$q="insert into organization(company,username,email,password,tablename) values('$cname','$username','$email','$password','$cname')";
		$q1="create table $cname(username varchar(50),joindate varchar(20),leftdate varchar(20), status varchar(20));";
		if(mysqli_query($conn,$q))
		{
			if(mysqli_query($conn,$q1)){
				echo mysqli_error($conn);
			}
			header("location:CmpLogin.php?success");
		}else{
			echo mysqli_error($conn);
		}
		
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body{
		color: #fff;
		
		font-family: 'Roboto', sans-serif;
		background-image:url('assets/img/city_bg.jpg');
		
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size:cover;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>
<script>
		function check(){
			var p=document.getElementById("p").value;
			var cp=document.getElementById("cp").value;
			if(p!=cp){
				alert("Password mismatch");
				return false;
			}
			
		return false;

		}
	</script>
</head>
<body>
<div class="signup-form">
    <form action="" method="post" onsubmit="check()">
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
			
				<input type="text" class="form-control" name="name" placeholder="Company Name" required="required">
			       	
        </div>
		<div class="form-group">
			
				<input type="text" class="form-control" name="username" placeholder="username" required="required">
			        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="p" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpassword" id="cp" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Register Now">
        </div>
		<p align="center" style="color:red;"><?php echo $err;?>  </p>
    </form>
	

	<div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
</body>
</html>                            