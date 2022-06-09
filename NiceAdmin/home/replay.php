<?php
include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';

// select user name

$selectMessageUser = "SELECT messages.id,messages.subject ,messages.data ,users.name name FROM messages JOIN users ON messages.userId = users.id";
$chat = mysqli_query($conn, $selectMessageUser);


// replay admin


// if (isset($_GET['edit'])) {

//     if (isset($_POST['Send_Message'])) {
//         $answer_data = $_POST['answer_data'];
//         $adminId = $_SESSION['admin'];


//         $insertreplay = "INSERT INTO `answers`(`id`, `answer_data`, `messageId`, `adminId`) VALUES (NULL,'$answer_data','[value-3]','$adminId')";
//         $ichat = mysqli_query($conn, $insertreplay);
//     }
// }



if (isset($_GET['edit'])) {
    if (isset($_POST['Send_Message'])) {
        $answer_data = $_POST['answer_data'];
        $messageId = $_GET['edit'];
        $adminId = $_SESSION['admin'];
        
        $insertreplay = "INSERT INTO `answers`(`id`, `answer_data`, `messageId`, `adminId`) VALUES (null,'$answer_data','$messageId','$adminId')";
        $ichat = mysqli_query($conn, $insertreplay);
        echo '<script>alert("Message has been sent")</script>';

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
    <!-- End Page Title -->

    <section class="section dashboard col-lg-12">
        <div class="row">
            <center>
                <h1>Replay Message</h1>
            </center>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Replay Message </h5>
                               
                            </div>

                            <form class="row g-3 needs-validation" method="POST">
                                <div class="col-12">
                                    <input style="height: 130px;" type="text" name="answer_data" class="form-control" required="You cannot send an empty message" placeholder="Put your message here">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit" name="Send_Message">Send Message</button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </section>
</main>