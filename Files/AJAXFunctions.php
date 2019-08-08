<?php
session_start();
if(isset($_SESSION['company'])){
    $company=$_SESSION['company'];
}
if(isset($_GET['u'])){
    $username=$_GET['u'];
    $comp=$_GET['c'];
    $date=date("d/m/y");
    $q="update  $comp set status='left' ,leftdate='$date' where username='$username';";
    include 'db.php';

    if(mysqli_query($conn,$q)){
        echo "Successfully Changed!";
    }else {echo mysqli_error($conn);}
}


if(isset($_GET['se'])){
    include 'db.php';
    $username=$_GET['se'];
 
    
    $q="select * from $company where username='$username';";
    $code="";
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)>0){
        echo "<div class=\"container-fluid\" style=\"background-color:white;\">
        <table class=\"table table-hover\">
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
            <tbody>";
        while($row=mysqli_fetch_assoc($result)){
           
            $count=0;
      
         
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
        echo "   </tbody>
    </table>";

    
    }else{
        echo "<center><font color=\"red\" ><h4>incorrect Details</h4></font><center>";
    }
    
    echo $code;

}

?>
