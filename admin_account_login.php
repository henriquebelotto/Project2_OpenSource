<?php
/**
 * Open Source Programming - CPAN-204 - Project 2
 * Group: Fuchun Chao - N01210879
 *        Henrique R Belotto - N01245990
 */
//start seesion to verify login
session_start();

//connection with database
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xyztravelagency";


//check login click
//validate informaiton
if (isset($_POST["login"])) {
    if (!empty($_POST["email"])) {
        if (!empty($_POST["password"])) {

            //check all fileds are filled
            $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
            or die("Failed to connect.");

            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $password = mysqli_real_escape_string($con, $_POST["password"]);

            //check login in information
            $queryLogin = "SELECT * FROM adminaccount WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($con, $queryLogin);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                //for non admin login
                $_SESSION["admin"] = 1;
                header('location:admin_account_main.php');
            } else {
                echo "Failed to Login";
            }
        } else {
            echo "Please enter your password.";
        }
    } else {
        echo "Please enter your username.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XYZ Travel Agency - Admin Account Log in</title>
</head>
<body>
<h1 style="text-align: left">Admin Account - Log in!</h1>

<div>
    <a href="index.php">Return to the Previous Page</p></a>
</div>

<form method="post">
    <p>
        E-mail:
        <input type="email" name="email">
    </p>
    <p>
        Password:
        <input type="password" name="password">
    </p>
    <p>
        <input type="submit" value="Login" name="login">
    </p>


</form>
</body>
</html>


