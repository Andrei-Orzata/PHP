<?php
session_start();
if(!isset($_SESSION['logat'])){
    die(header("location: 404.php"));
}
$username=$_SESSION['username'];
echo "Welcome .$username."
?> 