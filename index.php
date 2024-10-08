<?php
    include 'inc/header.php';
    include_once 'lib/User.php';

    $db = new User();
?>

<!-- body content -->
<div class="container mt-4">
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
            <tr>
                <td>1</td>
                <td>John</td>
                <td>John123</td>
                <td>oXw0T@example.com</td>
                <td>
                    <button class="btn btn-warning btn-sm">Update</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- body content end -->

<?php 
    include 'inc/footer.php';
?>
