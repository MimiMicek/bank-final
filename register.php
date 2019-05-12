<?php require_once 'top.php';?>
<div class="container-fluid">
    <h1>Log in</h1>
    <form id="logForm" action="apis/api-login.php" method="POST">
        <p>
            <label for="logEmail">Email</label>
            <input id="logEmail" name="logEmail" type="email" required>
        </p>
        <p>
            <label for="logPassword">Password</label>
            <input id="logPassword" name="logPassword" type="password" minlength="4" maxlength="30" required>
        </p>
        <p>
            <button type="submit" name="logButton">Log in</button>
        </p>
    </form>
</div>
<div class="container-fluid">
    <h1>Register</h1>
    <form id="regForm" action="apis/api-register.php" method="POST">
        <p>
            <label for="regFName">First name</label>
            <input id="regFName" name="regFName" type="text" minlength="2" maxlength="20" required>
        </p>
        <p>
            <label for="regLName">Last name</label>
            <input id="regLName" name="regLName" type="text" minlength="2" maxlength="20" required>
        </p>
        <p>
            <label for="regAddress">Address</label>
            <input id="regAddress" name="regAddress" type="text" minlength="2" maxlength="50" required>
        </p>
        <p>
            <label for="regCity">City</label>
            <input id="regCity" name="regCity" type="text" minlength="2" maxlength="20" required>
        </p>
        <p>
            <label for="regPostalCode">Postal code</label>
            <input id="regPostalCode" name="regPostalCode" type="text" minlength="2" maxlength="20" required>
        </p>
        <p>
            <label for="regCpr">Cpr number</label>
            <input id="regCpr" name="regCpr" type="text" minlength="10" maxlength="10" required>
        </p>
        <p>
            <label for="regPhone">Phone</label>
            <input id="regPhone" name="regPhone" type="tel" maxlength="8" required>
        </p>
        <p>
            <label for="regEmail">Email</label>
            <input id="regEmail" name="regEmail" type="email" required>
        </p>
        <p>
            <label for="regPassword">Password</label>
            <input id="regPassword" name="regPassword" type="password" minlength="4" maxlength="30" required>
        </p>
        <p>
            <label for="regConfirmPassword">Confirm password</label>
            <input id="regConfirmPassword" name="regConfirmPassword" type="password" minlength="4" maxlength="30" required>
        </p>
        <p>
            <button type="submit" name="regButton">Register</button>
        </p>
    </form>
</div>
<?php require_once 'bottom.php';?>

