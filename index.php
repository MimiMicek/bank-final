<?php

require_once 'header.php';

ini_set('display_errors', 0);

//TODO session destory when logging out
session_start();
//session_destroy(); when click on logout
if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$email = $_SESSION['sUserId'];

echo 'XXXX';