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
function validate()
{
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "xyztravelagency";
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

<?php
if (isset($_SESSION["Create"])) {
    echo "Thank you for creating a new account. Please, Login now.";
}

?>
<head>
    <title>XYZ Travel Agency Log in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100">
            <form method="post" class="login100-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Customer Log in
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="email" name="email" placeholder="E-mail">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="number" name="registrationID" placeholder="Registration ID">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" value="Login" name="login" class="login100-form-btn">
                </div>

                <div class="text-center p-t-90" class="container-login100-form-btn">
                        <?php
                        validate();
                        ?>
                </div>

                <div class="text-center p-t-90" class="container-login100-form-btn">
                        Don't have a account? Register now!
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" value="Register" name="register" class="login100-form-btn">
                </div>

                <div class="text-center p-t-90" class="container-login100-form-btn">
                        Do you have a list of people to submit?
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" value="Submit File" name="submitFile" class="login100-form-btn">
                </div>

                <div class="text-center p-t-90" class="container-login100-form-btn">
                        Admin Account?
                </div>

                <div class="container-login100-form-btn">
                    <input type="submit" value="Log in" name="admin" class="login100-form-btn">
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="js/main.js"></script>


</html>


