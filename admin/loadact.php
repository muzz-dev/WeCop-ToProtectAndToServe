<option value="">Please Select Act</option>
<?php
include 'connection.php';
$sid=$_POST["sid"];
$result=mysqli_query($conn,"select * from tbl_act where subcat_id='".$sid."' ORDER BY act_title") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["act_id"]; ?>"><?php echo $row["act_number"]; ?>-<?php echo $row["act_title"]; ?></option>
	<?php
}

?>