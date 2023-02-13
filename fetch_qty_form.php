<?php
include('conn.php');
$where = make_where($_POST);
$query = "SELECT * FROM `car_category` WHERE $where";
$result = mysqli_query($con, $query);

if( mysqli_num_rows( $result ) > 0 )
{
	$row = mysqli_fetch_assoc($result);
	$inv_id = $row['id'];
	
}
else
{
	$query = make_insert_query('car_category',$_POST);
	mysqli_query($con, $query);
	$inv_id = mysqli_insert_id($con);
	$month_array = [ 'jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec']; 
	foreach ($month_array as $month)
	{
		$query = make_insert_query('car_inv', ['month' => $month, 'year' => 23, 'quantity' => 0, 'inv_id' => $inv_id] );
		mysqli_query($con, $query);
	}
}

/// getting inventory from database
$query = "SELECT * FROM `car_inv` WHERE `inv_id` = $inv_id";
$result = mysqli_query($con, $query);
while ( $month = mysqli_fetch_assoc($result) )
{
	$months[] = [ 'name' => $month['month'], 'year' => $month['year'], 'quantity' => $month['quantity'] ]; 
}

//generating result
$html = '<tr>';
foreach ($months as $month)
{
	$html .= '<th>'.ucfirst($month['name']).' '.$month['year'].'</th>';
}
$html .= '</tr>';
$html .= '<tr>';
foreach ($months as $month)
{
	$html .= '<td><input type="number" class="form-control" name="month[]" value="'.$month['quantity'].'"></td>';
}
$html .= '</tr><input type="hidden" value="'.$inv_id.'" name="inv_id">';

die(json_encode(['status' => 'success', 'html' => $html ]));