<?php
include("check_session.php");
include("connection.php");
$user_id=$_REQUEST['user_id'];

$result=mysqli_query($connection,"select user_id, first_name, password from admin_login where user_id='$user_id'")or die ("query 1 incorrect.......");

list($user_id,$user_name,$user_password)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];

mysqli_query($connection,"update admin_login set first_name='$user_name', password='$user_password' where user_id='$user_id'")or die("Query 2 is inncorrect..........");

header("location: manage_users.php");
mysqli_close($connection);
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
  <div class="col-md-10 content" align="center">  
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Edit User Details </h1></div><br>
<form action="edit_user.php" name="form" method="post" enctype="multipart/form-data">
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id;?>" />
<label style="font-size:18px;">User-name</label>
<br>
<input class="input-lg" style="font-size:18px; width:200px" name="user_name" type="text"  id="user_name" value="<?php echo $user_name; ?>" autofocus><br><br>
<label style="font-size:18px;">Password</label>
<br>
<input class="input-lg" style="font-size:18px; width:200px" name="user_password" type="text"  id="user_password" value="<?php echo $user_password; ?>">
<br><br>
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
</form>
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
<?php include("include/js.php");?>
</body>
</html>