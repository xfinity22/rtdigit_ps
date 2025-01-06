<?php
	
	#CONNECTION######################################
	$provider = "localhost";
	$username = "root";
	$password = "ml@dmin";
	$database = "central_ad";
	#################################################
	
	#SITE SHORCUTS###################################	
	define("SITE_CSS", "css/");
	define("SITE_JS", "js/");
	define("SITE_IMAGE", "img/");
	define("SITE_PAGE", "pages/");
	define("SITE_FUNCTIONS", "functions/");
	define("SITE_INCLUDES", "includes/");
	#################################################
	
	#SITE TITLE######################################
	define("SITE_TITLE", "EID Globe Bill Converter");
	#################################################
	
	function getConnection($provider, $username, $password){
		$server_connect  = mysql_connect($provider, $username, $password) or die ("unable to connect with the server " .mysql_error());
		if($server_connect){
			return true;
		}else{
			return false;
		}
	}
	
	function getDatabase($database){
		$selectdatabase = mysql_select_db($database) or die ("Database was not found " .mysql_error());
		if($selectdatabase){
			return true;
		}else{
			return false;
		}
	}
	
	if(getConnection($provider, $username, $password)){
		if(getDatabase($database)){
			echo "";
		}else{	
			echo '<div style="text-align: center; color: red; font-size:14px;">Connection with the database is impossible to established.</div>';
		}
	}else{
		echo '<div style="text-align: center; color: red; font-size:14px;">The connection was not established</div>';
	}
?>