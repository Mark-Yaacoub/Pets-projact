<?php

include './shared/config.php';

SESSION_start();


$id11 = $_SESSION['userId'];
$select = "SELECT * FROM  `users` WHERE  id ='$id11'";
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
                                    <form  method="POST">
                                        <div class="notfication-details">

                                            <div class="notification-info">
                                                
                                            <?php foreach ($s_replay as $data5) {?>
                                                <input style="width: 100%;height: 60px;" value="<?php echo $data5['answer_data'] ?> "   name="message_admin" type="text" readonly placeholder="Messager Admin">
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