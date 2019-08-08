<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:EmpLogin.php");
}
  if(isset($_SESSION['username'])){
    $usernames=$_SESSION['username'];
    $q="select * from skills where username='$usernames';";
    include 'db.php';
    $result="";
    $result=mysqli_query($conn,$q);
    
    
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Employee Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="./SideNav.css">

</head>
<body class="w3-light-grey" style="-webkit-app-region: no-drag;">

<?php
    include 'SideNav.php';
?> 




<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">

    <?php
    $picname="";
          if(isset($_SESSION['username'])){
            $q1="select * from employee_personal where username='$usernames';";
            //echo $q;
            $result1=mysqli_query($conn,$q1);
            if(mysqli_num_rows($result1)>0){
              
              $row1=mysqli_fetch_assoc($result1);
              $fname=$row1['fname'];
              $lname=$row1['lname'];
              $email=$row1['email'];
              $gender=$row1['gender'];
              $phone=$row1['phone'];
              $profile=$row1['profile'];
              $address=$row1['address'];
              $picname=$row1['pic'];

            }


          }
        ?>
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <?php
            if($picname!="none"){
              echo " <img src=\"assets/PP/$picname \" style=\"width:100%\" >";
           
            }else{
              echo " <img src=\"assets/PP/city_bg.jpg \" style=\"width:100%\" >";

            }
          
          ?>
          
          <div class="w3-display-bottomleft w3-container w3-text-black" style="background-color:#009688;width:100%; opacity: 0.8; filter: alpha(opacity=50); ">
            <h2 style='color:white;'><?php if(isset($_SESSION['username'])) echo "$fname $lname"; ?></h2>
          </div>
        </div>
        <div class="w3-container">
        
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php if(isset($_SESSION['username'])) echo $profile ?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php if(isset($_SESSION['username'])) echo $address ?></p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i><?php if(isset($_SESSION['username'])) echo $email ?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i><?php if(isset($_SESSION['username'])) echo $phone ?></p>
          <hr>

          <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>Skills</b></p>
          
          <?php
          //Skills/////
            if(isset($_SESSION['username'])){
              if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)) {
                  $sk=$row['skillname'];
                  $vl=$row['percentage'];
                  echo "<p>$sk</p>";
                  echo " <div class=\"w3-light-grey w3-round-xlarge w3-small\">";
                 echo "<div class=\"w3-container w3-center w3-round-xlarge w3-teal\" style=\"width:$vl%\">$vl%</div>";
               echo "</div>";
              }
              }
            }
          ?>
          

          <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
          
          <?php
          if(isset($_SESSION['username'])){
            $ql="select * from language where username='$usernames';";
            //echo $q;
            $resultl=mysqli_query($conn,$ql);
            if(mysqli_num_rows($resultl)>0){
              
              while($rowl=mysqli_fetch_assoc($resultl)){
                $l=$rowl['language'];
                $p=$rowl['percentage'];
                echo "<p>$l</p>";
                echo "<div class=\"w3-light-grey w3-round-xlarge\">";
                echo "<div class=\"w3-round-xlarge w3-teal\" style=\"height:18px;width:$p%\"></div>";
                echo "</div>";
              }
             

            }
          }
        ?>

          
          
          
          <br>
        </div>
		<br/>
     
    <!-- ////////////////////////////////////////////////-->
      
    
    
        


</div><br>

   
<div class="w3-white w3-text-grey w3-card-4">

          <div class="w3-container" style="padding:20px;">
        <p class="w3-large w3-text-theme"><b><i class="fa fa-file fa-fw w3-margin-right w3-text-teal"></i>Projects</b></p>
          
          <?php
          if(isset($_SESSION['username'])){
            $ql="select * from projects where username='$usernames';";
            //echo $q;
            $resultl=mysqli_query($conn,$ql);
            if(mysqli_num_rows($resultl)>0){
              
              while($rowl=mysqli_fetch_assoc($resultl)){
                $name=$rowl['name'];
                $dur=$rowl['duration'];
                $description=$rowl['description'];
                $url=$rowl['url'];
                echo " <div class=\"w3-container\">";
                echo " <h5 ><b>$name</b></h5>";
                
                echo "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>$dur</h6>";
               
                
                echo "<p>$description.</p>";
                echo    "<p><i class=\" w3-text-teal fa fa-globe w3-margin-right\"></i><a class=\" btn btn-primary\" target=\"_balnk\" href=\"$url\">Visit</a> </p>";

                echo "<hr>";
                echo "</div>";
              }
             

            }
          }
        ?>
              
          </div>    
        </div> 
   
    <!-- End Left Column -->
</div>

    



    
    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
        <?php
          if(isset($_SESSION['username'])){
            $q="select * from work_experience where username='$usernames';";
            $result=mysqli_query($conn,$q);
            if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){
                $company=$row['company'];
                $joindate=$row['joindate'];
                $leftdate=$row['leftdate'];
                $status=$row['status'];
                $prof=$row['profile'];
                $des=$row['description'];
                $performance=$row['performance'];
                
                
                echo " <div class=\"w3-container\">";
                echo " <h5 class=\"w3-opacity\"><b>$prof</b></h5><img src=\"./assets/img/$performance.jpg \" width=\"95px\" height=\"23px\" >";
                echo      "<p><i class=\" w3-text-teal fa fa-home w3-margin-right\"></i>$company</p>";
                if($status=="working"){
                echo "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>$joindate - <span class=\"w3-tag w3-teal w3-round\">Current</span></h6>";
                }else{
                  echo "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>$joindate - $leftdate</h6>";
                }
                echo "<p>$des.</p>";
                echo "<hr>";
                echo "</div>";
              }
            }
          }
        
        ?>
        
        
        
      </div>

      <div class="w3-container w3-card w3-white">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
        <?php
          if(isset($_SESSION['username'])){
            $q="select * from education where username='$usernames';";
            $result=mysqli_query($conn,$q);
            if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_assoc($result)){
                $educationname=$row['name'];
                $institute=$row['institute'];
                $per=$row['percentage'];
                $duration=$row['duration'];
                echo "<div class=\"w3-container\">";

                echo  "<h5 class=\"w3-opacity\"><b>$educationname</b> ($per%)</h5>";
                echo     "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>$duration</h6>";
                echo      "<p><i class=\" w3-text-teal fa fa-home w3-margin-right\"></i>$institute</p>";
                echo      "<hr>";
                echo    "</div>";
              }
            }
          }
        
        ?>
        
        
        
      </div>

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Employee Home</p>

</footer>


</body>
</html>