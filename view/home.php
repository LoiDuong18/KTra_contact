<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>
<?php
$user = unserialize($_SESSION["user"]);
if (isset($user))
    echo "Xin chào  " . $user->fullName;
else
    header("location:login.php");
?>