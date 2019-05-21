<?php

require_once __DIR__.'/../connect.php';

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];
$toAccount = $_POST['toAccount'];
$fromAccount = $_POST['fromAccount'];
$text = $_POST['text'];
$amount = $_POST['amount'];

/*echo  $userId;
print_r($_POST);*/


try{
    $stmt = $db->prepare( "SELECT * FROM accounts WHERE account_number=:toAccount 
                                    OR (account_number=:fromAccount AND user_id=:userId AND balance > :amount ) " );

    $stmt->bindValue(':toAccount', $toAccount );
    $stmt->bindValue(':fromAccount', $fromAccount );
    $stmt->bindValue(':userId', $userId );
    $stmt->bindValue(':amount', $amount );

    $stmt->execute();

    $aRows = $stmt->fetchAll();

/*    print_r($aRows);*/

    if( count($aRows) < 2 ){
        echo 'Sorry, no accounts found!'.__LINE__;
        exit;
    }


    $db->beginTransaction();
    $stmt = $db->prepare('UPDATE accounts SET balance = balance - :amount WHERE account_number = :fromAccount ');

    $stmt->bindValue(':fromAccount', $fromAccount );
    $stmt->bindValue(':amount', $amount );

    if(  !$stmt->execute() ){ // only works because the line PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, in the connect.php
                            // has been commented out
        echo 'Cannot update the user '.__LINE__;
        $db->rollBack();
        exit;
    }

    $stmt = $db->prepare('UPDATE accounts SET balance = balance + :amount WHERE account_number = :toAccount ');

    $stmt->bindValue(':toAccount', $toAccount );
    $stmt->bindValue(':amount', $amount );

    if(  !$stmt->execute() ){ // only works because the line PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, in the connect.php
        // has been commented out
        echo 'Cannot update the balance '.__LINE__;
        $db->rollBack();
        exit;
    }



    $stmt = $db->prepare('INSERT INTO transfers VALUES (null, :fromAccount, :toAccount, :amount, :text, null)');

    $stmt->bindValue(':fromAccount', $fromAccount );
    $stmt->bindValue(':toAccount', $toAccount );
    $stmt->bindValue(':amount', $amount );
    $stmt->bindValue(':text', $text );

    if(  !$stmt->execute() ){ // only works because the line PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, in the connect.php has been commented out
        echo 'Cannot transfer'.__LINE__;
        $db->rollBack();
        exit;
    }


    echo 'The money was successfully transfered!';
    $db->commit();


}catch( PDOEXception $ex ){
    echo $ex;
}