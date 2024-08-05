<?php
session_start();

if ($_SESSION["idCode"] == "") {
    header("location: index.php");
}
