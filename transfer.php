<?php

require_once 'top.php';
require_once 'header.php';

echo 'Transfer';

?>

<form id="transferForm" action="apis/api-transfer.php" method="POST">
    <h2 class="headline">Transfer</h2>
    <p>

     <p>
        <label>To account</label>

        <input id="toAccount" name="toAccount" type="text" minlength="2" maxlength="50" required>
    </p>
    <p>
        <label>From account</label>

        <input id="fromAccount" name="fromAccount" type="text" minlength="2" maxlength="20" required>
    </p>
    <p>
        <label>Text</label>

        <input id="text" name="text" type="text" minlength="2" maxlength="20" required>
    </p>
    <p>
        <label>Amount</label>

        <input id="amount" name="amount" type="text" required>
    </p>
    <p>
        <button class="btn btn-success" type="submit" name="transferButton">Transfer</button>
    </p>
</form>
