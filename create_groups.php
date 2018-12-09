<!--/**-->
<!--* Open Source Programming - CPAN-204 - Project 2-->
<!--* Group: Fuchun Chai - N01210879-->
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
    $resultDates = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
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
        $resultDate = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
        $rowDate = mysqli_fetch_assoc($resultDate);
        // Search the "Interest" table for the interestID obtained from the userAccount and return the "description"
        $query = "SELECT description FROM interest WHERE interestID = '$row[interestID]'";
        $resultInterest = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
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
    <title>XYZ Company - Create Group</title>

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
    function assignGroup()
    {
        //get information
        $interestID = $_POST['interestID'];
        $dateID = $_POST['dateID'];
        $groupSize = $_POST['groupSize'];
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "xyztravelagency";
        $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
        or die("Failed to connect.");
        //get current groupID
        $queryMaxGroup = "SELECT MAX(groupID) FROM USERACCOUNT";
        $resultMaxGroup = mysqli_query($con, $queryMaxGroup) or die("Failed to get group number" . mysqli_error($con));
        $maxGroup = mysqli_fetch_row($resultMaxGroup);
        if ($maxGroup[0] == '') {
            $maxGroup = 1;
        } else {
            $maxGroup = $maxGroup[0] + 1;
        }
        //select qulified user
        $query = "SELECT registrationid FROM USERACCOUNT
                WHERE interestID='$interestID' AND dateID='$dateID' AND groupID=''";
        $result = mysqli_query($con, $query) or die("Select Error" . mysqli_error($con));
        //get the number of same interest & date
        $interestNum = mysqli_num_rows($result);
        //select qualified user again for group
        $query = "SELECT registrationid FROM USERACCOUNT
                WHERE interestID='$interestID' AND dateID='$dateID' AND groupID=''";
        $result = mysqli_query($con, $query) or die("Select Error" . mysqli_error($con));
        //if the group size > exist user
        if ($interestNum < $groupSize) {
            // sol1: divide into group even without enough people
//            echo 'The number of people who has the same interest on the same day is: ' . $interestNum;
//            while ($row = mysqli_fetch_array($result)) {
//                $querySetGroup = "UPDATE useraccount SET groupID=$maxGroup WHERE registrationId='$row[0]'";
//                $resultSetGroup = mysqli_query($con, $querySetGroup) or die("Assign Error" . mysqli_error($con));
//            }
            //sol2: the user won't be assigned to group
            while ($row = mysqli_fetch_array($result)) {
                echo $row[0] . ", this person has not been put into group yet, becuase there are not enough people."
                    . "<br>";
            }
            echo "There are $interestNum people have the same interest on the same day. Please adjust group size or wait
                    for more people to join!";
            //if the group size < exist user
        } else {
            $groupNum = ceil($interestNum / $groupSize);
            $singleSize=0;//the of people the group has now
            $groupsHave=1;//the group have now
            while ($row = mysqli_fetch_array($result)) {
                //assign the first group
                if ($singleSize<$groupSize) {
                    $querySetGroup = "UPDATE useraccount SET groupID=$maxGroup WHERE registrationId='$row[0]'";
                    $resultSetGroup = mysqli_query($con, $querySetGroup) or die("Assign Error" . mysqli_error($con));
                    $singleSize++;
                }
                //right now: singleSize = groupSize
                //first group finished, then should assign the second group
                else {
                    $groupsHave++;
                    //for leftover
                    if ($groupsHave<$groupNum){
                        $singleSize=0;
                        $maxGroup++;
                        $querySetGroup = "UPDATE useraccount SET groupID=$maxGroup WHERE registrationId='$row[0]'";
                        $resultSetGroup = mysqli_query($con, $querySetGroup) or die("Assign Error" . mysqli_error($con));
                        $singleSize++;
                    }else{//for leftover
                        echo
                            $row[0] . " , this people have not been put into group. 
                                            Please adjust group size or wait for more people to join!" . "<br>";
                    }
                }
            }
        }
    }
    if (isset($_POST['submit'])) {
        echo 'group size: ' . $_POST['groupSize'] . '<br>';
        assignGroup();
        echo "<br>" . "Please refresh the page to see the assigned result.";
//        echo "<script> location.href='create_groups.php'; </script>";
//        exit;
    }
    echo '</div>    
    ';
} else {
    // User not authorized to access this web page. Redirect to login page
    header("location:index.php");
}
?>