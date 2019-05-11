<?php

ini_set('display_errors', 0);

$sName = $_POST['regFName'] ?? '';
if(empty($sName)){ sendResponse(0, __LINE__); }
if(strlen($sName) < 4 ){ sendResponse(0, __LINE__); }
if(strlen($sName) > 20 ){ sendResponse(0, __LINE__); }

$sLastName = $_POST['regLName'] ?? '';
if(empty($sLastName)){ sendResponse(0, __LINE__); }
if(strlen($sLastName) < 4 ){ sendResponse(0, __LINE__); }
if(strlen($sLastName) > 20 ){ sendResponse(0, __LINE__); }

$sEmail = $_POST['regEmail'] ?? '';
if(empty($sEmail)){ sendResponse(0, __LINE__); }
if(!filter_var($sEmail, FILTER_VALIDATE_EMAIL)){
    sendResponse(0, __LINE__);
}

$sCpr = $_POST['regCpr'] ?? '';
if(empty($sCpr)){ sendResponse(0, __LINE__); }
if(strlen($sCpr) != 10){ sendResponse(0, __LINE__); }
if(!ctype_digit($sCpr)){ sendResponse(0, __LINE__); }

$sPhone = $_POST['regPhone'] ?? '';
if(empty($sPhone)){ sendResponse(0, __LINE__); }
if(strlen($sPhone) != 8){ sendResponse(0, __LINE__); }
if(intval($sPhone) < 10000000){ sendResponse(0, __LINE__); }
if(intval($sPhone) > 99999999){ sendResponse(0, __LINE__); }
if(!ctype_digit($sPhone)){ sendResponse(0, __LINE__);  }

$sPassword = $_POST['regPassword'] ?? '';
if(empty($sPassword)){ sendResponse(0, __LINE__); }
if(strlen($sPassword) < 4){ sendResponse(0, __LINE__); }
if(strlen($sPassword) > 20){ sendResponse(0, __LINE__); }

$sConfirmPassword = $_POST['regConfirmPassword'] ?? '';
if(empty($sConfirmPassword)){ sendResponse(0, __LINE__); }
if($sPassword != $sConfirmPassword){ sendResponse(0, __LINE__); }

$sData = file_get_contents('../data/clients.json');//opening the file
$jData = json_decode($sData);//decoding it from JSON string to object
if($jData == null){ sendResponse(0, __LINE__); }//checking if its corrupted


sendResponse(1, __LINE__);

function sendResponse($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.', "message":'.$sMessage.'}';
    exit;
}