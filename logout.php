<?php
function __autoload($class)
{
    require_once "class/$class.php";
}

$pelanggan = new Pelanggan();
$pelanggan->logout();

// Redirect ke login 

header('location: home');