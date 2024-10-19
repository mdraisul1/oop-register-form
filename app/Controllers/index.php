<?php
use App\Services\User;
use App\Services\Session;


Session::checkSession();

$loginmsg = Session::get('loginmsg');
if(isset($loginmsg)){
    echo $loginmsg;
    Session::set('loginmsg', null);
}

//delete user
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id = $_GET['id'];
    $loggedInUserId = Session::get('id');  // Get the logged-in user's ID from the session

    // Ensure that the logged-in user can only delete their own account
    if ($id == $loggedInUserId) {
        $db = new User();
        $deleteUser = $db->userDelete($id);
        if (isset($deleteUser)) {
            echo $deleteUser;
        }
    } else {
        // If the user tries to delete someone else's account, show an error message
        echo "<div class='alert alert-danger alert-dismissible fade show mx-auto'>You are not authorized to delete this account</div>";
    }
}
require 'resources/views/index.php';