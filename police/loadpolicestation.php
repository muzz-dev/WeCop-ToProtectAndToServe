<option value="">Please Select Police Station</option>
<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_policestation where zone_id='".$_POST["zid"]."'") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["policestation_id"]; ?>"><?php echo $row["policestation_name"]; ?></option>
	<?php
}

?>