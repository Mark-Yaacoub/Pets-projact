<?php
include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';


$select = "SELECT posts.id,posts.title ,posts.image ,posts.description,posts.userId ,categories.name `name` , users.name `userName` from posts JOIN categories JOIN users ON posts.categoryId= categories.id AND posts.userId = users.id;" ;
$p = mysqli_query($conn, $select);


$userr = "";

if($_SESSION['admin']){

}else{
    header("location :NiceAdmin/index.php");
}


?>
<?php

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM `posts` where id =$id";
  $d = mysqli_query($conn, $delete);
  header('location:/NiceAdmin/home/home.php');
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
        <center> <h1>Posts User</h1></center>
      
        <table class="table border ">
                <br>
                <tr>
                    <th><span class="badge bg-success"> User Name </span></th>
                    <th><span class="badge bg-success"> Catogery </span></th>
                    <th><span class="badge bg-success"> Titel </span></th>
                    <th colspan="2"><span class="badge bg-success"> Description </span></th>
                    <th >Action</th>
                </tr>
                <?php foreach ($p as $data){?>
                    <tr>
                        <td><?php echo $data['userName'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['title'] ?> </td>
                        <td  colspan="2" ><?php echo $data['description'] ?></td>
                        
                        <th> <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/home/home.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>  </th>
                        
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