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
    <title>XYZ Company - Create Guest Account</title>

</head>
<body>

<?php

session_start();
if (isset($_SESSION['admin'])) {
    $_SESSION["admin"] = 1;


echo '
<div class="container">

    <div class="jumbotron bg-success">
        <div class="text-right">
            <a href="logout.php"><img class="img-thumbnail img-fluid" src="img/logout.png" style="background-color: lightgreen; height: 6vh"></a>
        </div>
        
        <h1 class="text-center">Administrator Account Options</h1>
    </div>
    

    
    <div class="jumbotron bg-secondary row align-content-center">
        <!-- Search for user -->
        <div class="col text-center img-thumbnail">
            <a href="search_user.php"><img alt="Search user" class="img-fluid img-thumbnail" src="img/SearchUser.png" style="height: 25vh;"></a>
            <a href="search_user.php"><p><b>Search User Accounts</b></p></a>
        </div>
        
        <!-- Create Groups -->
        <div class="col text-center img-thumbnail">
            <a href="create_groups.php"><img alt="Create Groups" class="img-fluid" src="img/newUser.jpg" style="height: 25vh;"></a>
            <a href="create_groups.php"><p cl><b>Create Groups</b></p></a>
        </div>

      
    </div>
</div>

';
} else {
    // User not authorized to access this web page. Redirect to login page

    header("location:index.php");
}
 ?>
</body>
</html>
