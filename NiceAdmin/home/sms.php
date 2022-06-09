<?php
include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';

//MESSAGE USER
$selectMessageUser = "SELECT messages.id,messages.subject ,messages.data ,users.name name FROM messages JOIN users ON messages.userId = users.id";
$chat = mysqli_query($conn, $selectMessageUser);


//delete message



if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `messages` where id =$id";
    $d = mysqli_query($conn, $delete);
    header('location:/NiceAdmin/home/sms.php');
}


// MESSAGE ADMIN


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
      <center> <h1>Message User</h1></center>

      <table class="table border ">
                <br>
                <tr>
                    <th><span class="badge bg-success"> User Name </span></th>
                    <th><span class="badge bg-success"> Subject </span></th>
                    <th><span class="badge bg-success"> Data </span></th>
                 
                    <th class="text-center" >Action</th>
                </tr>
                <?php foreach ($chat as $data){?>
                    <tr>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['subject'] ?></td>
                        <td><?php echo $data['data'] ?> </td>
                        <th>
                        
                          
                          <th>
                          <a  href="/NiceAdmin/home/replay.php?replay=<?php echo $data['id']?>" class="btn btn-info">Replay</a>
                             <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/home/sms.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
                              
                            </th>
                          
                          <th> </th>
                          
                           </th>

                       
                       
                        
                    </tr>
                <?php } ?>
            </table>

    </div>
    </section>
  </main>

  <?php
include '../shared/footer.php';
include '../shared/script.php';
?>




  