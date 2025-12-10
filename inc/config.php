<?php   

$db= new mysqli('localhost', 'root', '', '');

if($db->connect_error)
{
    die("error");
}
?>