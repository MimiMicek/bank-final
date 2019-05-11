<?php

ini_set('display_errors', 0);

$fName = $_POST['regFName'] ?? '';
if(empty($fName)){ sendResponse(0, __LINE__, "Please enter first name!"); }
if(strlen($fName) < 4 ){ sendResponse(0, __LINE__, "First name cannot be less than 4 characters!"); }
if(strlen($fName) > 20 ){ sendResponse(0, __LINE__, "First name cannot be longer than 20 characters!"); }

$lName = $_POST['regLName'] ?? '';
if(empty($lName)){ sendResponse(0, __LINE__, "Please enter last name!"); }
if(strlen($lName) < 4 ){ sendResponse(0, __LINE__, "Last name cannot be less than 4 characters!"); }
if(strlen($lName) > 20 ){ sendResponse(0, __LINE__, "Last name cannot be longer than 20 characters!"); }

$address = $_POST['regAddress'] ?? '';
if(empty($address)){ sendResponse(0, __LINE__, "Please enter address!"); }
if(strlen($address) < 4 ){ sendResponse(0, __LINE__, "Address cannot be less than 4 characters!"); }
if(strlen($address) > 50 ){ sendResponse(0, __LINE__, "Address cannot be longer than 50 characters!"); }

$city = $_POST['regCity'] ?? '';
if(empty($city)){ sendResponse(0, __LINE__, "Please enter city!"); }
if(strlen($city) < 4 ){ sendResponse(0, __LINE__, "City cannot be less than 4 characters!"); }
if(strlen($city) > 20 ){ sendResponse(0, __LINE__, "City cannot be longer than 20 characters!"); }

$postalCode = $_POST['regPostalCode'] ?? '';
if(empty($postalCode)){ sendResponse(0, __LINE__, "Please enter postal code!"); }
if(strlen($postalCode) < 4 ){ sendResponse(0, __LINE__, "Postal code cannot be less than 4 characters!"); }
if(strlen($postalCode) > 20 ){ sendResponse(0, __LINE__, "Postal code cannot be longer than 20 characters!"); }

$cpr = $_POST['regCpr'] ?? '';
if(empty($cpr)){ sendResponse(0, __LINE__, "Please enter Cpr number!"); }
if(strlen($cpr) != 10){ sendResponse(0, __LINE__, "Cpr number cannot be less than 10 characters!"); }
if(!ctype_digit($cpr)){ sendResponse(0, __LINE__, "Cpr number contains only numbers!"); }

$phone = $_POST['regPhone'] ?? '';
if(empty($phone)){ sendResponse(0, __LINE__, "Please enter phone number!"); }
if(strlen($phone) != 8){ sendResponse(0, __LINE__, "Phone number has to be 8 characters!"); }
if(intval($phone) < 10000000){ sendResponse(0, __LINE__, "Please enter a valid phone number!"); }
if(intval($phone) > 99999999){ sendResponse(0, __LINE__, "Please enter a valid phone number!"); }
if(!ctype_digit($phone)){ sendResponse(0, __LINE__, "Phone number contains only numbers!");  }

$email = $_POST['regEmail'] ?? '';
if(empty($email)){ sendResponse(0, __LINE__, "Please enter email!"); }
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    sendResponse(0, __LINE__, "Please enter a valid email!");
}

$password = $_POST['regPassword'] ?? '';
if(empty($password)){ sendResponse(0, __LINE__, "Please enter password!"); }
if(strlen($password) < 4){ sendResponse(0, __LINE__, "Passwords cannot be less than 4 characters!"); }
if(strlen($password) > 30){ sendResponse(0, __LINE__, "Passwords cannot be longer than 30 characters!"); }

$confirmPassword = $_POST['regConfirmPassword'] ?? '';
if(empty($confirmPassword)){ sendResponse(0, __LINE__, "Please enter confirm password!"); }
if($password != $confirmPassword){ sendResponse(0, __LINE__, "Passwords do not match!"); }

//TODO connect to the database at the top and do a query to insert data

sendResponse(1, __LINE__, "Successfully saved to the database!");

function sendResponse($bStatus, $iLineNumber, $sMessage){
    echo '{"status":'.$bStatus.', "code":'.$iLineNumber.', "message":'.$sMessage.'}';
    exit;
}