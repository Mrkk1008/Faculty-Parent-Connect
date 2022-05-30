<?php

function checklogin()
{
	//session_start();
	if(!isset($_SESSION['adminok']))
		header("location: index.php");
}
?>
