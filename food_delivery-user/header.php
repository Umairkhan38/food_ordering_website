<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$totalPrice=0;

if(isset($_POST['update_cart'])){
	foreach($_POST['qty'] as $key=>$val){
		if(isset($_SESSION['FOOD_USER_ID'])){
			if($val[0]==0){
				mysqli_query($con,"delete from dish_cart where dish_detail_id='$key' and user_id=".$_SESSION['FOOD_USER_ID']);
			}else{
				mysqli_query($con,"update dish_cart set qty='".$val[0]."' where dish_detail_id='$key' and user_id=".$_SESSION['FOOD_USER_ID']);	
			}
		}else{
			if($val[0]==0){
				unset($_SESSION['cart'][$key]['qty']);
			}else{
				$_SESSION['cart'][$key]['qty']=$val[0];	
			}
		}
	}
}

$cartArr=getUserFullCart();
//prx($cartArr);
foreach($cartArr as $list){
	$totalPrice=$totalPrice+($list['qty']*$list['price']);
}
$totalCartDish=count($cartArr);

?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Food Delivery</title> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/chosen.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/meanmenu.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area">
            <div class="header-top black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                            <div class="welcome-area">
                                
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-12 col-sm-8">
                            <div class="account-curr-lang-wrap f-right">
                                <?php
								if(isset($_SESSION['FOOD_USER_NAME'])){
								?>
								<ul>
                                    <li class="top-hover"><a href="#"><?php echo "Welcome <span id='user_top_name'>".$_SESSION['FOOD_USER_NAME'];?></span>  <i class="ion-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="profile.php">Profile  </a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                            <div class="logo">
                                    <img alt="" src="logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                            <div class="header-middle-right f-right">
                                <div class="header-login">
                                    <?php
									if(!isset($_SESSION['FOOD_USER_NAME'])){
										?>
									<a href="login_register.php">
                                        <div class="header-icon-style">
                                            <i class="icon-user icons header_icon"></i>
                                        </div>
                                        <div class="login-text-content header_icon">
											
												<p>Register <br> or <span>Sign in</span></p>
												
                                        </div>
                                    </a>
									<?php
											}
											?>
                                </div>
                                <div class="header-wishlist">
                                   &nbsp;
                                </div>
                                <div class="header-cart">
                                <a href="#">

                                        <div class="header-icon-style">

                                            <i class="icon-handbag icons"></i>
                                            <span class="count-style" id="totalCartDish"><?php echo $totalCartDish?></span>
                                        </div>
                                        <div class="cart-text">
                                            <span class="digit">My Cart</span>
                                            <span class="cart-digit-bold" id="totalPrice">
											<?php 
											if($totalPrice!=0){
												echo $totalPrice.' Rs';
											}
											?></span>
                                        </div>
                                    </a>
									<?php if($totalPrice!=0){?>
									<div class="shopping-cart-content">
                                        <ul id="cart_ul">
											<?php foreach($cartArr as $key=>$list){ ?>
												<li class="single-shopping-cart" id="attr_<?php echo $key?>">
													<div class="shopping-cart-img">
														<a href="javascript:void(0)"><img alt="" src="<?php echo SITE_DISH_IMAGE.$list['image']?>"></a>
													</div>
													<div class="shopping-cart-title">
														<h4><a href="javascript:void(0)">
														<?php echo $list['dish']?>
														</a></h4>
														<h6>Qty: <?php echo $list['qty']?></h6>
														<span><?php echo 
														$list['qty']*$list['price'];?> Rs</span>
													</div>
													<div class="shopping-cart-delete">
														<a href="javascript:void(0)" onclick="delete_cart('<?php echo $key?>')"><i class="ion ion-close"></i></a>
													</div>
												</li>
											<?php } ?>
                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Total : <span class="shop-total" id="shopTotal">
											<?php echo $totalPrice?> Rs
                                        </div>
                                        </span></h4>

                                        <div class="shopping-cart-btn">
                                        
                                        <a href="cart.php">Cart</a>
                                        
                                        </div>


									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom transparent-bar black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="main-menu">
                            <nav id="navbar">
        <div id="logo">
            <img src="logo.jpg">
        </div>
        <ul>
            <li class="item"><a href ="index.php">Home</a></li>
            <li class="item"><a href="about.html">About Us</a></li>
            <li class="item"><a href="service.html">Services</a></li>
            <li class="items"><a href="shop.php">Shop</a></li>
            <li class="items"><a href="contact.php">Contact Us</a></li>

               </ul>
               
    </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile-menu-area-start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="mobile-menu">
								<nav id="mobile-menu-active">
									<ul class="menu-overflow" id="nav">
                                    <li class="item"><a href ="index.php">Home</a></li>
										<li><a href="shop.php">shop</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="contact-us.php">Contact Us</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- mobile-menu-area-end -->
        </header>