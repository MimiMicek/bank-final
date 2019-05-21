<?php

require_once __DIR__.'/../connect.php';

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];
$chosenOption = $_POST['chosenOption'];
$accountNumber = mt_rand(1000, 9999);

try{
    //checking if user already has a checking or a savings account
    $stmt = $db->prepare( "SELECT * FROM accounts WHERE account_name=:accountName 
                        AND user_id=:userId" );

    $stmt->bindValue(':accountName', $chosenOption);
    $stmt->bindValue(':userId', $userId );

    $stmt->execute();

    $aRows = $stmt->fetchAll();

    if( count($aRows) > 0 ){
        echo 'Sorry, you already have this type of account!';
        exit;
    }
}catch( PDOEXception $ex ){
    echo $ex;
}


try{
    //inserting into accounts
    $stmt = $db->prepare('INSERT INTO accounts
                VALUES(null,:accountName, :accountNumber, 100.00, :userId)');

    $stmt->bindValue(':accountName', $chosenOption);
    $stmt->bindValue(':userId', $userId);
    $stmt->bindValue(':accountNumber', $accountNumber);

    $stmt->execute();

    echo 'Success! Account created!';
}catch( PDOEXception $ex ){
    echo $ex;
}
