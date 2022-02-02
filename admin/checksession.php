<?php
if($_SESSION["type"]!='admin' && $_SESSION["type"]!='subadmin')
{
	echo "<script>window.location='../police/error.php';</script>";
}
?>