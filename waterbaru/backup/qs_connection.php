<?php
@session_start();
$host = "sql104.byethost7.com";
$db = "b7_16664377_water";
$user = "b7_16664377";
$passwd = "water1";
$link = @mysql_connect($host,$user,$passwd);
mysql_query( "SET NAMES utf8" ); 
$conn = $link;

mysql_connect("$host", "$user", "$passwd")or die("cannot connect");
mysql_select_db("$db")or die("cannot select DB");
/*
if ($_SESSION["SkipConnectMySQL"] == "") {
  if(!$link) {
   	print "Could not connect to the MySQL Host<br><br>Message(s):<br>" . mysql_error()  . "<br>";
   	exit ;
  }

  if(!@mysql_select_db($db)) {
	  print "Could not connect to the MySQL Database<br><br>Message(s):<br>" . mysql_error()  . "<br>";
	  exit ;
   }
}*/
?>
