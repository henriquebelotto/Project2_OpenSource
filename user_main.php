<?php
/**
 * Created by PhpStorm.
 * User: fuchunchai
 * Date: 2018-12-08
 * Time: 18:17
 */
session_start();

if (isset($_SESSION['ticket'])) {
    //get user information
    $email = $_SESSION["email"];
    $registrationID = $_SESSION["registrationID"];

    //connect to database
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "xyztravelagency";
    $con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName)
    or die("Failed to connect.");

    //Retrieve All
    $query = "Select groupID from useraccount WHERE email= '$email' AND registrationID = '$registrationID'";
    $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    $groupID = $row['groupID'];
    if ($groupID=='') {
        echo "<h1>You request in under process. There is no group assigned yet.</h1>";
        $query = "Select U.email, U.name, U.phone, I.description, U.groupID, 
                  D.date from useraccount U 
                  JOIN date D ON U.dateID = D.dateID
                  JOIN interest I ON U.interestID = I.interestID
                  WHERE registrationID = '$registrationID'";
        $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));

        echo "<table border='1' >";
        echo "<tr>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Interest</th>
            <th>GroupID</th>
            <th>Interest Date</th>
          </tr>";
        while (($row = mysqli_fetch_array($result)) == true) {
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
              </tr>";
        }
        echo "</table>";

    } else {
        //get the name who will go together
        $query = "Select U.email, U.name, U.phone, I.description, U.groupID, 
                  D.date from useraccount U 
                  JOIN date D ON U.dateID = D.dateID
                  JOIN interest I ON U.interestID = I.interestID
                  WHERE groupID = '$groupID'";
        $result = mysqli_query($con, $query) or die ("query is failed. " . mysqli_error($con));

        echo "<table border='1' >";
        echo "<tr>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Interest</th>
            <th>GroupID</th>
            <th>Interest Date</th>
          </tr>";
        while (($row = mysqli_fetch_array($result)) == true) {
            echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td>
                <td>$row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]</td>
              </tr>";
        }
        echo "</table>";

    }

} else {
    header("location:index.php");
}
?>

<html>
<div>
    <br>
    <br>
    <a href="logout.php">Log out and Return to the Previous Page</p></a>
</div>
</html>
