<?php
include './shared/head.php';
include './shared/config.php';


SESSION_start();


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/pets/index.php');
}



if ($_SESSION['user']) {
} else {
    header('location:/pets/index.php');
}


$id7 = $_SESSION['userId'];
$select = "SELECT * FROM  `users` WHERE  id ='$id7'";
$s = mysqli_query($conn, $select);




// CHAT



if (isset($_POST['send_message'])) {
    $subject = $_POST['subject'];
    $data = $_POST['data'];
    $userId =  $_SESSION['userId'];


    if (trim($subject) == "") {
        echo '<script>alert("plese enter valid data")</script>';
    } else {
        $insertMessage = "INSERT INTO `messages`(`id`, `subject`, `data`, `userId`) VALUES (NULL,'$subject','$data','$userId')";
        $iChat = mysqli_query($conn, $insertMessage);
        echo '<script>alert("Message has been sent")</script>';
    }
}


// replay message 

$id3 = $_SESSION['userId'];
$select_replay = "SELECT * FROM `answers` where messageId = '$id3' ";
$s_replay = mysqli_query($conn, $select_replay);


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
        header('location:/pets/home.php');
        echo '<script>alert("Update info")</script>';
    }
}






?>

<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
                <a href="index.php" title=""><img src="images/animalshop.png" alt=""></a>
            </div>
            <div class="search-bar">
                <form>
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit"><i>🔎</i> </button>
                </form>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="home.php" title="">
                            <span><img src="images/icon1.png" alt=""></span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-openm">
                            <span><img src="images/icon6.png" alt=""></span>
                            Messages
                        </a>
                        <div class="notification-box msg" id="message">
                            <div class="nt-title">
                                Chat
                            </div>
                            <div class="nott-list">
                                <form method="POST">
                                    <div class="notfication-details">

                                        <div class="notification-info">

                                            <?php foreach ($s_replay as $data5) { ?>
                                                <input style="width: 100%;height: 60px;" value="<?php echo $data5['answer_data'] ?> " name="message_admin" type="text" readonly placeholder="Messager Admin">
                                            <?php } ?>
                                            <br>
                                            <br>
                                            <input style="width: 100%;height: 60px;" name="subject" type="text" placeholder="Enter Title Her">
                                            <br>
                                            <br>
                                            <input style="width: 100%;height: 60px;" name="data" type="text" placeholder="Enter Messager Her">

                                        </div>
                                    </div>

                                    <div class="view-all-nots">
                                        <button class="btn btn-info" name="send_message">Send Messages</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="images/icon7.png" alt=""></span>
                            Notifications
                        </a>
                        <div class="notification-box noti" id="notification">
                            <div class="nt-title">
                                <h4>Settings</h4>
                                <a href="setting.php" title="">Clear all</a>
                            </div>
                            <div class="nott-list">
                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="images/resources/ny-img1.png" alt="">
                                    </div>

                                    <div class="notification-info">
                                        <h3><a href="#" title="">Marco Malak</a> Commented on your project.</h3>
                                        <span>2 min ago</span>
                                    </div>
                                </div>
                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notifications</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <?php foreach ($s as $data) { ?>
                <div class="user-account">
                    <div class="user-info">
                        <img style="width: 35px;height: 34px;border-radius: 50px;" src="../pets/uploaded_img/<?php echo $data['image'] ?>" alt="">
                        <a style="margin-top: -29px;margin-left: 58px;overflow: hidden;" href="profile-feed.php" title=""> <?php echo $data['name'] ?></a>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

</header>

<div class="container">
    <div class="card">
        <br>
    <h1>Edite Info</h1>
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


<?php
include './shared/end.php';
?>

