<?php

//fetch.php
$connect = mysqli_connect("localhost","root","","machine_test");

$query="SELECT * FROM products WHERE pincode =".$_POST["pincode"];
$fire = mysqli_query($connect,$query);
$total_row = mysqli_num_rows($fire);
$output = '<h4 align="center">Total Item - '.$total_row.'</h4><div class="row">';

if($total_row > 0)
{
	while($fetch=mysqli_fetch_array($fire,MYSQLI_BOTH))
	{
		$output .= '
		<div class="col-md-2">
			<img src="product/'.$fetch["product_img"].'" style="height:150px;width:150px;" />
			<h4 align="center">'.$fetch["product_name"].'</h4>
			<h3 align="center" class="text-danger">Price: '.$fetch["price"].'</h3>
			<br />
		</div>
		';
	}
}
else
{
	$output .= '
		<h3 align="center">No Product Found</h3>
	';
}
$output .= '
</div>
';

echo $output;

?>