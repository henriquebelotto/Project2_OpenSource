<!--/**-->
<!--* Open Source Programming - CPAN-204 - Project 2-->
<!--* Group: Fuchun Chao - N01210879-->
<!--*        Henrique R Belotto - N01245990-->
<!--*/-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge"> <!-- edge compatible -->
    <link rel="stylesheet" class="card-link" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="script/jquery-3.2.1.js"></script>
    <script src="script/tether.js"></script>
    <script src="script/bootstrap.js"></script>
    <script type="text/javascript" src="script/javascript.js"></script>
    <title>XYZ Travel Agency - Create Customer Account</title>
    <?php
    session_start();

    $registrationID = "";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['name'])
            && !empty($_POST['phone']) && !empty($_POST['address'])) {

            // Declaring Server Variables
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "xyztravelagency";
            $con = mysqli_connect($host, $user, $password, $dbname)
            or die("Connection failed");

            $email = htmlspecialchars($_POST['email']);
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $interestID = htmlspecialchars($_POST['interestID']);
            $dateID = htmlspecialchars($_POST['dateID']);
            $groupID = "";


            // Create a new account

            // Auto-genereting a RegistrationID for the customer
            $registrationID = rand(1000, 9999);

            $query = "INSERT INTO `useraccount`(`email`, `registrationID`, `name`, `address`, `phone`, `interestID`,`groupID`,
                            `dateID`) 
                            VALUES ('$email','$registrationID','$name','$address','$phone','$interestID','$groupID','$dateID')";
            $result = mysqli_query($con, $query) or die("Sorry, we couldn't store your information" . mysqli_error($con));


            if ($result) {
                $_SESSION["Create"] = 1;
//                        header("location: index.php");
            } else {
                echo "Sorry, we could NOT create an account at this time";
            }

        }

    }

    function getInterests()
    {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "xyztravelagency";
        $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
        or die("Failed to connect.");
        $query = "SELECT * FROM interest";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='$row[interestID]'>$row[description]</option>";
            }
        }

    }

    function getDates()
    {
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "xyztravelagency";
        $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
        or die("Failed to connect.");
        $query = "SELECT * FROM date";
        $result = mysqli_query($con, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='$row[dateID]'>$row[date]</option>";
            }
        }
    }

    ?>
</head>
<body>

<div class="container">

    <div>
        <h1 class="jumbotron text-center bg-info">Create a new Customer Account</h1>
    </div>
    <div>
        <a href="index.php">Return to the Previous Page</p></a>
    </div>


    <div class="jumbotron bg-secondary">

        <div>
            <?php
                    if ($registrationID != "") {
                        print "<h5 class=\" jumbotrom bg-warning text-center\"><b>Your registration ID is: " . $registrationID .
                            " <br> You need this number to login in the website!</b></h5>";
                    }
                    ?>
        </div>

        <form method="post" action="">
            <div class="form-inline form-row justify-content-center form-group">

                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="email"><b>Email:</b></label>
                    <input class="form-control col-8" type="email" name="email" id="email" placeholder="Enter email">
                </div>

                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="name"><b>Name:</b></label>
                    <input class="form-control col-8" type="text" name="name" id="name"
                           placeholder="Enter your Name">
                </div>
            </div>

            <div class="form-inline form-row justify-content-center form-group">

                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="phone"><b>Phone:</b></label>
                    <input class="form-control col-8" type="text" name="phone" id="phone"
                           placeholder="Enter Phone">
                </div>

                <div class="form-group col-5">
                    <label class="col-form-label col-4" for="address"><b>Address:</b></label>
                    <input class="form-control col-8" type="text" name="address" id="address"
                           placeholder="Enter Address">
                </div>

            </div>

            <div class="form-inline form-row justify-content-center form-group">
                <div class="form-group col-5">

                    <label class="col-form-label col"><b>Interests Available:</b></label>
                    <select class="form-control" name="interestID">';

                        <?php
                        // Updating the drop-down list from the date table
                        getInterests();
                        ?>
                    </select>
                </div>
                <div class="form-group col-5">

                    <label class="col-form-label col"><b>Dates Available:</b></label>
                    <select class="form-control" name="dateID">

                        <?php
                        // Updating the drop-down list from the date table
                        getDates();
                        ?>

                    </select>
                </div>
            </div>

            <div class="form-group form-inline justify-content-center">
                <button class="btn btn-success mr-3" type="submit" value="submit" name="submit">Create Account
                </button>
                <button class="btn btn-danger" type="reset" value="reset">Clear</button>
            </div>

        </form>
    </div>


</div>


</body>
</html>
