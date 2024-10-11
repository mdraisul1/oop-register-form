<?php
    include 'inc/header.php';
    include_once 'lib/User.php';
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
?>

<!-- body content -->
<div class="container mt-4">
    <h1>User List <span class="float-end">Welcome!
        <?php 
            $username = Session::get('username');
            if(isset($username)){
                echo $username;
            }
        ?>
    </span></h1>
    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $db = new User();
                $userData = $db->getUserData();
                if($userData){
                    foreach($userData as $dataU){
                        echo "<tr>
                            <td>{$dataU['id']}</td>
                            <td>{$dataU['name']}</td>
                            <td>{$dataU['username']}</td>
                            <td>{$dataU['email']}</td>
                            <td>
                                <a href='profile.php?id={$dataU['id']}' class='btn btn-primary'>View</a>
                                <a href='?action=delete&id={$dataU['id']}' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<!-- body content end -->

<?php 
    include 'inc/footer.php';
?>
