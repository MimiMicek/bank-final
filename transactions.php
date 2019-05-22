<?php

require_once 'top.php';
require_once 'header.php';

require_once __DIR__.'/connect.php';

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];

try{
    $stmt = $db->prepare( "SELECT DISTINCT id, fromAccount_number, amount, text, timestamp FROM transfers WHERE :userId" );
    $stmt->bindValue(':userId', $userId );
    $stmt->execute();
    $aRows = $stmt->fetchAll();

    if( count($aRows) == 0 ){
        echo 'Sorry, no user with that credentials found!';
        exit;
    }

}catch( PDOEXception $ex ){
    echo $ex;
}

?>

<div class="container">
    <div class="row">
        <div class="col-sm">
           <h5>Transfer id </h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->id</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>From account </h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->fromAccount_number</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>Account name </h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->amount</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>Amount</h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->amount</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>Text </h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->text</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>Date and time</h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->timestamp</div>";
            }

            ?>
        </div>
    </div>
</div>
