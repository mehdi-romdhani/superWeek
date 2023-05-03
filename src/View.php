<?php

// require_once 'vendor/autoload.php';
var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routeur : RegisterUser</title>
</head>
<body>
    <form  method="POST">
        <label for="firstname">first_name</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastname">last_name</label>
        <input type="text" name="lastname" id="lastname">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="submit" id="sub_form" value="Submit">
    </form>
</body>
</html>