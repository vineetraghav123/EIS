<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:EmpLogin.php");
    }
    $flag="";
    $errflag=0;
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $cp=$_POST['cp'];
        $np=$_POST['np'];
        $npa=$_POST['npa'];
        include 'db.php';
        $qt="select password from employee where username='$username';";
        $rt=mysqli_query($conn,$qt);
        if(mysqli_num_rows($rt)>0){
            $row=mysqli_fetch_assoc($rt);
            $tp=$row['password'];
            if($tp!=$cp){
                $errflag=1;
                $flag="incorrect old password!";
            }
        }else{
            $flag="no user found!";
            //echo mysqli_error($conn);
            $errflag=1;
        }

        if($np!=$npa){
            $flag="Both password sholud be same!";
            $errflag=1;
        }

        if($errflag==0){
        
        $q="update employee set password='$np' where username='$username';";
        if(mysqli_query($conn,$q)){
            $flag="Updated Successfully!";
        }else{
            echo mysqli_error($conn);
        }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
    <link rel="stylesheet" href="./SideNav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    <style>
.login-form {
		width: 500px;
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
<body>
    
<?php
    include 'SideNav.php';
?>


<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Change Password</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="cp"  placeholder="Old Password" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="np"  placeholder="New Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="npa"  placeholder="Confirm Password" required="required">
        </div> 
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
        </div>
         
        <br/>    
       <p align="center" style="color:green;"> <?php echo $flag;?></p>
    </form>
</div>
</body>
</html>