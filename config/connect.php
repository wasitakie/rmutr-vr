<?php

$localhost = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'rmutr_cal';

$con = new PDO("mysql:host=$localhost;dbname=$db", $user, $pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->exec("set names utf8");


// if ($con) {
//     echo "no";
// } else {
//     echo "yes";
// }
