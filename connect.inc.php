<?php

$host = "localhost";
$db = "wildcoas_wildcoast";
$user = "wildcoas_atemeli";
$pass = "H45%&45MdoTx$4";

$CONNECTION = @mysql_connect($host, $user, $pass);
$DATABASECONNECTION = @mysql_select_db($db) or die(mysql_error());// CONEXION A LA BASE DE DATOS

$COLOR_OUT1 = "#FFFFFF";
$COLOR_OUT2 = "#FFFFFF";
$COLOR_OVER = "#FAF8F0";		
$COLOR_MARCADO = "#cc9933";		
$SITE_NAME = "Wild Coast Costa Rica";
$SITE_FROM = "info@wildcoastcostarica.com";
$SITE_URL = "http://www.wildcoastcostarica.com";

/*
$CONNECTION = mysql_connect($host,$user,$pass); 
$DATABASECONNECTION = mysql_select_db($db)OR die(mysql_error());

//var_dump($CONNECTION);die();

$COLOR_OUT1 = "#FFFFFF";
$COLOR_OUT2 = "#FFFFFF";
$COLOR_OVER = "#FAF8F0";		
$COLOR_MARCADO = "#cc9933";		
$SITE_NAME = "Wild Coast Costa Rica";
$SITE_FROM = "info@wildcoastcostarica.com";
$SITE_URL = "http://www.wildcoastcostarica.com";

	$conn = mysqli_connect($host,$user,$pass,$db);
	//var_dump($conn);die();

	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
*/


	
	function urls_amigables($url) {
	
	// Tranformamos todo a minusculas
	
	$url = trim($url);
	$url = strtolower($url);
	
	//Rememplazamos caracteres especiales latinos
	
	$find = array('�', '�', '�', '�', '�', '�','�','�','�','�','�','&Aacute;','&Eacute;','&Iacute;','&Oacute;','&Uacute;','&aacute;','&eacute;','&iacute;','&oacute;','&uacute;');
	
	$repl = array('a', 'e', 'i', 'o', 'u', 'n','a','e','i','o','u','a','e','i','o','u','a','e','i','o','u');
	
	$url = str_replace ($find, $repl, $url);
	
	// A�aadimos los guiones
	
	$find = array(' ', '&', '\r\n', '\n', '+');
	$url = str_replace ($find, '-', $url);
	
	// Eliminamos y Reemplazamos dem�s caracteres especiales
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	
	$repl = array('', '-', '');
	
	$url = preg_replace ($find, $repl, $url);
	$url = trim($url);
	return $url;

}
	
?>