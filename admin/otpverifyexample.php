<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Yummy Tummy Forgot Password</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>
	<?php
			mysql_connect("localhost","root","") or die("Can't Connect To Database");
			mysql_select_db("project") or die("Can't Found Database");

			// session start
			session_start();

            $errmsg="";
			
			if(isset($_REQUEST["btnverify"]))
			{

                $one=$_REQUEST["txt1"];
                $two=$_REQUEST["txt2"];
                $three=$_REQUEST["txt3"];
                $four=$_REQUEST["txt4"];
                $five=$_REQUEST["txt5"];
                $six=$_REQUEST["txt6"];
			   
                $otp=$one.$two.$three.$four.$five.$six;
                
                // $id=$_SESSION["tempcid"];
                // $str="select * from tbl_customer where Cust_Id='$id'";
                // $rs=mysql_query($str);
                // $res=mysql_fetch_array($rs);

                // $dbotp=$res["Cust_Otp"];
                // if($otp == $dbotp)
                // {
                //     header("location:trychangepwd.php");
                // }
                // else
                // {
                //     $errmsg="Incorrect OTP Please Try Again";
                // }
			}
	?>
	<!-- header -->
	<?php
		include("header.php");
	?>

    <!-- Login Form Start -->

    <div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Otp Verification</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Otp Verification</h2>
					</div>
				</div>
			</div>
            <form action="" method="post">
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
							<div class="row">
								<div class="col-md-6">
                                
									<h3>
                                    <!-- <img src="./password.png" alt="" width="45px" height="45px"> -->
                                    <i class="fas fa-badge-check"></i>
                                    &nbsp;Verify Your Otp:</h3>
									<div class="col-md-12">
										<div class="form-group" style="display:inline-flex;">
											<input type="password"  class="form-control" name="txt1" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;"/>
                                            <input type="password"  class="form-control" name="txt2" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;"/>
                                            <input type="password"  class="form-control" name="txt3" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;">
                                            <input type="password"  class="form-control" name="txt4" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;"/>
                                            <input type="password"  class="form-control" name="txt5" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;"/>
                                            <input type="password"  class="form-control" name="txt6" placeholder="*" minlength="1" maxlength="1" required data-error="Please enter your e-mail"  value="<?php if(isset($_REQUEST["txtotp"])) echo $_REQUEST["txtotp"]; ?>" style="width:45px;margin-right:10px; text-align:center; font-weight:bold; font-size:25px; color: transparent; text-shadow: 0 0 0 #000;"/>

                                            <br>
                                            <?php if(isset($errmsg) && !empty($errmsg)) {echo "<p class='alert alert-danger'>".$errmsg."</p>";} ?>
								            <?php if(isset($sucess) && !empty($sucess)) {echo "<p class='alert alert-success'>".$sucess."</p>";} ?>

											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									
                                    <!-- <h3><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Password:</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="password" class="form-control" name="txtpwd" placeholder="Enter Your Password"  required data-error="Please enter your password">
											<div class="help-block with-errors"></div>
											<br>
											<?php if(isset($errmsg) && !empty($errmsg)) {echo "<p class='alert alert-danger'>".$errmsg."</p>";} ?>
											<?php if(isset($erruser) && !empty($erruser)) {echo "<p class='alert alert-danger'>".$erruser."</p>";} ?>
										</div> 
									</div> -->
								</div>
                                
                                

								<div class="col-md-12">
									<div class="submit-button">
                                        &nbsp;&nbsp;&nbsp;
										<input type="submit" class="btn btn-common" name="btnverify" value="Verify">
									</div>
								</div>
							</div>            
					</div>
				</div>
			</div>
		</div>
        </form>
	</div>

    <!-- Login Form End -->

    <!-- footer -->
    <?php
		include("footer.php");
	?>
</body>
</html>