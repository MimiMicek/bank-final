<?php require_once 'top.php';


/*    if(isset($_POST['regButton'])) {
        echo '<script>   
                 $(document).ready(function () {
                        $("#hideRegister").click(function () {
                            $("#logForm").hide();
                            $("#regForm").show();
                
                        })
                    });
                </script>';
  }else{
        '<script>   
             $(document).ready(function () {
                    $("#hideRegister").click(function () {
                        $("#logForm").show();
                        $("#regForm").hide();
            
                    })
                });
            </script>';
    }*/
?>

<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">

            <form id="logForm" action="apis/api-login.php" method="POST">
                <h2>Log in</h2>
                <p >
                    <label for="logEmail">Email</label>
                    <input id="logEmail" name="logEmail" type="email" required>
                </p>
                <p>
                    <label for="logPassword">Password</label>
                    <input id="logPassword" name="logPassword" type="password" minlength="4" maxlength="30" required>
                </p>
                <p>
                    <button type="submit" name="logButton">Log in</button>
                    <div class="hasAccount">
                      <span id="hideLogin">If you do not have an account please click here to Register</span>
                    </div>
                </p>
            </form>


            <form id="regForm" action="apis/api-register.php" method="POST">
                <h2>Register</h2>
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
                    <div class="hasAccount">
                        <span id="hideRegister">If you already have an account please click here to Log in</span>
                    </div>
                </p>
            </form>
        </div>
        <div id="loginText">
            <h1>Welcome to Central Bank</h1>
            <h2>Making a Difference to Those Who Make a Difference.</h2>
            <ul>
                <li>Make it easy</li>
                <li>Here for You, every Day</li>
                <li>Fund Your Future</li>
                <li>Expect More</li>
            </ul>
        </div>
    </div>
</div>

<?php require_once 'bottom.php';?>

