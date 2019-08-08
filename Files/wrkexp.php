<?php
session_start();
$flag="";
if( isset($_GET['u'])){
    $_SESSION['empp']=$_GET['u'];
 
}else if(!isset($_SESSION['empp']) and !isset($_GET['u'])){
    header("location:CmpLogin.php");
}
$company=$_SESSION['company'];
$emp=$_SESSION['empp'];
 
    if(isset($_POST['submit'])){
        include 'db.php';
        $join=$_POST['joindate'];
        $left=$_POST['leftdate'];
        $status=$_POST['status'];
        $profile=$_POST['profile'];
        $performance=$_POST['performance'];
        $desc=$_POST['description'];
        $q="insert into work_experience(username,company,joindate,leftdate,status,profile,description,performance) values('$emp','$company','$join','$left','$status','$profile','$desc','$performance');";
        if(mysqli_query($conn,$q)){
            $flag="Successfully added!";
        }else{
            $flag=mysqli_error($conn);
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
    <script>window.open("ViewReport.php", _blank );</script>
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
    include 'CmpSideNav.php';

?>


<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">View</h2>  

        <div class="form-group">
            <input type="text" class="form-control" name="company" value="<?php echo $company; ?>"  placeholder="Username" required="required">
        </div>
       <div class="form-group">
            <input type="text" class="form-control" name="joindate" placeholder="joindate" required="required">
        </div><div class="form-group">
            <input type="text" class="form-control" name="leftdate" placeholder="leftdate" required="required">
        </div><div class="form-group">
            <select name="status" class="form-control">
                <option value="working">Working</option>
                <option value="left">Left</option>
            </select>
        </div><div class="form-group">
            <input type="text" class="form-control" name="profile" placeholder="profile" required="required">
        </div><div class="form-group">
            <input type="text" class="form-control" name="description" placeholder="description" required="required">
        </div>
        <div class="form-group">
        <select name="performance" class="form-control">
                <option value="1">Perfromance</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
       
        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Add</button>
        </div>
         
        <br/>    
       <p align="center" style="color:green;"> <?php echo $flag;?></p>
    </form>
</div>

</body>
</html>