<?php
$con = mysqli_connect("localhost","root","","car_inventory");
function make_where( $data )
{
	global $con;
	$count = 0;
	$where = '';

	foreach($data as $col => $val)
	{
	  if ($count++ != 0){ $where .= ' AND '; }
	  $col = mysqli_real_escape_string($con, $col);
	  $where .= "`$col` = \"$val\"";
	}

	return $where;
}

function make_insert_query( $tablename, $data )
{
	global $con;
	$count = 0;
	$fields = '';
	$cols = '';
	$vals = '';

	foreach($data as $col => $val) {
	  if ($count++ != 0){  $fields .= ', '; $cols .= ', '; $vals .= ', '; }
	  $col = mysqli_real_escape_string($con, $col);
	  $val = is_bool($val) ? ( $val ? 1 : 0 ) : mysqli_real_escape_string($con, $val);
	  $cols .= "`$col`";
	  $vals .= "\"$val\"";
	}

	return "INSERT INTO `$tablename` ($cols) VALUES ($vals)";
}

function make_update_query( $tablename, $data, $where_data )
{
	global $con;
	$count = 0;
	$fields = '';
	$where = '';

	foreach($data as $col => $val)
	{
	  if ($count++ != 0){  $fields .= ', '; }
	  $col = mysqli_real_escape_string($con, $col);
	  $val = is_bool($val) ? ( $val ? 1 : 0 ) : mysqli_real_escape_string($con, $val);
	  $fields .= "`$col` = \"$val\"";
	}

	$count = 0;
	foreach($where_data as $col => $val)
	{
	  if ($count++ != 0){ $where .= ' AND '; }
	  $col = mysqli_real_escape_string($con, $col);
	  $where .= "`$col` = \"$val\"";
	}

	return "UPDATE `$tablename` SET $fields WHERE $where";
}