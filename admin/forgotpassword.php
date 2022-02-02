<?php
include 'connection.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include'enc.php'; ?>

<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Forgot Password</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body class="sidebar-mini">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="" alt="">
              </div>

              <?php
                  if(isset($_POST["btnforgotpassword"]))
                  {
                      $res=mysqli_query($conn,"select * from tbl_admin_login where emailid='".$_POST["txtusername"]."'");
                      $otp=rand(1111,9999);
                      if(mysqli_num_rows($res)>0)
                      {
                          while($row=mysqli_fetch_assoc($res))
                          {
                            $name=$row["name"];
                            $username=$row["username"];
                            $password=$row["password"];
                            $id=my_simple_crypt($row["login_id"],'e');
                            
                            $res1=mysqli_query($conn,"update tbl_admin_login set otp='".$otp."' where login_id='".$row["login_id"]."'");
                          }
                        
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
                          $mail->addAddress($_POST["txtusername"]); 
                          
                          // Email subject 
                          $mail->Subject = 'Forgot Password'; 
                           
                          // Set email format to HTML 
                          $mail->isHTML(true); 
                           
                          // Email body content 
                          $mail->Body = "<h2> Forgot Password</h2>
                          <p>Dear $name</p>
                          <p>Your OTP is below </p>
                          <p><b>OTP : </b> $otp</p>
                          <h2>Thank You</h2>
                          "; 
                           
                          // Send email 
                          if(!$mail->send()){ 
                            echo "mail not send";
                          }else{ 
                            echo "Mail Send";
                            echo "<script>window.location='OTPverification.php?id=$id'</script>";
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
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail">Email Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="txtusername" class="form-control form-control-lg border-left-0" id="" placeholder="Email Address">
                  </div>
                </div>
                
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="window.location='OTPverification.php';" type="submit" name="btnforgotpassword" href="">FORGOT PASSWORD</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <img src="../wecop.png" alt="Logo">            
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.bootstrapdash.com/demo/boardsterui/template/demo/vertical-compact/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Dec 2020 04:25:56 GMT -->
</html>

