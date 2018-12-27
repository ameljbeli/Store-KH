<?php
include("check_session.php");
include("connection.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$order_id=$_GET['order_id'];

/*this is delet query*/
mysqli_query($connection,"delete from orders where order_id='$order_id'")or die("delete query is incorrect...");
} 

///pagination
$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	<h1>Orders list / Page <?php echo $page;?> </h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr>
	<th>Customer Name</th>
	<th>Products</th>
	<th>Contact | Email</th>
	<th>Address</th>
	<th>Time</th>
</tr>
<?php 

$result=mysqli_query($connection,"select order_id, product_title, first_name, mobile,email, address1, address2, qty from orders,products,user_info where user_info.user_id=orders.user_id and products.product_id=orders.product_id Limit $page1,10")or die ("query 1 incorrect.....");

while(list($order_id,$product_title,$first_name,$mobile,$email,$address1,$address2,$qty)=mysqli_fetch_array($result))
{	
echo "<tr>
		<td>$first_name</td>
		<td>$product_title</td>
		<td>$email<br>$mobile</td>
		<td>$address1<br>$address2</td>
		<td>$qty</td>
		<td>
<a class=' btn btn-success' href='orders.php?order_id=$order_id&action=delete'>Delete</a>
</td></tr>";
}
?>
</table>
</div></div>

<nav align="center">
  
<?php 
//counting paging

$paging=mysqli_query($connection,"select product_id,image, product_name,price from products");
$count=mysqli_num_rows($paging);

$a=$count/5;
$a=ceil($a);
echo "<bt>";echo "<bt>";
for($b=1; $b<=$a;$b++)
{
?> 
<ul class="pagination " style="border:groove #666">
<li><a class="label-info" href="orders.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li></ul>
<?php	
}
?>
</nav>
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