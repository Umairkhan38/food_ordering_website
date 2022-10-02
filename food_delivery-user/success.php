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
                        <li><a href="shop.php">Shop</a></li>
                        <li class="active">Order Placed </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-us-area pt-50 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-7 d-flex align-items-center">
                        <div class="overview-content-2">
                            <h2>Order has been placed successfully. <br/><br/>Order Id <?php echo $_SESSION['ORDER_ID']?></h2>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<?php
unset($_SESSION['ORDER_ID']);
include("footer.php");
?>