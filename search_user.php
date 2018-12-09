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
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
    echo "<table border='1' >";
    echo "<tr>
            <th>Email</th>
            <th>RegistrationID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Interest</th>
            <th>GroupID</th>
            <th>Interest Date</th>
          </tr>";
    while (($row = mysqli_fetch_assoc($result)) == true) {
        echo "<tr>
                <td>$row[email]</td>
                <td>$row[registrationID]</td>
                <td>$row[name]</td>
                <td>$row[address]</td>
                <td>$row[phone]</td>
                <td>$row[interestID]</td>
                <td>$row[groupID]</td>
                <td>$row[dateID]</td>
              </tr>";
    }
    echo "</table>";
    mysqli_close($con);
}

//function to search informaiton
function showInfo($column, $info)
{
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "xyztravelagency";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
    or die("Failed to connect.");
    $query = "Select * from useraccount where `$column` LIKE '%$info%'";
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));

    if ($result == true) {
        echo "<table border='1' >";
        echo "<tr>
            <th>Email</th>
            <th>RegistrationID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Interest</th>
            <th>GroupID</th>
            <th>Interest Date</th>
              </tr>";
        while (($row = mysqli_fetch_assoc($result)) == true) {
            echo '<tr>
                <td>'.$row[email].'</td>
                <td>'.$row[registrationID].'</td>
                <td>'.$row[name].'</td>
                <td>'.$row[address].'</td>
                <td>'.$row[phone].'</td>
                <td>'.$row[interestID].'</td>
                <td>'.$row[groupID].'</td>
                <td>'.$row[dateID].'</td>
                  </tr>';
        }
        echo "</table>";
    }
    mysqli_close($con);
}

function searchUser()
{
//User can enter any one piece of information and search in databse
    if (isset($_POST['FIND'])) {
        $email = htmlspecialchars($_POST["email"]);
        $registrationID = htmlspecialchars($_POST["registrationID"]);
        $name = htmlspecialchars($_POST["name"]);
        $address = htmlspecialchars($_POST["address"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $interest = htmlspecialchars($_POST["interest"]);
        $groupID = htmlspecialchars($_POST["groupID"]);
        $date = htmlspecialchars($_POST["date"]);

        if (!empty($email)) {
            showInfo("email", $email);
        } else {
            if (!empty($registrationID)) {
                showInfo("registrationID", $registrationID);
            } else {
                if (!empty($name)) {
                    showInfo("name", $name);
                } else {
                    if (!empty($address)) {
                        showInfo("address", $address);
                    } else {
                        if (!empty($phone)) {
                            showInfo("phone", $phone);
                        } else {
                            if (!empty($interest)) {
                                showInfo("interestID", $interest);
                            } else {
                                if (!empty($groupID)) {
                                    showInfo("groupID", $groupID);
                                } else {
                                    if (!empty($date)) {
                                        showInfo("dateID", $date);
                                    } else
                                        echo "Record does not found.";
                                }
                            }

                        }
                    }
                }
            }
        }
    }
}

function updatePiece($fieldName, $newValue){
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "xyztravelagency";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) or die("Failed to Connect " . mysqli_error($con));
    $registrationID = htmlspecialchars($_POST["registrationID"]);



    if (!empty($newValue)){
        $query = "Update useraccount Set $fieldName = '$newValue' where registrationID ='$registrationID'";
        $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
        $number = mysqli_affected_rows($con);
        if ($number > 0)
            echo "$fieldName Updated Successfully to $newValue. <br>";

        else
            echo "$fieldName Failed to Update.";
    }
}

function update()
{
    $email = htmlspecialchars($_POST["email"]);
    $name = htmlspecialchars($_POST["name"]);
    $address = htmlspecialchars($_POST["address"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $interest = htmlspecialchars($_POST["interest"]);
    $groupID = htmlspecialchars($_POST["groupID"]);
    $date = htmlspecialchars($_POST["date"]);

    updatePiece("email", $email);
    updatePiece("name", $name);
    updatePiece("address", $address);
    updatePiece("phone", $phone);
    updatePiece("interestID", $interest);
    updatePiece("groupID", $groupID);
    updatePiece("dateID", $date);
}


function DeleteByRegistrationID()
{
    if (isset($_POST['DeleteByRegistrationID'])) {
        $registrationID = htmlspecialchars($_POST["registrationID"]);
        $dbHost = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "xyztravelagency";
        $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
        or die("Failed to connect.");
        $query = "DELETE FROM useraccount WHERE registrationID = '$registrationID'";
        $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
    }
}


?>
</body>
</html>

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
    <title>XYZ Company - Search User</title>

</head>
<body>
<?php
if (isset($_SESSION['admin'])) {
    $_SESSION["admin"] = 1;

    echo '

    <div class="jumbotron bg-secondary row">
        <div class="col text-left">
            <a href="admin_account_main.php">Return to the Previous Page</p></a>
        </div>
        <div class="col text-center">
            <h1>Search User Accounts</h1>
        </div>
        
        <div class="col text-right">
            <a href="logout.php"><img class="img-thumbnail img-fluid" src="img/logout.png" style="background-color: lightgreen; height: 6vh"></a>
        </div>
    </div>
    
    
    
        <form method="post">
            <p>
                <label>Email</label>
                <input type="text" name="email" value="';
    if (isset($email)) {
        echo $email;
    };
    echo '">
        </p>
        <p>
            <label>RegistrationID</label>
            <input type="text" name="registrationID" value="';
    if (isset($registrationID)) {
        echo $registrationID;
    };
    echo '">
        </p>
        <p>
            <label>Name</label>
            <input type="text" name="name" value="';
    if (isset($name)) {
        echo $name;
    };
    echo '">
        </p>
        <p>
            <label>Address</label>
            <input type="text" name="address" value="';
    if (isset($address)) {
        echo $address;
    };
    echo '">
        </p>
        <p>
            <label>Phone</label>
            <input type="text" name="phone" value="';
    if (isset($phone)) {
        echo $phone;
    };
    echo '">
        </p>
        <p>
            <label>Interest</label>
            <input type="text" name="interest" value="';
    if (isset($interest)) {
        echo $interest;
    };
    echo '">
        </p>
        </p>
        <p>
            <label>Group ID</label>
            <input type="text" name="groupID" value="';
    if (isset($groupID)) {
        echo $groupID;
    };
    echo '">
        </p>
        <p>
            <label>Date</label>
            <input type="text" name="date" value="';
    if (isset($date)) {
        echo $date;
    };
    echo '">
        </p>
        
        <p >
            <button type="submit" value="Find" name="FIND" />Find</button>
            <button type="submit" value="DeleteByRegistrationID" name="DeleteByRegistrationID" >Delete by RegistrationID</button>
            <button type="submit" value="update" name="Update" >Update by RegistrationID</button>
        </p>
    </form>';

    if (isset($msg)) {
        echo $msg;
    }

    if (isset($_POST["Update"])) {
        update();
    }

    if (isset($_POST["FIND"])) {
        searchUser();
    } else if (isset($_POST["DeleteByRegistrationID"])) {
        DeleteByRegistrationID();
        showCurrentUsers();
    } else {
        showCurrentUsers();
    }


} else {
    // User not authorized to access this web page. Redirect to login page

    header("location:index.php");
}
?>

</body>

</html>
