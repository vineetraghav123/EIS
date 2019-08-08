<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:EmpLogin.php");
    }
    $flag="";
    if(isset($_POST['submit'])){
        $name=$_POST['Name'];
        $Institute=$_POST['Institute'];
        $percentage=$_POST['Percentage'];
        $duration=$_POST['Duration'];
        include 'db.php';
        $username=$_SESSION['username'];
        $q="insert into education(username,name,institute,percentage,duration) values('$username','$name','$Institute','$percentage','$duration');";
        if(mysqli_query($conn,$q)){
            $flag="Added Successfully!";
        }else{
            echo mysqli_error($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <h2 class="text-center">Add Education</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="Name" placeholder="Name" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="Institute" placeholder="Institute" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="Percentage" placeholder="Percentage" max="100" min="0" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="Duration" placeholder="Duration" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Save</button>
        </div>
         
        <br/>    
       <p align="center" style="color:green;"> <?php echo $flag;?></p>
    </form>
</div>
</body>
</html>