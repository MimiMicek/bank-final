<?php

require_once 'top.php';
require_once 'header.php';
require_once __DIR__.'/connect.php';

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$email = $_SESSION['sUserId'];
echo $email;

$stmt = $db->prepare('SELECT account_name, balance FROM accounts WHERE user_id=:userId');
$stmt->bindValue(':userId', $email);
$stmt->execute();
$aRows = $stmt->fetchAll();

if(count($aRows) == 0){
    echo 'Sorry no accounts found!';
    exit();
}

?>
<br>
<div class="container">
    <form action="apis/api-create-account.php" method="POST">
        <div class="input-group">
                <select name="chosenOption" class="custom-select" id="inputGroupSelect04">
                    <option selected>Choose...</option>
                    <option value="Checking">Checking</option>
                    <option value="Savings">Savings</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
        </div>
    </form>
    <br>
    <div class="row">
        <div class="col-6">

            <h5>Account</h5>
                <div>
                    <?php

                    foreach($aRows as $aRow){
                        echo "<div>$aRow->account_name</div>";
                    }

                    ?>
                </div>
        </div>
        <br>
        <br>
        <div class="col-6">

            <h5>Balance</h5>
            <div>
                <?php

                foreach($aRows as $aRow){
                    echo "<div>$aRow->balance</div>";

                }
                ?>
            </div>
        </div>
    </div>
</div>

