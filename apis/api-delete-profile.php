<?php

require_once __DIR__.'/../connect.php';

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];


try{

    $stmt = $db->prepare( "DELETE FROM users WHERE id=:userId" );
    $stmt->bindValue(':userId', $userId );
    $stmt->execute();
    
    if (  $stmt->rowCount() == 0){
        echo 'The user is not deleted';
    }



}catch( PDOEXception $ex ){
    echo $ex;
}
