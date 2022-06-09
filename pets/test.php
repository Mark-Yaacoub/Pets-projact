<?php
include './shared/head.php';
include './shared/nav.php';
include './shared/config.php';


$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$job = "";

$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `users` WHERE id = $id";
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
        $update = "UPDATE `users` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`password`='$password',`job`='$job' WHERE id = $id";
        $u = mysqli_query($conn, $update);
        // header('location:/pets/home.php');
    }
}

?>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="">
                <div class="from-control">
                    <label>User Name</label>
                    <input class="form-control" value="<?php echo $name ?>" type="text" name="name">
                </div>
                <div class="from-control">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $phone ?>">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" type="text" name="address" value="<?php echo $address ?>">
                </div>
                <div class="form-group">
                    <label>Job</label>
                    <input name="job" class="form-control" type="text" value="<?php echo $job ?>">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" type="password" name="password" value="<?php echo $password ?>">
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" name="update">Save Changes</button>

                </div>

            </form>
        </div>
    </div>
</div>

</div>


<div class="sign-in">

    <div class="container">

        <div class="row flex-lg-nowrap">

            <div class="col">
                <div class="row">

                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="e-profile">
                                    <div class="cil-md-6">
                                        <h2 style="color: red;">Edit Info</h2>
                                    </div>

                                    <br>
                                    <br>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">
                                            <form class="form" method="POST">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="row">

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>User Name</label>
                                                                    <input class="form-control" value="<?php echo $name ?>" type="text" name="name">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Phone</label>
                                                                    <input class="form-control" type="text" name="phone" value="<?php echo $phone ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input class="form-control" type="text" name="address" value="<?php echo $address ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>Job</label>
                                                                    <input name="job" class="form-control" type="text" value="<?php echo $job ?>">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <br>
                                                    <div class="col-12 col-sm-6 mb-3">
                                                        <div style="color: red;" class="mb-2"><b>Change Password</b></div>
                                                        <br>
                                                        <br>

                                                        <div class="row">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>New Password</label>
                                                                    <input class="form-control" type="password" name="password" value="<?php echo $password ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col d-flex justify-content-end">
                                                        <button class="btn btn-primary" name="update">Save Changes</button>

                                                    </div>
                                                    <br>



                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
include './shared/end.php';
?>