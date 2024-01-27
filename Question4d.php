<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    // Execute the query and check if the user exists
?>

SELECT * FROM users WHERE username='anyusername' AND password='' OR '1'='1' --'
