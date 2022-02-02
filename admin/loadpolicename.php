<option value="">Please Select Police Name</option>
<?php
include 'connection.php';
$result=mysqli_query($conn,"select * from tbl_policestation_subuser where policestation_id='".$_POST["pid"]."'") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["p_userid"]; ?>"><?php echo $row["pname"]; ?></option>
	<?php
}

?>