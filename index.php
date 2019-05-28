<?php

require_once 'header.php';
require_once 'top.php';
require_once __DIR__.'/connect.php';

ini_set('display_errors', 0);

//TODO session destory when logging out
session_start();
//session_destroy(); when click on logout
if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$email = $_SESSION['sUserId'];



try{

    $stmt = $db->prepare("SELECT SUM(balance) AS sum FROM accounts WHERE user_id = :userId");

    $stmt->bindValue(':userId', $userId );

    $stmt->execute();

    $aRows = $stmt->fetchAll();

    if( count($aRows) == 0 ){
        echo 'Sorry, no balance found!';
        exit;
    }



} catch (PDOException $ex) {
    echo $ex;
}


?>
<div class="container">
    <div class="row">
        <h1>Start page</h1>
    </div>
    <br>
    <div class="row">
        <div class="col-6">
            <h4>Total balance</h4>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->sum</div>";

            }
            ?>
        </div>
    </div>
</div>
