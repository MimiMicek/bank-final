<?php

require_once __DIR__.'/../connect.php';

ini_set('display_errors', 0);

$email = $_POST['logEmail'] ?? '';
if(empty($email)){ sendResponse(0, __LINE__, "Please enter email!"); }
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    sendResponse(0, __LINE__, "Please enter a valid email!");
}

$password = $_POST['logPassword'] ?? '';
if(empty($password)){ sendResponse(0, __LINE__, "Please enter password!"); }
if(strlen($password) < 4){ sendResponse(0, __LINE__, "Passwords cannot be less than 4 characters!"); }
if(strlen($password) > 30){ sendResponse(0, __LINE__, "Passwords cannot be longer than 30 characters!"); }

try{
    $stmt = $db->prepare( "SELECT email FROM users WHERE email=:email AND password=:password" );
    $stmt->bindValue(':email', $email );
    $stmt->bindValue(':password', $password );
    $stmt->execute();
    $aRows = $stmt->fetchAll();

    if( count($aRows) == 0 ){
        echo 'Sorry, no user with that credentials found!';
        exit;
    }

}catch( PDOEXception $ex ){
    echo $ex;
}

//TODO verify hashed password
/*if (!password_verify($sPassword, $jInnerData->$sPhone->password)) {

}*/

session_start();
$_SESSION['sUserId'] = $email;
header("Location: ../index");
/*sendResponse(1, __LINE__, "Successfully logged in!");*/


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function sendResponse($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.', "message":'.$sMessage.'}';
    exit;
}