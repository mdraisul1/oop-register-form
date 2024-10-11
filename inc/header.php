<?php
    include_once 'lib/Session.php';
    Session::init();

    // check if logout button is clicked
    if(isset($_GET['action']) && $_GET['action'] == 'logout'){
        Session::destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap css cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- bootstrap js cdn link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="#">Logo</a>
            </div>
            <div class="container-fluid"></div>
                <ul class="navbar-nav">
                    
                    <?php 
                        $id = Session::get('id');
                        $userLogin = Session::get('login');
                        if($userLogin == true){
                            echo '
                            <li>
                                <a href="index.php" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php?id='.$id.'" class="nav-link">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="?action=logout" class="nav-link">Logout</a>
                            </li>';
                        }else{
                            echo '
                            <li class="nav-item">
                                <a href="login.php" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="register.php" class="nav-link">Register</a>
                            </li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>