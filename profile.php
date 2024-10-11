<?php
    include 'inc/header.php';
    include_once 'lib/User.php'; 
?>

<div class="container mt-4">
    <form action="profile.php" method="POST">
        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group d-grid gap-2">
            <a href="profile.php" class="btn btn-success btn-block">Update</a>
        </div>
    </form>
</div>



<?php include 'inc/footer.php';?>



