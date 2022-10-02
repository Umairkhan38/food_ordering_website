<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;


$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; 
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$oid=$_POST['ORDERID'];
		$getUserDetailsBy=getUserDetailsByid();
		$_SESSION['ORDER_ID']=$oid;
		mysqli_query($con,"update  order_master set payment_status='success'");
		redirect('success.php');
		
	}
	else {
		$oid=$_POST['ORDERID'];
		mysqli_query($con,"update order_master set payment_status='failed'");
		redirect('error.php');
	}
}else{
	$oid=$_POST['ORDERID'];
	mysqli_query($con,"update order_master set payment_status='failed'");
	redirect('error.php');
}

?>