<?php

include '../admin/connection.php';

$contact=$_POST["contact"];
$otp=rand(1111,9999);
$result=mysqli_query($conn,"select * from tbl_user where contact='".$contact."'");
$row=mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0)
{
	$response["status"]="yes";
	$response["userid"]=$row["userid"];
  $response["email"]=$row["email"];
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
                  echo "mail not send";
                }else{ 
                  // echo "Mail Send";
                  // echo "<script>window.location='OTPverification.php?id=$id'</script>";
                }
  }//Send Notification to User's Email
}
else
{
	$response["status"]="no";	
}

echo json_encode($response);
?>