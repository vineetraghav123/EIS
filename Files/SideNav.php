<div id="mySidenav" class="sidenav" style="-webkit-app-region: no-drag;">
  <a href="javascript:void(0)"  style="-webkit-app-region: no-drag;" onclick="closeNav()">&times;</a>
  <a href="EmpHome.php">Home</a>

  <a href="AddEducation.php">Add Education</a>
  <a href="AddSkill.php">Add Skills</a>
  <a href="EPDetails.php">Edit Personal Details </a>
  <a href="DeleteInfo.php">Delete Information</a>
  <a href="AddLanguage.php">Add Language</a>
  <a href="AddProject.php">Add Projects</a>
  <a href="AddPP.php">Add Profile Picture</a>
  <a href="UploadResume.php">Add Resume</a>
  <a href="ChangePassword.php">Change Password</a>

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
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>