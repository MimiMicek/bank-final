<?php

require_once __DIR__.'/../connect.php';

ini_set('display_errors', 0);

$email = $_POST['regEmail'] ?? '';
if(empty($email)){ sendResponse(0, __LINE__, "Please enter email!"); }
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    sendResponse(0, __LINE__, "Please enter a valid email!");
}

$password = $_POST['regPassword'] ?? '';
if(empty($password)){ sendResponse(0, __LINE__, "Please enter password!"); }
if(strlen($password) < 4){ sendResponse(0, __LINE__, "Passwords cannot be less than 4 characters!"); }
if(strlen($password) > 30){ sendResponse(0, __LINE__, "Passwords cannot be longer than 30 characters!"); }

if ($jInnerData->$sPhone->iLoginAttemptsLeft == 0) {
    $iSecondsElapsedSinceLastLoginAttempt = $jInnerData->$sPhone->iLastLoginAttempt + 10 - time();
    if ($iSecondsElapsedSinceLastLoginAttempt <= 0) {
        if (!password_verify($sPassword, $jInnerData->$sPhone->password)) {
            echo "Wrong credentials. You have to wait again!";
            sendResponse(-1, __LINE__);
            exit;
        }
        $jInnerData->$sPhone->iLoginAttemptsLeft = 3;
        $jInnerData->$sPhone->iLastLoginAttempt = 0;
        $sData = json_encode($jData, JSON_PRETTY_PRINT);//encode string back to object
        if ($sData == null) {
            sendResponse(0, __LINE__);
        }//check if corrupted
        file_put_contents('../data/clients.json', $sData);//saving it back to the file
        echo 'You are logged in';
        exit;
    }
    echo "wait $iSecondsElapsedSinceLastLoginAttempt seconds to log in again";
    sendResponse(-2, __LINE__);
    exit;
}

if (!password_verify($sPassword, $jInnerData->$sPhone->password)) {
    $jInnerData->$sPhone->iLoginAttemptsLeft--;
    $jInnerData->$sPhone->iLastLoginAttempt = time();
    $sData = json_encode($jData, JSON_PRETTY_PRINT);
    if ($sData == null) {
        sendResponse(0, __LINE__);
    }
    file_put_contents('../data/clients.json', $sData);
    echo "Wrong credentials. You have {$jInnerData->$sPhone->iLoginAttemptsLeft} attempts left";
    exit;
}
/* if($sPassword != $jInnerData->$sPhone->password){
  sendResponse(0, __LINE__);
}*/

session_start();
$_SESSION['sUserId'] = $sPhone;
sendResponse(1, __LINE__);

function sendResponse($bStatus, $iLineNumber)
{
    echo '{"status":' . $bStatus . ', "code":' . $iLineNumber . '}';
    exit;
}
