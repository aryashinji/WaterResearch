<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) 
{
	$query ="SELECT * FROM lokasi WHERE alamat like '" . $_POST["keyword"] . "%' ORDER BY alamat";
	$result = $db_handle->runQuery($query);
	if(!empty($result)) 
	{?>
		<ul id="country-list"> 
		<?php foreach($result as $lokasi) 
		{?>
			<li onClick="selectAlamat('<?php echo $lokasi["alamat"]; ?>');"><?php echo $lokasi["alamat"]; ?></li> <?php 
		}?> 
		</ul> <?php 
	}
	else {?>
	<ul id="country-list"> 
		<li onClick="selectAlamat('<?php echo $lokasi["alamat"]; ?>');">rusak</li> <?php }
} ?>