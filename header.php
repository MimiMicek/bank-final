<?php

require_once 'top.php';
require_once __DIR__.'/connect.php';

ini_set('display_errors', 0);

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];

try{
    //fetch email from user to show it in the header
    $stmt = $db->prepare('SELECT email FROM users WHERE id=:userId');

    $stmt->bindValue(':userId', $userId);

    $stmt->execute();

    $aRows = $stmt->fetchAll();

    if(count($aRows) == 0){
        echo 'Sorry no email found!';
    }

} catch (PDOException $ex) {
    echo $ex;
}

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index">Central Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="transfer">Transfer</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Accounts
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="accounts-overview">Accounts overview</a>
                    <a class="dropdown-item" href="transactions">Transactions</a>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav mr-0 mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="profile">
                    <?php
                          foreach ($aRows as $aRow){
                              echo $aRow->email;
                          }
                      ?>
                </a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mr-0 mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="apis/api-logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>