<?php
session_start();
include "../includes/connect.php";



if($_SESSION['i'] > 0)
{
	$_SESSION['i'] -= 3;
	if($_SESSION['sort'] == 1)
	{
		$selectQuery = "SELECT * FROM participants WHERE status = '1' ORDER BY name ASC LIMIT {$_SESSION['i']}, 3";
	}
	else
	{
		if ($_SESSION['sort'] == 2)
		{
			$selectQuery = "SELECT * FROM participants WHERE status = '1' ORDER BY votes DESC LIMIT {$_SESSION['i']}, 3";
		}
		else
		{
			$selectQuery = "SELECT * FROM participants WHERE status = '1' ORDER BY id DESC LIMIT {$_SESSION['i']}, 3";
		}
	}
	
	$query_result = mysql_query($selectQuery);
	$numrows = mysql_num_rows ($query_result);
	if ($numrows > 0)
	{
		while ($property = mysql_fetch_array($query_result))
		{
			include "gallery_design.php";
		}
	}
	else
	{
		$_SESSION['i'] = 0;
		echo '0';
	}
}
?>