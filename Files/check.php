<?php 
session_start();
if(isset($_SESSION['company'])){
$company=$_SESSION['company'];
}
if(isset($_SESSION['username'])){
$employee=$_SESSION['username'];
}
$date=date("d-M-Y");

if(isset($_GET['e'])){
    include 'db.php';
    $emp=$_GET['e'];
    $q="insert into $company(username,joindate,leftdate,status) values('$emp','$date','','working');";
    if(mysqli_query($conn,$q)){
        echo "added Sucessfully!";
    }
}
if(isset($_GET['name'])){
    include 'db.php';
    $info=$_GET['info'];
    $name=$_GET['name'];

    if($info=="skill"){
        $q="delete  from skills where username='$employee' and skillname='$name';";
        }else if($info=="language"){
            $q="delete  from language where username='$employee' and language='$name';";
        }else if($info=="education"){
            $q="delete  from education where username='$employee' and name='$name';";
        }
    if(mysqli_query($conn,$q)){
        echo "Deleted successfully!";
    }else {
        echo mysqli_error($conn);
    }
}
if(isset($_GET['q'])){
    $username=$_GET['q'];
    $q="select * from employee_personal where username='$username';";
    include 'db.php';
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $fname=$row['fname'];
        $lname=$row['lname'];
        $profile=$row['profile'];

        echo "<table class=\"table\">";
        echo "<tr><td>$fname $lname</td><td>$profile</td><td><button type=\"button\" onclick=\"addEmp('$username')\" class=\"btn btn-primary\">Add</button></td></tr>";
        echo "</table>";
    }else{
        echo "<font color=\"red\">incorrect Details</font>";
    }

}

if(isset($_GET['w'])){
    $username=$_GET['w'];
    $q="select * from $company where username='$username';";
    include 'db.php';
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)>0){
        $q="select * from employee_personal where username='$username';";
       
        $result=mysqli_query($conn,$q);
        if(mysqli_num_rows($result)>0){
            $_SESSION['empp']=$username;
            $row=mysqli_fetch_assoc($result);
            $fname=$row['fname'];
            $lname=$row['lname'];
            $profile=$row['profile'];
    
            echo "<table class=\"table\">";
            echo "<tr><td>$fname $lname</td><td>$profile</td><td><a type=\"button\" href=\"wrkexp.php\" onclick=\"addEmp('$username')\" class=\"btn btn-primary\">Select</a></td></tr>";
            echo "</table>";
        }else{
            echo "<font color=\"red\">incorrect Details</font>";
        }
    
    }else{
        echo "<font color=\"red\">incorrect Details</font>";
    }

}

if(isset($_GET['di'])){
    $info=$_GET['di'];
    if($info=="skill"){
    $q="select * from skills where username='$employee';";
    }else if($info=="language"){
        $q="select * from language where username='$employee';";
    }else if($info=="education"){
        $q="select * from education where username='$employee';";
    }
    include 'db.php';
    $result=mysqli_query($conn,$q);
    if(mysqli_num_rows($result)>0){
        // $q="select * from employee_personal where username='$username';";
       
        
        while($row=mysqli_fetch_assoc($result)){
           $name="";
            if($info=="skill"){
                $name=$row['skillname'];
            }else if($info=="language"){
                $name=$row['language'];
            }else if($info=="education"){
                $name=$row['name'];
            }
           // echo "<div class=\"signup-form\" style=\"width:30%;\">";
            echo "<table class=\"table \">";
            echo "<tr><td>$name</td><td><button type=\"button\" href=\"wrkexp.php\" onclick=\"deleteinfo('$name','$info')\" class=\"btn btn-primary\">Delete</a></td></tr>";
            echo "</table>";
        }
    
    }else{
        echo "<font color=\"red\">incorrect Details</font>";
    }

}

?>