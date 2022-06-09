<?php

include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';

//add cat


if (isset($_POST['send'])) {
    $name = $_POST['name'];

    if (trim($name) == "") {
        echo '<script>alert("plese enter valid data")</script>';
    } else {
        $insert = "INSERT INTO categories VALUES (NULL ,'$name')";
        $i = mysqli_query($conn, $insert);
    }
}

$name = "";
$update = false;
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `categories` WHERE id = $id";
    $ss = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($ss);
    echo $row['id'] . $row['name'];

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $update = "UPDATE `categories` SET `name`='$name' WHERE id = $id";
        $u = mysqli_query($conn, $update);
        header('location: /NiceAdmin/category/add.php');
    }
}

?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Catogery</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Add Catogry</li>
          <li class="breadcrumb-item">list Catogry</li>
        </ol>
      </nav>
    </div>
    <?php if ($update) : ?>
    <h4 class="text-center  "> Update Category :<?php echo $name ?> </h4>
<?php else : ?>
    <h4 class="text-center "> Add Category</h4>
<?php endif; ?>


<div class="container text-center col-md-7 ">
    
    <div class="">
        <div class=" ">
            <form method="POST">
                <div class="">
                    <br> 
                    <input name="name" value="<?php echo $name ?>" type="text" class="form-control">
                </div>
                <?php if ($update) : ?>
                    <br>
                    <button name='update' class="btn btn-info mx-auto btn-block w-50 ">Update Data</button>
                <?php else : ?>
                    <br>
                    <button name='send' class="btn btn-info mx-auto btn-block w-50">Send Data</button>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>


<?php

$select = "SELECT * FROM `categories`";
$s = mysqli_query($conn, $select);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM categories where id =$id";
    $d = mysqli_query($conn, $delete);
    header('location:/NiceAdmin/category/add.php');
}

?>


<br>
<h4 class="text-center pt-2">List Category</h4>
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
                        <th> <a onclick="return confirm('Do you want to delete!')" href="/NiceAdmin/category/add.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a></th>
                        <th> <a href="/NiceAdmin/category/add.php?edit=<?php echo $data['id'] ?>" class="btn btn-info">Edit</a></th>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
</div>

</main>











<?php
include '../shared/footer.php';
include '../shared/script.php';
?>