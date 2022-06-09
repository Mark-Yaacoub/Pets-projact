<?php
include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';


$select = "SELECT * FROM `users`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `users` where id =$id";
    $d = mysqli_query($conn, $delete);
    header('location:/NiceAdmin/home/user.php');
}


?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/NiceAdmin/home/home.php">Post User</a></li>
                <li class="breadcrumb-item"><a href="/NiceAdmin/home/sms.php">Message</a></li>
                <li class="breadcrumb-item"><a href="/NiceAdmin/home/replay.php">Replay Message</a></li>
                <li class="breadcrumb-item"><a href="/NiceAdmin/home/user.php">List Users</a></li>
                <li class="breadcrumb-item"><a href="/NiceAdmin/home/editUser.php">Edit Users</a></li>

            </ol>
        </nav>
    </div>



    <div class="container text-center col-md-7">
        <div class="">
            <center>
                <h1>List User</h1>
            </center>
            <div class="">
                <table class="table border">
                    <br>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Job</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php foreach ($s as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data['id'] ?></td>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['job'] ?></td>
                            <th> <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/home/user.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></th>
                            <th> <a href="/NiceAdmin/home/editUser.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a></th>

                        </tr>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>




</main>