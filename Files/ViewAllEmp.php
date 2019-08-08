<?php
session_start();
if(!isset($_SESSION['company'])){
  header("location:CmpLogin.php");
}
$company=$_SESSION['company'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Employees</title>
    <link rel="stylesheet" href="./SideNav.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="assets/css/user.css">

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


<div class="container-fluid" style="background-color:white;">
<table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Profile</th>
        <th>Address</th>
        <th>Join Date</th>
        <th>Left Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    
      <?php 
      $code="";
      $count=0;
      if(isset($_SESSION['company'])){
        include 'db.php';
      
        $q="select * from $company;";
        $result=mysqli_query($conn,$q);
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
            $username=$row['username'];
            $joindate=$row['joindate'];
            $leftdate=$row['leftdate'];
            $status=$row['status'];
            $q2="select * from employee_personal where username='$username';";
            $result2=mysqli_query($conn,$q2);
            $row2=mysqli_fetch_assoc($result2);
            $fname=$row2['fname'];
            $lname=$row2['lname'];
            $email=$row2['email'];
            $phone=$row2['phone'];
            $profile=$row2['profile'];
            $address=$row2['address'];
            $pic=$row2['pic'];

            echo "<tr>";
            // echo "<div style=\"background-color:gray;\">";
            echo "<td>$username</td>";
            echo "<td>$fname $lname</td>";
            echo "<td>$email</td>";
            echo "<td>$phone</td>";
            echo "<td>$profile</td>";
            echo "<td>$address</td>";
            echo "<td>$joindate</td>";
            echo "<td>$leftdate</td>";
            echo "<td>$status</td>";
            echo "<td><a href=\"#aboutModal\" data-toggle=\"modal\" data-target=\"#$phone\" class=\"btn btn-success\">View</a></td>";
            // echo "</div>";
            echo "</tr>";

            $code=$code."<!-- Modal -->
            <div class=\"modal fade\" id=\"$phone\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-dialog\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                            <h4 class=\"modal-title\" id=\"myModalLabel\">More About $fname</h4>
                            </div>
                        <div class=\"modal-body\">
                            <center>
                            <img src=\"assets/PP/$pic \" name=\"aboutme\" width=\"140\" height=\"140\" border=\"0\" class=\"img-circle\"></a>
                            <h3 class=\"media-heading\">$fname $lname</h3>
                           
                                <button class=\" btn btn-primary\" onclick=\"left('$username','$company','id$phone')\">Left</button>
                                <a href=\"ViewReport.php?u=$username\" target=\"_blank\" class=\" btn btn-primary\" >View File</a>
                                <a href=\"wrkexp.php?u=$username\" target=\"_blank\" class=\" btn btn-primary\" >Add Work Experience</a>
                                <a href=\"AddProject.php?u=$username\" target=\"_blank\" class=\" btn btn-primary\" >Add Projects</a>
                            </center>
                            <hr>
                            <center>
                              $joindate - $leftdate  $status 
                            </center>
                            <center id=\"id$phone\">
                            </center>
                        </div>
                        <div class=\"modal-footer\">
                            <center>
                            <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>";
    

          }
        }

      }

      ?>
     
      
    </tbody>
  </table>
       
     
  <?php 
      
      if(isset($_SESSION['company'])){

        echo $code;
      }
      
      
  ?> 
		
    
    
</div>

    
                <script>
                


                function left(username,company,id) {
                  
                var xhttp;
                
               var c=confirm("Are you sure?");
               if(c==false){
                 return;
               }
                
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(id).innerHTML = this.responseText;
                    }
                }
                var tmp="u="+username+"&c="+company;
                xhttp.open("GET", "AJAXFunctions.php?"+tmp, true);
                xhttp.send();   
                }
                </script>


</body>
</html>