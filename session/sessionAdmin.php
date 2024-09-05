<?php
session_start();
if ($_SESSION["admin"] == "") {
    header("location:admin/index.php");
}
