<?php

try{

  $sUserName = 'root';//never be root user in real life
  $sPassword = '';
  $sConnection = "mysql:host=localhost; dbname=bank-final; charset=utf8mb4";
  
  $aOptions = array(
   /* PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,*/
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

  );
  $db = new PDO( $sConnection, $sUserName, $sPassword, $aOptions );
}catch( PDOException $e){
  echo $e;
  echo '{"status":0,"message":"cannot connect to database"}';
  exit();
}


