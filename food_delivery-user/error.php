<?php
include ("header.php");
if(!isset($_SESSION['ORDER_ID'])){
	redirect('shop.php');
}

?>

<div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="shop.php">Home</a></li>
                        <li class="active">Order Failed </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-us-area pt-50 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-7 d-flex align-items-center">
                        <div class="overview-content-2">
                            <h2>Order has been failed. Please try after sometime.</h2>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<?php
unset($_SESSION['ORDER_ID']);
include("footer.php");
?>