<?php 
//include header file and classes
use App\Services\Session;
use App\Services\User;
// include "inc/header.php";


//create a database object
Session::checkLogin();
$db = new User();

// check if submit button is clicked
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    // call userLogin function
    $userLogin = $db->userLogin($_POST);
}

?>
<!-- login form design start  -->
<div class="d-flex justify-content-center align-items-center vh-80 bg-light">
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white text-center py-4">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body p-4">
                <?php 
                    if(isset($userLogin)){
                        echo $userLogin;
                    }
                ?>
                <form action="login.php" method="POST">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                    <div class="form-group d-grid gap-2">
                        <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center py-3">
                <small class="text-muted">Don't have an account? <a href="register.php" class="text-primary">Sign up</a></small>
            </div>
        </div>
    </div>
</div>

<!-- login form design end  -->
<?php include 'inc/footer.php'; ?>
