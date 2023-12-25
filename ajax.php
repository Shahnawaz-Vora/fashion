<?php
include_once("db/connection.php");
if (isset($_POST['search'])) {
	$arry = [];
	$search = strtolower($_POST['search']);
	$string = preg_split("/\W+/", $search, -1, PREG_SPLIT_NO_EMPTY);
	$n = sizeof($string);

	for ($i=0; $i < $n; $i++) { 
	  $q = $string[$i];
	  $sql = mysqli_query($con, "SELECT product_name FROM product WHERE LOWER(product_name) LIKE '%$q%' ");
	  array_push($arry,mysqli_fetch_all($sql, MYSQLI_ASSOC));
	}
echo json_encode($arry[0]);
}
?>