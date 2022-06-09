<?php
include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';


// update info



$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$job = "";

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id8 = $_GET['edit'];
    $select = "SELECT * from `users` WHERE id = $id8";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $address = $row['address'];
    $password = $row['password'];
    $job = $row['job'];

    if (isset($_POST['update'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $job = $_POST['job'];
        
        $updateinfo = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`password`='$password',`job`='$job' WHERE id = $id8";
        $uinfo = mysqli_query($conn, $updateinfo);
        header('location:/NiceAdmin/home/user.php');
        echo '<script>alert("Update info")</script>';
    }
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
                <h1>Edit User</h1>
            </center>
            <div class="card-body">
            <form method="POST">
                <div class="from-control">
                    <label>User Name</label>
                    <br>
                    <input class="form-control" value="<?php echo $name ?>" type="text" name="name">
                </div>
                <br>
                <div class="from-control">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
                </div>
                <br>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $phone ?>">
                </div>
                <br>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $address ?>">
                </div>
                <br>
                <div class="form-group">
                    <label>Job</label>
                    <input name="job" class="form-control" type="text" value="<?php echo $job ?>">
                </div>
                <br>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $password ?>">
                </div>
                <br>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" name="update">Save Changes</button>

                </div>

            </form>
        </div>
        </div>
    </div>
</main>