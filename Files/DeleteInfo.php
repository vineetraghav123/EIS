<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("location:EmpLogin.php");
}
$err="";
$flag=0;
	if(isset($_POST['submit'])){
		$fname=$_POST['first_name'];
		$lname=$_POST['last_name'];
		$email=$_POST['email'];
		$gender=$_POST['gender'];
		$password=$_POST['password'];
		include 'db.php';
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Delete Information</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="./SideNav.css">

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
<?php
    include 'SideNav.php';
?>
<h2 class="text-center"> Select Information to Delete</h2>
<div class="signup-form" style="width:30%;">
   
      

    <form  method="post">
    
		<div class="form-group" >
			<div class="row" >
				<div class="col-xs-6">
                    <select name="performance" id="info" class="form-control">
                        <option value="1">Select</option>
                        <option value="skill">Skills</option>
                        <option value="language">Language</option>
                        <option value="education">Education</option>
                  
                    </select>
                
                </div>
				<div class="col-xs-6"><button type="button" class="btn btn-primary" onclick="check()">GO</button></div>
				
            </div>        	
        </div>
        <div id="result">
    </div>
</div>

    
<script>
function check() {
                var xhttp;
                
                 var e=document.getElementById("info").value;
                
				
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "check.php?di="+e, true);
                xhttp.send();   
                }
    function deleteinfo(name,info){
        var xhttp;
                
               
		var c=confirm("are you Sure?");
				if(c==false){return;}
              
              
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("result").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET", "check.php?name="+name+"&info="+info, true);
                xhttp.send();   
    }
</script>
</body>
</html>                            