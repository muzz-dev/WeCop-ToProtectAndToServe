<?php

include '../admin/connection.php';

$name=$_POST["name"];
$contact=$_POST["contact"];
$email=$_POST["email"];
$password=$_POST["password"];

$otp=rand(1111,9999);

//email

//email

$result=mysqli_query($conn,"insert into tbl_user (uname,contact,email,password,otp) values ('".$name."','".$contact."','".$email."','".$password."','".$otp."')");

$id=mysqli_insert_id($conn);

$response=array();
$result=mysqli_query($conn,"select * from tbl_user where contact='".$contact."'");
$row=mysqli_fetch_assoc($result);

if($result)
{
  #Send Notification to User's Email
	$response["status"]="yes";
	$response["userid"]=(string)$id;
	$response["otp"]=(string)$otp;
	{
    $name=$row["uname"];
    $email=$row["email"];            

    // Include PHPMailer library files 
      require 'PHPMailer/PHPMailerAutoload.php'; 

      // Create an instance of PHPMailer class 
      $mail = new PHPMailer;


      $mail->isSMTP();
      //$mail->SMTPDebug = 1; # 0 off, 1 client, 2 client y server
      $mail->CharSet  = 'UTF-8';
      $mail->Host     = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'tls';
      $mail->Port     = 587;
      $mail->Username = 'teamwecop@gmail.com';
      $mail->Password = 'bdakpulazjixbqme';
      // Sender info 
      $mail->setFrom('teamwecop@gmail.com', 'WeCop-To Protect and To Serve'); 
      $mail->addReplyTo('teamwecop@gmail.com', 'WeCop-To Protect and To Serve'); 
       
      // Add a recipient 
      $mail->addAddress($email); 
      
      // Email subject 
      $mail->Subject = 'OTP Verification'; 
       
      // Set email format to HTML 
      $mail->isHTML(true); 
       
      // Email body content 
      $mail->Body = "<h2> OTP Verification </h2>
      <p>Dear $name</p>
      <p>Your OTP is : $otp</p>

      <h2>Thank You - Team WeCop - To Protect and To Serve</h2>
      "; 
      // Send email 
      if(!$mail->send()){ 
        echo "mail not send";
      }else{ 
        // echo "Mail Send";
        // echo "<script>window.location='OTPverification.php?id=$id'</script>";
      }
  }
  #Send Notification to User's Email
}
else
{
	$response["status"]="no";
}
echo json_encode($response);
?>