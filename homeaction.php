<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["page"])){
	$sql = "SELECT * FROM futsals";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/2);
	for($i=1;$i<=$pageno;$i++){
		echo "<li><a href='#product-row' page='$i' id='page'>$i</a></li>";
	}
}    
if(isset($_POST["search"])){
    include 'header.php';
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM futsals WHERE futsal_keywords LIKE '%$keyword%'";
	echo"<div class='main main-raised'>
		<div class='section'>
			<div class='container'>
				<div class='row'>
					<h3>Found Futsals for searched results  '$keyword'</h3>
					<div id='store' class='col-md-10' style='margin-left:15%;'>
						<div class='row' id='product-row'>";
    
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query))
    {
			$pro_id    = $row['futsal_id'];
                        $pro_title = $row['futsal_name'];
                        $pro_price = $row['futsal_rate'];
                        $pro_image = $row['futsal_image'];
                        $address = $row['futsal_address'];
			echo "
            <div class='col-md-4 col-xs-5'>
                                <div class='product'>
									<a href='futsal.php?p=$pro_id'>
                                    <div class='product-img'>
										<img src='futsal_images/$pro_image' style='max-height: 170px;' alt=''>
										</div></a>
									<div class='product-body'>
										<h4 class='product-name header-cart-item-name'><a href='futsal.php?p=$pro_id'>$pro_title</a></h4>
										<p class='product-category'>$address</p>
										<h4 class='product-price header-cart-item-info'>$pro_price</h4><h6>per hour</h6>
									</div></div></div>
			";
		}
	}
echo'</div></div></div></div></div></div>';
include "footer.php";
?>