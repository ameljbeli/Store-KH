<?php
include("check_session.php");
include("connection.php");
error_reporting(0);
if(isset($_POST['submit']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];

//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
	if($picture_size<=50000000)
	{
		$pic_name=time()."_".$picture_name;
		move_uploaded_file($picture_tmp_name,"../images/products/".$pic_name);


if(mysqli_query($connection,"INSERT INTO `amelshop`.`products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES (NULL, '1', '1', 'pcccc', '24', 'cx', 'samsung mobile.jpg', 'samsung')") or die ("query incorrect"))
{
 header("location: sumit_form.php");
}
}else
{

}
}else
{

}
mysqli_close($connection);
}
?>
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
    
  <div class="col-sm-10 " align="center"> 
  <div class="panel-heading" style="background-color:#c4e17f">
 <h1><span class="glyphicon glyphicon-tag"></span> Product / Add Product  </h1></div><br>
  <div class="panel-body" style="background-color:#E6EEEE;">
    <div class="col-lg-7">
        <div class="well">
        <form action="add_product.php" method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" autofocus style="width:100%" placeholder="Product Name" required>
<p>Description</p>
<textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>
<p>Add Image</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
</div>
</div>
<div class="well">
<h3>Pricing</h3>
<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
    </div><br>
<p>Compare at price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" name="c_price" id="c_price" class="form-control" placeholder="0.00">
    </div>
    </div>
        </div>  
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>  
<p>Product type</p>
<input type="text" name="product_type" id="product_type" class="form-control" placeholder="Shirt, T-Shirt">
<br>
<p>Vendor / Brand</p>
<input type="text" name="brand" id="brand" class="form-control" placeholder="Polo, Nike">
<br>
<p>Other tags</p>
<input type="text" name="tags" id="tags" class="form-control" placeholder="Summer, Soft, Cotton etc">
</div>          
</div>

<div align="center">
    <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px""> Add Product</button>
    </div>
        </form>
</div></div>

</div>

<!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
   <p>© 2016 Shoppy. All Rights Reserved  </p>
</div>  
<!--COPY rights end here-->
</div>
</div style="background-color:#CCC">

         <?php include("include/side_bar.php"); ?>


</body>
</html>                     


