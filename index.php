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
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link active">Profile</a></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- body content -->


        <!-- Remove the container if you want to extend the Footer to full width. -->
        <div class="container my-5">
            <footer class="text-center text-lg-start" style="background-color: #db6930;">
                <!-- Copyright -->
                <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2024 Copyright:
                    <a class="text-white" href="#">Login Register System</a>
                </div>
                <!-- Copyright -->
            </footer>   
        </div>
        <!-- End of .container -->

    </div>
</body>
</html>