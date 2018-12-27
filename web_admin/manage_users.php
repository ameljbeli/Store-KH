<?php
include("check_session.php");
include("connection.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($connection,"delete from admin_login where user_id='$user_id'")or die("query is incorrect...");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
         <?php include("include/head_link.php"); ?>

</head>
<body>

  <div class="page-container">	
   <div class="left-content">
	   <div class="mother-grid-inner">
         <?php include("include/header.php"); ?>

<!--inner block start here-->
<div class="inner-block">

<div class="container-fluid main-container">
    <div class="col-md-9 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Manage User </h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>User Name</th>
                <th>User Password</th>
	<th><a href="add_user.php">Add New</a></th></tr>	
<?php 
$result=mysqli_query($connection,"select user_id, first_name, password from admin_login")or die ("query 2 incorrect.......");

while(list($user_id,$user_name,$user_password)=
mysqli_fetch_array($result))
{
echo "<tr><td>$user_name</td><td>$user_password</td>";

echo"<td>
<a href='edit_user.php?user_id=$user_id'>Edit</a>
<a href='manage_users.php?user_id=$user_id&action=delete'>Delete</a>
</td></tr>";
}
mysqli_close($connection);
?>
</table>
</div></div>
</div></div>

</div>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>

<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved  </p>
</div>	

<!--COPY rights end here-->
</div>
</div>

         <?php include("include/side_bar.php"); ?>

<?php include("include/js.php"); ?>
</body>
</html>