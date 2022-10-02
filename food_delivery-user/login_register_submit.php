<?php
session_start();
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
include('smtp/PHPMailerAutoload.php');

$type=get_safe_value($_POST['type']);
$added_on=date('Y-m-d h:i:s');
if($type=='register'){
	$name=get_safe_value($_POST['name']);
	$email=get_safe_value($_POST['email']);
	$mobile=get_safe_value($_POST['mobile']);
	$password=get_safe_value($_POST['password']);
	$check=mysqli_num_rows(mysqli_query($con,"select * from user where email='$email'"));
	if($check>0){
		$arr=array('Status'=>'error','msg'=>'Email id already registered','field'=>'email_error');
	}else{
		$new_password=password_hash($password,PASSWORD_BCRYPT);
		$rand_str=rand_str();
		mysqli_query($con,"insert into user(name,email,mobile,password,Status,added_on,rand_str) values('$name','$email','$mobile','$new_password','1','$added_on','$rand_str')");
		$id=mysqli_insert_id($con);
		// $html="http://127.0.0.1/xampp/majorproject/food_delivery(project)/verify.php/".$rand_str;
		// send_email($email,$html,'Verify your email id');
		
		
		$arr=array('Status'=>'success','msg'=>'Thank you for register. Now you can Login Through your this email id and password','field'=>'form_msg');
	}
	echo json_encode($arr);
}

if($type=='login'){
	$email=get_safe_value($_POST['user_email']);
	$password=get_safe_value($_POST['user_password']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$Status=$row['Status'];
		$dbpassword=$row['password'];
			if($Status==1){
					$_SESSION['FOOD_USER_ID']=$row['id'];
					$_SESSION['FOOD_USER_NAME']=$row['name'];
					$arr=array('Status'=>'success','msg'=>'');
					
					if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0){
						foreach($_SESSION['cart'] as $key=>$val){
							manageUserCart($_SESSION['FOOD_USER_ID'],$val['qty'],$key);
						}
					}
				
			}else{
				$arr=array('Status'=>'error','msg'=>'Your account has been deactivated.');
			}
		
	}else{
		$arr=array('Status'=>'error','msg'=>'Please do registration First i.e enter valid email id ');	
	}
	echo json_encode($arr);
}

if($type=='forgot'){
	$email=get_safe_value($_POST['user_email']);
	
	$res=mysqli_query($con,"select * from user where email='$email'");
	$check=mysqli_num_rows($res);
	if($check>0){	
		$row=mysqli_fetch_assoc($res);
		$Status=$row['Status'];
		$email_verify=$row['email_verify'];
		$id=$row['id'];
		if($email_verify==1){
			if($Status==1){
				$rand_password=rand(11111,99999);
				$new_password=password_hash($rand_password,PASSWORD_BCRYPT);
				mysqli_query($con,"update user set password='$new_password' where id='$id'");
				$html=$rand_password;
				send_email($email,$html,'New Password');
				$arr=array('Status'=>'success','msg'=>'Password has been reset and send it to your email id');
				
			}else{
				$arr=array('Status'=>'error','msg'=>'Your account has been deactivated.');
			}
		}else{
			$arr=array('Status'=>'error','msg'=>'Please varify your email id');
		}
	}else{
		$arr=array('Status'=>'error','msg'=>'Please enter valid email id');	
	}
	echo json_encode($arr);
}
?>