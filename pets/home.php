<?php
include './shared/head.php';
include './shared/config.php';
include './shared/function.php';


session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/pets/index.php');
}

if ($_SESSION['user']) {
} else {
    header('location:/pets/index.php');
}


?>

<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['send_post'])) {
        $title = $_POST['title'];
        // image Code
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $location = "./uploaded_img/" . $image_name;
        move_uploaded_file($image_tmp, $location);
        // End image code
        $description = $_POST['description'];
        $userId =  $_SESSION['userId'];
        $cat_id = $_POST['cat_id'];



        if (trim($title) == "" || trim($description) == "") {
            echo '<script>alert("Please enter valid data")</script>';
        } else {
            $insert = "INSERT INTO `posts` (`id`, `title`, `image`, `description`, `userId`, `categoryId`) VALUES (NULl, '$title','$image_name','$description' , $userId, $cat_id);";
            $ii = mysqli_query($conn, $insert);
        }
    }
}

$select1 = "SELECT * from `categories` ";
$ss = mysqli_query($conn, $select1);


$select2 = "SELECT posts.id,posts.title ,posts.image ,posts.description,posts.userId ,categories.name `name` , users.name `userName` from posts JOIN categories JOIN users ON posts.categoryId= categories.id AND posts.userId = users.id;";
$su = mysqli_query($conn, $select2);


// show profail user 

$id = $_SESSION['userId'];
$select3 = "SELECT * FROM  `users` WHERE  id ='$id'";
$s = mysqli_query($conn, $select3);


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






<div class="wrapper">
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
    <main>
        <div class="main-section">
            <div class="container">
                <div class="main-section-data">
                    <section class="row">
                        <div class="col-lg-3 col-md-3 pd-left-none no-pd">
                            <div class="main-left-sidebar no-margin">
                                <div class="user-data full-width">
                                    <?php foreach ($s as $data) { ?>
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="usr-pic">
                                                    <img style="
                                                    height: 100%;
                                                    " class="img" src="../pets/uploaded_img/<?php echo $data['image'] ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="user-specs">
                                                <h3><?php echo $data['name'] ?></h3>
                                                <span><?php echo $data['job'] ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <ul class="user-fw-status">
                                        <li>
                                            <h4>Following</h4>
                                            <span>34</span>
                                        </li>
                                        <li>
                                            <h4>Followers</h4>
                                            <span>450</span>
                                        </li>
                                        <li>
                                            <form>
                                                <button style="cursor:pointer ;" class="btn btn-danger" name="logout"> Sign out</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="suggestions full-width">
                                    <div class="sd-title">
                                        <h3>Suggested Friends</h3>
                                        <i class="la la-ellipsis-v"></i>
                                    </div>
                                    <?php
                                    $select = "SELECT * FROM  `users` ";
                                    $sv = mysqli_query($conn, $select);

                                    ?>
                                    <div class="suggestions-list">
                                        <?php foreach ($sv as $data) {
                                            if ($data['id'] == $_SESSION['userId']) {
                                                continue;
                                            }

                                        ?>

                                            <div class="suggestion-usd">
                                                <img style="height: 60px;" class="imgprofailhome" src="../pets/uploaded_img/<?php echo $data['image'] ?>" alt="">
                                                <div class="sgt-text">
                                                    <h4><?php echo $data['name'] ?></h4>
                                                    <span><?php echo $data['job'] ?></span>
                                                </div>
                                                <span><i class="la la-plus"></i></span>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                                <div class="tags-sec full-width">
                                    <ul>
                                        <li><a href="#" title="">Help Center</a></li>
                                        <li><a href="#" title="">About</a></li>
                                        <li><a href="#" title="">Privacy Policy</a></li>
                                        <li><a href="#" title="">Community Guidelines</a></li>
                                        <li><a href="#" title="">Cookies Policy</a></li>
                                        <li><a href="#" title="">Career</a></li>
                                        <li><a href="#" title="">Language</a></li>
                                        <li><a href="#" title="">Copyright Policy</a></li>
                                    </ul>
                                    <div class="cp-sec">
                                        <img src="images/animalshop.png" alt="">
                                        <p><img src="images/cp.png" alt="">Copyright 2022</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 no-pd">
                            <div class="main-ws-sec">
                                <div class="post-topbar">
                                    <?php foreach ($s as $data) { ?>
                                        <div class="user-picy">
                                            <img style="width: 50px;height: 50px;border-radius: 50px;" src="../pets/uploaded_img/<?php echo $data['image'] ?>" alt="">

                                        </div>
                                    <?php } ?>
                                    <div class="post-project-fields border" style="margin-top: 20px;">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="text" name="title" placeholder="Title">
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="inp-field">
                                                        <select name="cat_id">
                                                            <?php foreach ($ss as $data) { ?>
                                                                <option value="<?php echo $data['id'] ?>"> <?php echo $data['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea name="description" placeholder="Description"></textarea>
                                                    <input type="file" name="image">
                                                </div>
                                                <div class="col-lg-12">
                                                    <ul>
                                                        <li><button class="active" name="send_post">Post</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                            <div class="posts-section ">
                                <?php foreach ($su as $data) { ?>
                                    <div class="post-bar border">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img class="imgprofailhome" alt="">
                                                <div class="usy-name">
                                                    <div class="post-style1">
                                                        <h2>
                                                            <span class="badge bg-info" style="color:white ;"> User Name : <?php echo $data['userName'] ?> </span>
                                                        </h2>
                                                        <h4> <span class="badge bg-success" style="color:white ;"> catogery: <?php echo $data['name'] ?> </span> </h4>

                                                    </div>
                                                    <br>


                                                    <h4> <span style="color:white ;" class="badge bg-success"> titel: :<?php echo $data['title'] ?> </span> </h4>
                                                    <br>
                                                    <h1><?php echo $data['description'] ?></h1>

                                                    <img src="../pets/uploaded_img/<?php echo $data['image'] ?>">

                                                </div>


                                            </div>


                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-3 pd-right-none no-pd">
                            <div class="right-sidebar">
                                <div class="widget widget-about">
                                    <img src="images/animalshop.png" alt="">
                                    <h3>Your Animal Is Safe With Us</h3>
                                    <span>"Some people talk to animals. Not many listen though."</span>
                                    <div class="sign_link">
                                        <form>
                                            <button name="logout"> Sign out</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </main>

</div>
<?php
include './shared/end.php';
?>