<?php 
include 'inc/header.php';
include_once 'lib/User.php';
$db = new User();

// check if submit button is clicked
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $userRegister = $db->userRegister($_POST);
}

?>
<!-- register form design start -->
<div>
    <div class="d-flex justify-content-center align-items-center vh-80 bg-light">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h3 class="mb-0">Register</h3>
                </div>
                
                <div class="card-body p-4">
                    <form action="register.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="form-group d-grid gap-2">
                            <button type="submit" name="register" class="btn btn-success btn-block">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <small class="text-muted">Already have an account? <a href="#" class="text-primary">Login</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- register form design end -->
<?php include 'inc/footer.php'; ?>