<?php

require_once __DIR__.'/../connect.php';

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];
$chosenOption = $_POST['chosenOption'];

//TODO Pass user_id from the users table
//TODO Create a Container with overview of the accounts and the button and dropdown to create a new account
//TODO Create a new INSERT into accounts table and hook up user_id with user_fk
//TODO SELECT account_name, balance FROM accounts
//TODO Show it in the frontend


try{
    $stmt = $db->prepare( "SELECT * FROM accounts WHERE account_name=:accountName AND user_id=:userId" );
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


//TODO check if account is already in the database
try{
    $stmt = $db->prepare('INSERT INTO accounts
                VALUES(null,:accountName, 0.00, :userId)');

    $stmt->bindValue(':accountName', $chosenOption);
    $stmt->bindValue(':userId', $userId);

    $stmt->execute();


}catch( PDOEXception $ex ){
    echo $ex;
}
