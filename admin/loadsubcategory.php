<option value="">Please Select Sub Category</option>
<?php
include 'connection.php';
$cid=$_POST["cid"];
$result=mysqli_query($conn,"select * from tbl_subcategory where cat_id='".$cid."' ORDER BY subcat_name") or die(mysqli_error($conn));

while($row=mysqli_fetch_assoc($result))
{
	?>
	  <option value="<?php echo $row["subcat_id"]; ?>"><?php echo $row["subcat_name"]; ?></option>
	<?php
}

?>