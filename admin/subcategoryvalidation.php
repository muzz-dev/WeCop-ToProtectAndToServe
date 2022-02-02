<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_subcategory where subcat_name='".$_POST["subcategoryname"]."'");
if(mysqli_num_rows($result)<=0)
{
	echo "no";
}
else
{
	echo "yes";
}
?>