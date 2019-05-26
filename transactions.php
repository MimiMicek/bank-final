<?php

require_once 'top.php';
require_once 'header.php';

require_once __DIR__.'/connect.php';

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];


try{
    $stmt = $db->prepare( "SELECT accounts.account_number, accounts.account_name AS account_name, 
                                    transfers.fromAccount_number, transfers.toAccount_number, transfers.amount, transfers.text, transfers.timestamp 
                                    FROM accounts 
                                    INNER JOIN transfers 
                                    ON accounts.account_number = transfers.fromAccount_number
                                    WHERE accounts.user_id = :userId" );
    $stmt->bindValue(':userId', $userId );
    $stmt->execute();
    $aRows = $stmt->fetchAll();

    if( count($aRows) == 0 ){
        echo 'Sorry, no transactions found!';
        exit;
    }

}catch( PDOEXception $ex ){
    echo $ex;
}

?>
<br>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <h5>Date and time</h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->timestamp</div>";
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
            <h5>To account </h5>
            <?php

            foreach($aRows as $aRow){
                echo "<div>$aRow->toAccount_number</div>";
            }

            ?>
        </div>
        <div class="col-sm">
            <h5>Account name </h5>
            <?php

             foreach($aRows as $aRow){
                    echo "<div>$aRow->account_name</div>";
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

    </div>
</div>
