<?php 
$err="";
$flag=0;
$errflag=0;
	if(isset($_POST['submit'])){
		$fname=$_POST['first_name'];
		$lname=$_POST['last_name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];

		if($fname==$lname){
			$err="First name and last name are same!";
			$errflag=1;
		}
		if($password!=$confirm_password){
			$err="Both password should be same";
			$errflag=1;
		}
		include 'db.php';
		$qt="select username from employee where username='$email';";
		$res=mysqli_query($conn,$qt);
		if(mysqli_num_rows($res)>0){
			$err="Email already registered!";
			$errflag=1;
		}
		if($errflag==0){
			
			$q="insert into employee(username,password) values('$email','$password');";
			//echo $q;fname,lname,email,gender,//
			$q1="insert into employee_personal(username,fname,lname,gender,email,phone,profile,address) values('$email','$fname','$lname','$gender','$email','','','');";
			//echo $q1;
			if(mysqli_query($conn,$q) and mysqli_query($conn,$q1)){
				header("location:EmpLogin.php?success");
			}else{
				echo mysqli_error($conn);
			}
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
<title>Employee Registration Form</title>
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
</head>
<body>
<div class="signup-form">
    <form  method="post">
		<h2>Register</h2>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control"  value="<?php if(isset($_POST['submit'])){echo $fname;}?>" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" value="<?php if(isset($_POST['submit'])){echo $lname;}?>" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
			<select class="form-control"  name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" value="<?php if(isset($_POST['submit'])){echo $email;}?>" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" value="<?php if(isset($_POST['submit'])){echo $password;}?>" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" value="<?php if(isset($_POST['submit'])){echo $confirm_password;}?>" placeholder="Confirm Password" required="required">
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <input type="submit" name="submit" class="btn btn-success btn-lg btn-block" value="Register Now">
        </div>
		<div class="form-group">
			<center class="text-danger"><?php echo $err; ?></center>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="EmpLogin.php">Sign in</a></div>
</div>
</body>
</html>                            