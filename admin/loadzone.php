<option value="">Please Select Zone</option>
<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_zone where city_id='".$_POST["cid"]."' ORDER BY zone_name") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["zone_id"]; ?>"><?php echo $row["zone_name"]; ?></option>
	<?php
}

?>