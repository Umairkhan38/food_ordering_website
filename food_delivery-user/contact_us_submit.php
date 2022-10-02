<?php
include('database.inc.php');
include('function.inc.php');
include('constant.inc.php');
$name=get_safe_value($_POST['name']);
$email=get_safe_value($_POST['email']);
$Mobile_No=get_safe_value($_POST['Mobile_No']);
$subject=get_safe_value($_POST['subject']);
$message=get_safe_value($_POST['message']);
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into contact_us(name,email,Mobile_No,subject,message,added_on) values('$name','$email','$Mobile_No','$subject','$message','$added_on')");
echo "Thank You For Connecting With Us, Will Get Back To You Shortly !";
?>
