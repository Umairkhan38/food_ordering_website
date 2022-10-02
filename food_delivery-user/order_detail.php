<?php
include ("header.php");
if(!isset($_SESSION['FOOD_USER_ID'])){
	// redirect('shop.php');
}

if(isset($_GET['id']) && $_GET['id']>0){
	$id=get_safe_value($_GET['id']);
	$getOrderById=getOrderById($id);
	if($getOrderById[0]['user_id']!=$_SESSION['FOOD_USER_ID']){
		redirect('shop.php');
	}
}else{
	// redirect('shop.php');
}

$uid=$_SESSION['FOOD_USER_ID'];

?>

<div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <h3 class="page-title">Order Detail</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form method="post">
							<div class="table-content table-responsive">
								
                                <table style="border:1px solid #e9e8ef;">
												<tr>
													<th width="30%">Dish</th>
													<th width="20%">Attribute</th>
													<th width="15%">Unit Price</th>
													<th width="5%">Qty</th>
													<th width="15%">Total Price</th>
													<th width="15%"></th>
												</tr>
												<?php
												$getOrderDetails=getOrderDetails($oid);
												$pp=0;
												//prx($getOrderDetails);
												foreach($getOrderDetails as $list){
													$pp=$pp+($list['qty']*$list['price']);
													?>
														<tr>
															<td><?php echo $list['dish']?></td>
															<td><?php echo $list['attribute']?></td>
															<td><?php echo $list['price']?></td>
														
															}
															?>
															</td>
														</tr>
													<?php
												}
												?>
											
												
											
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
include("footer.php");
?>