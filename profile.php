<?php
    include 'inc/header.php';
    include_once 'lib/User.php';
    Session::checkSession();

    if(isset($_GET['id'])){
        $userId = (int)$_GET['id'];
    }
    $user = new User();

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
        $userUpdate = $user->userUpdate($_POST, $userId);
    }

    
?>

<div class="container w-50 mt-4">
    <?php 
        if(isset($userUpdate)){
            echo $userUpdate;
        }
    ?>
    <div class="text-center mb-4 text-primary">
        <h3>User Profile</h3>
    </div>
    <?php
        $userProfile = $user->getUserById($userId);
        // var_dump($userProfile);
        if($userProfile){
    ?>
    <form action="profile.php?id=<?= $userId ?>" method="POST">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= $userProfile['name'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= $userProfile['username'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?= $userProfile['email'] ?>">
        </div>

        <div class="form-group d-grid gap-2">
            <button type="submit" name="update" class="btn btn-success btn-block">Update</button>
        </div>

    </form>
    <?php } ?>
</div>



<?php include 'inc/footer.php';?>



