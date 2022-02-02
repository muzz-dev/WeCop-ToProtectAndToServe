<?php
include 'connection.php';

$id=$_POST["deleteids"];
foreach($id as $i)
{
	$result=mysqli_query($conn,"delete from tbl_em_number where em_id = $i")or die(mysqli_error($conn));
}
if($result)
{
	echo "yes";
}
else
{
	echo "no";
}
?>