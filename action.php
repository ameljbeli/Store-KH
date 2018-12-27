<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "

	<ul class='multi-column-dropdown'>
	    <h6>Categories</h6>
		";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#get_category' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</ul>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
	<ul class='multi-column-dropdown'>
	    <h6>Beands</h6>
	   	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#vvvvv' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</ul>";
	}
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
				echo "	
						<div class='col-md-4' id='vvvvv'>
							<div class='new-collections-grid1 animated wow slideInUp' data-wow-delay='.5s'>
							
								<div class='new-collections-grid1-image'>
									<a href='single.html' class='product-image'><img src='product_images/$pro_image' alt='' class='img-responsive' /></a>
									<div class='new-collections-grid1-image-pos'>
										<a href='single.html'>Quick View</a>
									</div>
									<div class='new-collections-grid1-right'>
										<div class='rating'>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt=' 'class= 'img-responsive'/>
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='clearfix'> </div>
										</div>
									</div>
								</div>
								<h4><a href='single.html'>$pro_title</a></h4>
								<p>Vel illum qui dolorem eum fugiat.</p>
								<div class='new-collections-grid1-left simpleCart_shelfItem'>
									<p><i>$480</i> <span class='item_price'>$pro_price</span><a class='item_add' href=' '  pid='$pro_id' id='product'>add To Cart</a></p>
								</div>
							</div>

						
					</div>
		


							";
		
		}
	}
}

if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
			<div class='new-collections-grids' >
	
				<div class='new-collections-grid-sub-grids'>

					<div class='new-collections-grid1-sub'>
							<div class='new-collections-grid1 animated wow slideInUp' data-wow-delay='.5s'>
							
								<div class='new-collections-grid1-image'>
									<a href='single.html' class='product-image'><img src='product_images/$pro_image' alt='' class='img-responsive' /></a>
									<div class='new-collections-grid1-image-pos'>
										<a href='single.html'>Quick View</a>
									</div>
									<div class='new-collections-grid1-right'>
										<div class='rating'>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt=' 'class= 'img-responsive'/>
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='rating-left'>
												<img src='images/2.png' alt='' class='img-responsive' />
											</div>
											<div class='clearfix'> </div>
										</div>
									</div>
								</div>
								<h4><a href='single.html'>$pro_title</a></h4>
								<p>Vel illum qui dolorem eum fugiat.</p>
								<div class='new-collections-grid1-left simpleCart_shelfItem'>
									<p><i>$480</i> <span class='item_price'>$pro_price</span><a class='item_add' href=' '  pid='$pro_id' id='product'>add To Cart</a></p>
								</div>
							</div>

							</div>
						
						<div class='clearfix'> </div>
					</div>
			</div>
					</div>
			";
		}
	}
	


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
		}
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="product_images/'.$product_image.'" /></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="chackout.html" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}

	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>
			
			<table class='timetable_sub'>
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>quantity</th>
							<th>Product Name</th>
							<th>Price</th>
		    				<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>";
			
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<tr class="rem.$n">
						<td class="invert">'.$n.'</td>
						<td class="invert-image"><a href="single.html"><img src="product_images/'.$product_image.'" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
							<input type="hidden" name="" value="'.$cart_item_id.'"/>
							<input type="text" class="form-control qty" value="'.$qty.'" >
							
						</td>
						<td class="invert">'.$product_title.'</td>
						<td class="invert">
							<input  type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></td>		
						<td class="invert"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></td>
						<td class="invert" style=" width: 10%;">
							
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#"  update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
						</td>
						</tr>
              
						';
				}
				
				echo ' </table>
				<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>
				          		<script>
									$(".value-plus").on("click", function(){
										var divUpd = $(this).parent().find(".value"), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$(".value-minus").on("click", function(){
										var divUpd = $(this).parent().find(".value"), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
				         ';

					
				if (!isset($_SESSION["uid"])) {
					echo '
					<input type="submit"  name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>
				';
				}else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="ameljbeli90@gmail.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/project1/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/project1/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
				}
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






