<?php
if($_SESSION["type"]=='admin')
{
	echo "<script>window.location='../admin/error.php';</script>";
}
?>