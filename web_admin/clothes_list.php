<?php
include("check_session.php");
include("connection.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($connection,"select product_image from products where product_id='$product_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../images/products/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($connection,"delete from products where product_id='$product_id'")or die("query is incorrect...");
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
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
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
	<h1>Clothes list / Page <?php echo $page;?> </h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr><th>Image</th><th>Name</th><th>Price</th><th>
	<a class=" btn btn-primary" href="add_product.php">Add New</a></th></tr>
<?php 

$result=mysqli_query($connection,"select product_id,product_image, product_title,product_price from products  where product_cat=2 or product_cat=3 or product_cat=4  Limit $page1,10")or die ("query 1 incorrect.....");

while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
{
echo "<tr><td><img src='../images/products/$image' style='width:50px; height:50px; border:groove #000'></td><td>$product_name</td>
<td>$price</td>
<td>

<a class=' btn btn-success' href='clothes_list.php?product_id=$product_id&action=delete'>Delete</a>
</td></tr>";
}

?>
</table>
</div></div>

<nav align="center">
  

<?php 
//counting paging

$paging=mysqli_query($connection,"select product_id,product_image, product_title,product_price from products");
$count=mysqli_num_rows($paging);

$a=$count/10;
$a=ceil($a);
echo "<bt>";echo "<bt>";
for($b=1; $b<=$a;$b++)
{
?> 
<ul class="pagination" style="border:groove #666">
<li><a class="label-info" href="clothes_list.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li></ul>
<?php	
}
?>
</nav>
</div></div>

</div>

<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
	 <p>© 2016 Shoppy. All Rights Reserved  </p>
</div>	
<!--COPY rights end here-->
</div>
</div>

         <?php include("include/side_bar.php"); ?>


</body>
</html>                     