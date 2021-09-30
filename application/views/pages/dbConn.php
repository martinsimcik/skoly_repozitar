<?php

$db = mysqli_connect("localhost","root","","skoly");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>