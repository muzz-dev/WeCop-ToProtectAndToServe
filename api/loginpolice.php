<?php

include '../admin/connection.php';

$contact=$_POST["contact"];
$password=$_POST["password"];
$response=array();

$result=mysqli_query($conn,"select * from tbl_policestation_subuser where contact='".$contact."' and password='".$password."'");


if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["isverify"]=="Y")
			{
				mysqli_query($conn,"update tbl_policestation_subuser set token='".$_POST["token"]."' where p_userid='".$row["p_userid"]."'");
				$response["status"]="yes";
				$response["id"]=$row["p_userid"];
				$response["name"]=$row["pname"];
				$response["contact"]=$row["contact"];
				$response["email"]=$row["email"];
			}
			else
			{
				$otp=rand(1111,9999);
				mysqli_query($conn,"update tbl_policestation_subuser set otp='".$otp."' where p_userid='".$row["p_userid"]."'");
				$response["status"]="notverify";
				$response["id"]=(string)$row["p_userid"];
				$response["otp"]=(string)$otp;
                  
			}
		}
	}
	else
	{
		$response["status"]="no";	
	}

echo json_encode($response);
?>