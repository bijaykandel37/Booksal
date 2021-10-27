<?php
include 'header.php';
?>
      <div class="main main-raised"> 
        
		<div class="section" style="background: url(admin/assets/img/sidebar-3.jpg) no-repeat center center fixed;">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<h3>Our Futsals</h3>
					<!-- STORE -->
					<div id="store" class="col-md-10" style="margin-left:15%;">
						<div class="row" id="product-row">
            <?php
                    include 'db.php';
					$product_query = "SELECT * FROM futsals";
                $run_query = mysqli_query($con,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['futsal_id'];
                        $pro_title = $row['futsal_name'];
                        $pro_price = $row['futsal_rate'];
                        $pro_image = $row['futsal_image'];
                        $address = $row['futsal_address'];

                        echo " <div class='col-md-4 col-xs-5'>
                                <div class='product'>
									<a href='futsal.php?p=$pro_id'>
                                    <div class='product-img'>
										<img src='futsal_images/$pro_image' style='max-height: 170px;' alt=''>
										</div></a>
									<div class='product-body'>
										<h4 class='product-name header-cart-item-name'><a href='futsal.php?p=$pro_id'>$pro_title</a></h4>
										<p class='product-category'>$address</p>
										<h4 class='product-price header-cart-item-info'>$pro_price</h4><h6>per hour</h6>
									</div>
								</div>
								</div> ";		};
      } ?>
					
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<?php
include "footer.php";
?>