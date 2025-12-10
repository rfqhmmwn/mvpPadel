<?php   

$db= new mysqli('localhost', 'root', '', 'padel');

if($db->connect_error)
{
    die("error");
}
?>