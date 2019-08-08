<?php
 
  $company="";
  $company=$_SESSION['company'];
?>

<div id="mySidenav" class="sidenav" style="-webkit-app-region: no-drag;">
<a class="text-danger"><?php echo $company;?></a>
  <a href="javascript:void(0)"  style="-webkit-app-region: no-drag;" onclick="closeNav()">&times;</a>
  
  <a href="CmpHome.php">Home</a>
  <a href="ViewEmp.php">View Employee File</a>
  <a href="ViewAllEmp.php">View All Employees </a>
  <a href="SearchEmp.php">Search Employees </a>

  <a href="AddEmployee.php">Add Employee</a>
  <a href="AddWorkExp.php">Add Work Experience</a>
  <a href="CmpChangePassword.php">Change Password</a>


  <a href="logout.php">Logout</a>
</div>
<div style="width:100%;background-color:#009688 ;color:white;-webkit-app-region: drag;-webkit-user-select: none;" > 
<span style="font-size:30px;cursor:pointer;margin-left:10px;-webkit-app-region: no-drag;" onclick="openNav()">&#9776;Menu</span>
<span style="font-size:30px;cursor:pointer;margin-right:10px;-webkit-app-region: no-drag;" class="pull-right" onclick="window.close()">&times;</span>
</div>

<script>
function closeWin() {
  window.top.close();
   // Closes the new window
} 
function openNav() {
  document.getElementById("mySidenav").style.width = "270px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>