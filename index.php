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
        if (!empty($_POST["registrationID"])) {

            //check all fileds are filled
            $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
            or die("Failed to connect.");

            $email = mysqli_real_escape_string($con, $_POST["email"]);
            $registrationID = mysqli_real_escape_string($con, $_POST["registrationID"]);

            //check login in information
            $queryLogin = "SELECT * FROM useraccount WHERE email= '$email' AND registrationID = '$registrationID'";
            $result = mysqli_query($con, $queryLogin);
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                //for non admin login
                $_SESSION["ticket"] = 1;
                $_SESSION["email"] = $row["email"];
                $_SESSION["registrationID"] = $row["registrationID"];
                header('location:user_main.php');
            } else {
                echo "Failed to Login";
            }
        } else {
            echo "Please enter your Registration ID";
        }

    } else {
        echo "Please enter your email";
    }
}
//for register
if (isset($_POST["register"])) {
    header('location:create_customer_account.php');
}

if (isset($_POST["admin"])) {
    header('location:admin_account_login.php');
}

if (isset($_POST["submitFile"])) {
    header('location:processFile.py');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>XYZ Travel Agency Log in</title>
</head>
<body>
<h1 style="text-align: left">Customer? Please log in!</h1>

<?php
if (isset($_SESSION["Create"])) {
    echo "Thank you for creating a new account. Please, Login now.";
}

?>

<form method="post">
    <p>
        <label for="name"><b>E-mail:</b></label>
        <input type="email" name="email" id="name">
    </p>
    <p>
        <label for="registrationID"><b>Registration ID:</b></label>
        <input type="number" name="registrationID" id="registrationID">
    </p>
    <p>
        <input type="submit" value="Login" name="login">
    </p>
    <p>
        Don't have a account? Register now!<br>
        <input type="submit" value="Register" name="register">
    </p>

    <p>
        Do you have a list of people to submit?<br>
        <input type="submit" value="Submit File" name="submitFile">
    </p>
    <p>
        Admin Account?<br>
        <input type="submit" value="Log in" name="admin">
    </p>

</form>
</body>
</html>


