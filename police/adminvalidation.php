<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_admin_login where username='".$_POST["username"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>