<?php

include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';

?>


<?php

$select = "SELECT * FROM `admin`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `admin` where id =$id";
    $d = mysqli_query($conn, $delete);
    header('location:/NiceAdmin/admin/list-admin.php');
}

?>

<main id="main" class="main">
<div class="pagetitle">
  <h1>Admin Page</h1>
  <nav>
    <ol class="breadcrumb">
    <li class="breadcrumb-item active"> <a href="./pages-register.php">Add Admin</a> </li>
      <li class="breadcrumb-item active"> <a href="./list-admin.php">List Admin</a> </li>
    </ol>
  </nav>
</div>

<h4 class="text-center pt-2">List admin</h4>
<div class="container text-center col-md-7">
    <div class="">
        <div class="">
            <table class="table ">
                <br>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php foreach ($s as $data) {
                ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <th> <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/admin/list-admin.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></th>
                        
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div
</main>






<?php
include '../shared/footer.php';
include '../shared/script.php';
?>