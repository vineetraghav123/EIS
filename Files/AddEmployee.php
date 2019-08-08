<?php
session_start();
if(!isset($_SESSION['company'])){
    header("location:CmpLogin.php");
}
//echo $_SESSION['company'];


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
        <h2 class="text-center">Add Employee</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">
        </div>
       
        <!-- <div class="form-group">
            <input type="number" class="form-control" name="Percentage" placeholder="Percentage" max="100" min="0" required="required">
        </div> -->
        
        <div class="form-group">
            <button type="button" onclick="check()" name="submit" class="btn btn-primary btn-block">Add</button>
        </div>
         
        <br/>    
       <p align="center" style="color:green;"> <?php //echo $flag;?></p>
       <div id="result"></div>
    </form>
    
</div>

                <script>
                function addEmp(user){
                    var xhttp;
                
                 var e=user;
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "check.php?e="+e, true);
                xhttp.send();   
                }


                function check() {
                var xhttp;
                
                 var e=document.getElementById("username").value;
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "check.php?q="+e, true);
                xhttp.send();   
                }
                </script>
</body>
</html>