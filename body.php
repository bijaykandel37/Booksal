<div class="main main-raised">
<div class="container mainn-raised" style="width:100%;">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
      <div class="item active">
        <img src="img/banner3.jpg" style="width:100%; height: 250px;"></div>

      <div class="item">
        <img src="img/banner2.png" style="width:100%; height: 250px;"></div>
    
      <div class="item">
        <img src="img/banner4.jpg" style="width:100%; height: 250px;"></div>
      
      <div class="item">
        <img src="img/banner1.jpg" style="width:100%; height: 250px;"></div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control _26sdfg" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only" >Previous</span>
    </a>
    <a class="right carousel-control _26sdfg" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
       <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top Futsals</h3>
						</div>
					</div>
                    <div class="col-md-12 mainn mainn-raised">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
                                        
                <?php
                include 'db.php';
					
                $product_query = "SELECT * FROM futsals WHERE futsal_id BETWEEN 1 and 100";
                $run_query = mysqli_query($con,$product_query);
                if(mysqli_num_rows($run_query) > 0){

                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['futsal_id'];
                        $pro_title = $row['futsal_name'];
                        $pro_price = $row['futsal_rate'];
                        $pro_image = $row['futsal_image'];
                        $address = $row['futsal_address'];

                        echo "<div class='product'>
									<a href='futsal.php?p=$pro_id'>
                                    <div class='product-img'>
										<img src='futsal_images/$pro_image' style='max-height: 170px;' alt=''>
										</div></a>
									<div class='product-body'>
										<h4 class='product-name header-cart-item-name'><a href='futsal.php?p=$pro_id'>$pro_title</a></h4>
										<p class='product-category'>$address</p>
									</div></div>";		}; } 
                                        ?>
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
</div>


