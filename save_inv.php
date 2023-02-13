<?php
include("conn.php");
$inv_id = $_POST['inv_id'];
unset($_POST['inv_id']);
$inv_id = 1;
$month_array = [ 'jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec']; 
$i = 0;
foreach ($_POST['month'] as $month)
{

	$data = ['quantity' => $month ];
	$query = make_update_query('car_inv', $data, ['month' => $month_array[$i], 'year' => 23, 'inv_id' => $inv_id] );
	mysqli_query($con, $query);
	$i++;
}
die(json_encode(['status'=>'success']));