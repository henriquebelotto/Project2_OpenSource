<!--/**-->
<!--* Open Source Programming - CPAN-204 - Project 2-->
<!--* Group: Fuchun Chao - N01210879-->
<!--*        Henrique R Belotto - N01245990-->
<!--*/-->

<?php

session_start();

function showCurrentUsers()
{
//connect to database
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "xyztravelagency";
$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
or die("Failed to connect.");

//Retrieve All
$query = "Select * from useraccount";
$resultAccounts = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));

$query = "Select * from date";
$resultDates = mysqli_query($con,$query) or die ("query is failed. " . mysqli_error($con));



echo "<table class='table-striped table-bordered text-center table-hover'>";
    echo "<tr>
        <th>Name</th>
        <th>Email</th>
        <th>Registration ID</th>
        <th>Interest</th>
        <th>Date</th>
        <th>Group Assigned</th>      
    </tr>";
    while (($row = mysqli_fetch_assoc($resultAccounts)) == true) {

        // Search the "date" table for the dateID obtained from the userAccount and return the "date"
        $query = "SELECT date FROM date WHERE dateID = '$row[dateID]'";
        $resultDate = mysqli_query($con,$query) or die ("query is failed. " . mysqli_error($con));
        $rowDate = mysqli_fetch_assoc($resultDate);

        // Search the "Interest" table for the interestID obtained from the userAccount and return the "description"
        $query = "SELECT description FROM interest WHERE interestID = '$row[interestID]'";
        $resultInterest = mysqli_query($con,$query) or die ("query is failed. " . mysqli_error($con));
        $rowInterest = mysqli_fetch_assoc($resultInterest);
    echo "<tr>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[registrationID]</td>
        <td>$rowInterest[description]</td>
        <td>$rowDate[date]</td>
        <td>$row[groupID]</td>
    </tr>";
    }
    echo "</table>";
mysqli_close($con);
}

// function to get the interests from the database
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

// Function to get the dates from the database
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
    <title>XYZ Company - Create Guest Account</title>

</head>
<body>
<?php

if (isset($_SESSION['admin'])) {
    $_SESSION["admin"] = 1;

    echo '
<div class="container">
    <div class="jumbotron bg-secondary row">
        <div class="col text-left">
            <a href="admin_account_main.php">Return to the Previous Page</p></a>
        </div>
        <div class="col text-center">
            <h1>Create Groups</h1>
        </div>
        
        <div class="col text-right">
            <a href="logout.php"><img class="img-thumbnail img-fluid" src="img/logout.png" style="background-color: lightgreen; height: 6vh"></a>
        </div>
    </div>
    
    
    <div class="jumbotron bg-secondary text-center">
           <div class="mb-3">
                <h2 class="text-center">Current Users</h2>
           </div>

        <div class="row justify-content-center">
            <div class="col-8">';
            showCurrentUsers();
        echo '
            </div>
            <form method="post" class="col-4">            
                <div >
                    
                    <div class="form-group col">
    
                        <label class="col-form-label"><b>Interests Available:</b></label>
                        <select class="form-control" name="interestID">';

                            // Updating the drop-down list from the date table
                            getInterests();

                        echo '</select>
                    </div>
                    <div class="form-group col">
                        <label class="form-group col"><b>Dates Available:</b></label>
                        <select class="form-control" name="dateID">';

                            // Updating the drop-down list from the date table
                            getDates();

                    echo '</select>
                    </div>
    
                    <div class="form-group col">
                        <label class="form-group col" for="groupSize"><b>Group Size:</b></label>
                        <input type="number" name="groupSize" id="groupSize" min="1" max="99">
                    </div>
                    
                    <div>
                        <button class="btn-primary" type="submit" value="submit" name="submit">Create Group</button>
                    </div>
    
                </div>
            </form>
        </div>
    </div>';

        // CREATE HERE A FUNCTION TO LOOK FOR THE interestID and dateID on the userAccount according to the
        // selected interestID and dateID and then generate groups according to the group size
        // can be like group "interedID - dateID - 1"
        //                   "interedID - dateID - 2"
        // and goes on...
        // store these group numbers into the DB
        if(isset($_POST['submit'])){
            echo 'Interest:' . $_POST['interestID'] . '<br>';
            echo 'Date:' . $_POST['dateID'] . '<br>';
            echo 'group number: ' . $_POST['groupSize'] . '<br>';
        }
        
echo '</div>    
    ';




} else {
    // User not authorized to access this web page. Redirect to login page

    header("location:index.php");
}
 ?>



