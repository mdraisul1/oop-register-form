<?php
    include 'inc/header.php';
    include_once 'lib/User.php';
    Session::checkSession();

    $loginmsg = Session::get('loginmsg');
    if(isset($loginmsg)){
        echo $loginmsg;
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
                // echo "<pre>";
                // var_dump($userData);
                // echo "</pre>";
                if($userData){
                    foreach($userData as $dataU){
                        echo "<tr>
                            <td>$dataU[id]</td>
                            <td>$dataU[name]</td>
                            <td>$dataU[username]</td>
                            <td>$dataU[email]</td>
                            <td>
                                <a href='profile.php?id=$dataU[id]' class='btn btn-primary'>View</a>
                                <a href='delete.php?id=$dataU[id]' class='btn btn-danger'>Delete</a>
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
