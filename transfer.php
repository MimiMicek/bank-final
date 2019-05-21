<?php

require_once 'top.php';
require_once 'header.php';


?>
<div id="transferContainer" class="container">
    <div class="row">
        <div id="transferInputContainer" class="col-6">
            <form id="transferForm" action="apis/api-transfer.php" method="POST">
                <h2 class="headline">Transfer</h2>
                <p>
                    <label for="fromAccount">From account</label>
                    <input id="fromAccount" name="fromAccount" type="number" minlength="4" maxlength="4" min="0" required>
                </p>
                <p>
                    <label for="toAccount">To account</label>
                    <input id="toAccount" name="toAccount" type="number" minlength="4" maxlength="4" min="0" required>
                </p>
                <p>
                    <label for="text">Text</label>
                    <input id="text" name="text" type="text" minlength="2" maxlength="30" min="0" required>
                </p>
                <p>
                    <label for="amount">Amount</label>
                    <input id="amount" name="amount" type="number" min="0" required>
                </p>
                <p>
                    <button class="btn btn-success" type="submit" name="transferButton">Transfer</button>
                </p>
            </form>
        </div>
    </div>
</div>

