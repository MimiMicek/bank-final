<?php

require_once __DIR__.'/../connect.php';

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$email = $_SESSION['sUserId'];
$chosenOption = $_POST['chosenOption'];

//TODO Pass user_id from the users table
//TODO Create a Container with overview of the accounts and the button and dropdown to create a new account
//TODO Create a new INSERT into accounts table and hook up user_id with user_fk
//TODO SELECT account_name, balance FROM accounts
//TODO Show it in the frontend

try{
    $stmt = $db->prepare( "SELECT id FROM users WHERE email=:email" );

    $stmt->bindValue(':email', $email );

    $stmt->execute();

    $aRows = $stmt->fetchAll();

 /*   if( count($aRows) == 0 ){
        echo 'Sorry, no id found!';
        exit;
    }*/

    foreach($aRows as $aRow){
        $userId = "<div>$aRow->id<div>";
    }

    echo 'Success';
}catch( PDOEXception $ex ){
    echo $ex;
}

//TODO check if account is already in the database
try{
    $stmt = $db->prepare('INSERT INTO accounts
                VALUES(null,:accountName, 0.00, :userId)');

    $stmt->bindValue(':accountName', $chosenOption);
    $stmt->bindValue(':userId', $aRow->id);

    $stmt->execute();

/*    if( count($aRows) > 0 ){
        echo 'Sorry, you already have this type of account!';
        exit;
    }*/

}catch( PDOEXception $ex ){
    echo $ex;
}
