<option value="">Please Select City</option>
<?php
include 'connection.php';
$sid=$_POST["sid"];
$result=mysqli_query($conn,"select * from tbl_city where state_id='".$sid."' ORDER BY city_name") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["city_id"]; ?>"><?php echo $row["city_name"]; ?></option>
	<?php
}

?>