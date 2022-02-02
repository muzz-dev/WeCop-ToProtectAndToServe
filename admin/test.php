<?php
include 'connection.php';
include 'enc.php';
$id=$_GET["id"];

$result=mysqli_query($conn,"select * from tbl_notification where notification_id='".$id."'");
while($row=mysqli_fetch_assoc($result))
{
	$pagename=$row["notification_page"];
	$notification_pageid=$row["notification_pageid"];
	$mid=my_simple_crypt($notification_pageid,'e');
	if($pagename=='MissingPerson')
	{
		$pagename='missingprofileex.php';
	}
	elseif($pagename=='FIR')
	{
		$pagename='FIRprofile.php';
	}
	elseif($pagename=='Vehicle')
	{
		$pagename='viewvehicles.php';
	}
	echo "<script>window.location='$pagename?id=$mid'</script>";
}

?>