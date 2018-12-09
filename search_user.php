<?php

session_start();

function showCurrentUsers()
{
    //connect to database
    $dbHost = "localhost";
    $dbUsername = "root";
    // APPLE MACHINES REQUIRES A PASSWORD, WHILE WINDOWS MACHINES DON'T
//    $dbPassword = "root";
    $dbPassword = "";
<<<<<<< HEAD
=======

>>>>>>> New
    $dbName = "xyztravelagency";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
    or die("Failed to connect.");

    //Retrieve All
    $query = "Select * from useraccount";
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
    echo "<table border='1' >";
    echo "<tr>
            <th>Username</th>
            <th>Password</th>
            <th>Employee ID</th>
            <th>Phone</th>
            <th>Email</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Address</th>
             <th>Account Type</th>
          </tr>";
    while (($row = mysqli_fetch_assoc($result)) == true) {
        echo "<tr>
                <td>$row[username]</td>
                <td>$row[password]</td>
                <td>$row[emp_id]</td>
                <td>$row[phone]</td>
                <td>$row[email]</td>
                <td>$row[firstname]</td>
                <td>$row[lastname]</td>
                <td>$row[address]</td>
                <td>$row[category_emp]</td>
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
    // APPLE MACHINES REQUIRES A PASSWORD, WHILE WINDOWS MACHINES DON'T
//    $dbPassword = "root";
    $dbPassword = "";
    $dbName = "xyzcompany";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
    or die("Failed to connect.");
    $query = "Select * from useraccounts where `$column` LIKE '%$info%'";
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));

    if ($result == true) {
        echo "<table border='1' >";
        echo "<tr>
                <th>Username</th>
                <th>Password</th>
                <th>Employee ID</th>
                <th>Phone</th>
                <th>Email</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>Address</th>
                <th>Account Type</th>
              </tr>";
        while (($row = mysqli_fetch_assoc($result)) == true) {
            echo '<tr>
                    <td>' . $row["username"] . '</td>
                    <td>' . $row["password"] . '</td>
                    <td>' . $row["emp_id"] . '</td>
                    <td>' . $row["phone"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["firstname"] . '</td>
                    <td>' . $row["lastname"] . '</td>
                    <td>' . $row["address"] . '</td>
                    <td>' . $row["category_emp"] . '</td>
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
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);
        $emp_id = htmlspecialchars($_POST["emp_id"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $email = htmlspecialchars($_POST["email"]);
        $firstname = htmlspecialchars($_POST["firstname"]);
        $lastname = htmlspecialchars($_POST["lastname"]);
        $address = htmlspecialchars($_POST["address"]);

        if (!empty($username)) {
            showInfo("username", $username);
        } else {
            if (!empty($password)) {
                showInfo("password", $password);
            } else {
                if (!empty($emp_id)) {
                    showInfo("emp_id", $emp_id);
                } else {
                    if (!empty($phone)) {
                        showInfo("phone", $phone);
                    } else {
                        if (!empty($email)) {
                            showInfo("email", $email);
                        } else {
                            if (!empty($firstname)) {
                                showInfo("firstname", $firstname);
                            } else {
                                if (!empty($lastname)) {
                                    showInfo("lastname", $lastname);
                                } else {
                                    if (!empty($address)) {
                                        showInfo("address", $address);
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

function update()
{
    $dbHost = "localhost";
    $dbUsername = "root";
    // APPLE MACHINES REQUIRES A PASSWORD, WHILE WINDOWS MACHINES DON'T
//    $dbPassword = "root";
    $dbPassword = "";
    $dbName = "xyzcompany";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName) or die("Failed to Connect " . mysqli_error($con));

    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $emp_id = htmlspecialchars($_POST["emp_id"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $address = htmlspecialchars($_POST["address"]);

    $query = "Update useraccounts Set password = '$password',
            emp_id = '$emp_id', phone = '$phone', firstname='$firstname', lastname='$lastname', address=$address where username ='$username'";
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
    $number = mysqli_affected_rows($con);
    if ($number > 0)
        echo "Record Updated Successfully.";

    else
        echo "Record Failed to Update.";

}


function deleteByUsername()
{
    if (isset($_POST['DeleteByUserName'])) {
        $username = htmlspecialchars($_POST["username"]);
        $dbHost = "localhost";
        $dbUsername = "root";
        // APPLE MACHINES REQUIRES A PASSWORD, WHILE WINDOWS MACHINES DON'T
        //$dbPassword = "root";
        $dbPassword = "";
        $dbName = "xyzcompany";
        $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
        or die("Failed to connect.");
        $query = "DELETE FROM useraccounts WHERE username = '$username'";
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
                <label>Username</label>
                <input type="text" name="username" value="';
    if (isset($username)) {
        echo $username;
    };
    echo '">
        </p>
        <p>
            <label>Password</label>
            <input type="text" name="password" value="';
    if (isset($password)) {
        echo $password;
    };
    echo '">
        </p>
        <p>
            <label>Employee ID</label>
            <input type="text" name="emp_id" value="';
    if (isset($emp_id)) {
        echo $emp_id;
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
            <label>Email</label>
            <input type="text" name="email" value="';
    if (isset($email)) {
        echo $email;
    };
    echo '">
        </p>
        <p>
            <label>FirstName</label>
            <input type="text" name="firstname" value="';
    if (isset($firstname)) {
        echo $firstname;
    };
    echo '">
        </p>
        </p>
        <p>
            <label>LastName</label>
            <input type="text" name="lastname" value="';
    if (isset($lastname)) {
        echo $lastname;
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
        
        <p >
            <button type="submit" value="Find" name="FIND" />Find</button>
            <button type="submit" value="DeleteByUserName" name="DeleteByUserName" >Delete by Username</button>
            <button type="submit" value="update" name="Update" >Update</button>
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
    } else if (isset($_POST["DeleteByUserName"])) {
        deleteByUsername();
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
