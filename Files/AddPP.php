<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:EmpLogin.php");
    }
    $username=$_SESSION['username'];
    $flag="";
    if(isset($_POST['submit'])){
       
        if(isset($_FILES['image'])){
           $errors= array();
           $file_name = $_FILES['image']['name'];
           $file_size =$_FILES['image']['size'];
           $file_tmp =$_FILES['image']['tmp_name'];
           $file_type=$_FILES['image']['type'];
           $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
           
           $extensions= array("jpeg","jpg","png");
           
           if(in_array($file_ext,$extensions)=== false){
              $flag="extension not allowed, please choose a JPEG or PNG file.";
           }
           
           if($file_size > 2097152){
              $flag='File size must be less then 2 MB';
           }
           $time=time();
           $fname=$time.".".$file_ext;
           $q="update employee_personal set pic='$fname' where username='$username';";
          
           if($flag==""){
             
              include 'db.php';
              if(mysqli_query($conn,$q)){
                move_uploaded_file($file_tmp,"./assets/PP/".$fname);
              
                $flag="Success";
              }
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
    <title>Add Profile Picture</title>
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
    <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Add Profile Picture</h2>       
        <div class="form-group">
        <input type="file" name="image" required id="image">       
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