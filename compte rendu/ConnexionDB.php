<?php
$servername="localhost";
$DBname="DB_Events";
$username="root";
$password="";
try
{
$db=new
PDO ("mysql:host=$servername; dbname=$DBname",$username,$password);
}
catch(PDOexception $e)
{die();}
?>