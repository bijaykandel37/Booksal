<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["page"])){
	$sql = "SELECT * FROM futsals";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#product-row' page='$i' id='page' class='active'>$i</a></li>
            
            
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
	$product_query = "SELECT * FROM futsals";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['futsal_id'];
			$pro_cat   = $row['PANNo'];
			$pro_brand = $row['futsal_address'];
			$pro_title = $row['futsal_name'];
			$pro_price = $row['futsal_rate'];
			$pro_image = $row['futsal_image'];
			echo "
				
                        <div class='col-md-4 col-xs-6' >
								<a href='product.php?p=$pro_id'>
                                    <div class='product'>
									<div class='product-img'>
										<img src='futsal_images/$pro_image' style='max-height: 170px;' alt=''>
										<div class='product-label'>
											<span class='new'>NEW</span>
										</div>
                                        </div></div>
                                    </a>
									<div class='product-body'>
										<h4 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h4>
																	
                                </div><hr><hr><br><br>
								</div>";
		}
	}
}
?>

							