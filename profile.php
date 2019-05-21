<?php

require_once 'top.php';
require_once 'header.php';
require_once __DIR__.'/connect.php';

ini_set('display_errors', 0);

session_start();

if(!isset($_SESSION['sUserId'])){
    header('Location: register');
}

$userId = $_SESSION['sUserId'];

try{
    //TODO fetching all users details
   $stmt = $db->prepare('SELECT * FROM users WHERE id=:userId');

    $stmt->bindValue(':userId', $userId);

    $stmt->execute();

    $aRows = $stmt->fetchAll();

    if(count($aRows) == 0){
        echo 'Sorry no users found!';
    }

} catch (PDOException $ex) {
    echo $ex;
}
?>

<div id="userContainer" class="container">
    <div class="row">
        <div id="userDetailsContainer" class="col-6">
            <form id="profile" action="apis/api-delete-profile.php" method="POST">
                <h2 class="headline">Profile</h2>
                <p>
                    <label for="fullName">Full name</label>
                    <span id="fullName">
                        <?php
                            foreach ($aRows as $aRow){
                              echo $aRow->first_name.' '.$aRow->last_name ;
                            }
                            ?>
                    </span>
                </p>
                <p>
                    <label for="address">Address</label>
                    <span id="address">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->address;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="city">City</label>
                    <span id="city">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->city;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="postalCode">Postal code</label>
                    <span id="postalCode">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->postal_code;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="cpr">Cpr</label>
                    <span id="cpr">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->cpr;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="phone">Phone</label>
                    <span id="phone">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->phone;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="email">Email</label>
                    <span id="email">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->email;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <label for="password">Password</label>
                    <span id="password">
                        <?php
                            foreach ($aRows as $aRow){
                                echo $aRow->password;
                            }
                        ?>
                    </span>
                </p>
                <p>
                    <button class="btn btn-warning" type="submit" name="deleteButton">Delete</button>
                </p>
            </form>
        </div>
    </div>
</div>