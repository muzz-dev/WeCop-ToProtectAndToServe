<?php

include '../admin/connection.php';

$contact=$_POST["contact"];
$password=$_POST["password"];
$response=array();

$result=mysqli_query($conn,"select * from tbl_user where contact='".$contact."' and password='".$password."'");


if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		if($row["isverify"]=="Y")
		{
			mysqli_query($conn,"update tbl_user set token='".$_POST["token"]."' where userid='".$row["userid"]."'");
			$response["status"]="yes";
			$response["id"]=$row["userid"];
			$response["name"]=$row["uname"];
      $response["contact"]=$row["contact"];
      $response["email"]=$row["email"];
		}
		else
		{
			$otp=rand(1111,9999);
			mysqli_query($conn,"update tbl_user set otp='".$otp."' where userid='".$row["userid"]."'");
			$response["status"]="notverify";
			$response["id"]=(string)$row["userid"];
			$response["otp"]=(string)$otp;
      #StartSendNotification
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
          $mail->Subject = 'Forgot Password'; 
           
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
          }
      }
      #EndSendNotification
		}
	}
}
else
{
	$response["status"]="no";	
}

echo json_encode($response);
?>