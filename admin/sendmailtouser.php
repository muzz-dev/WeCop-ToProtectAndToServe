<?php
include 'connection.php';
function sendmailtouser($userid)
{
  $res=mysqli_query($conn,"select * from tbl_user where userid='".$userid."'");
    if(mysqli_num_rows($res)>0)
    {
        while($row=mysqli_fetch_assoc($res))
        {
          $name=$row["uname"];
          $username=$row["contact"];
          $password=$row["password"];
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
            $mail->Username = 'muzammilaadeez@gmail.com';
            $mail->Password = 'krhzkcqgtvurseaa';
            // Sender info 
            $mail->setFrom('wecop@gmail.com', 'wecop'); 
            $mail->addReplyTo('wecop@gmail.com', 'wecop'); 
             
            // Add a recipient 
            $mail->addAddress($email); 
            
            // Email subject 
            $mail->Subject = 'You are successfully Register in our Application.'; 
             
            // Set email format to HTML 
            $mail->isHTML(true); 
             
            // Email body content 
            $mail->Body = "<h2> Login Details </h2>
            <p>Dear $name</p>
            <p>Username : $username</p>
            <p>Password : $password</p>

            <h2>Thank You - Team WeCop - To Protect and To Serve</h2>
            "; 
            // Send email 
            if(!$mail->send()){ 
              echo "mail not send";
            }else{ 
              echo "Mail Send";
              // echo "<script>window.location='OTPverification.php?id=$id'</script>";
            }
          }

        }
      else
      {
        ?>
          <div class="alert alert-danger" role="alert">
            Invalid Email ID ! Please Check Again !
          </div>
          <?php
      }
}
                      
?>