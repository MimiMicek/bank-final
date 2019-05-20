<?php

require_once 'top.php';
require_once 'header.php';

echo 'User profile';
?>

<form id="profile" action="apis/api-delete-profile.php" method="POST">
    <h2 class="headline">Profile</h2>
    <p>

    <p>
        <button class="btn btn-warning" type="submit" name="deleteButton">Delete</button>
    </p>
</form>