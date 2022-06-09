<?php

include '../shared/head.php';
include '../shared/aside.php';
include '../shared/config.php';
?>

<?php




?>



<?php
if (isset($_POST['addAdmin'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
        $insert = "INSERT INTO `admin` VALUES (NULL ,'$name' , '$phone' ,'$email' ,'$password' )";
        $i = mysqli_query($conn, $insert);
  
   
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

<div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create New Admin</h5>
                    <p class="text-center small">Enter New Data </p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST">
                    <div class="col-12">
                      <label for="yourName" class="form-label">Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your name!</div>
                    </div>
                    <div class="col-12">
                      <label for="yourPhone" class="form-label">Phone</label>
                      <input type="text" name="phone" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please enter phone Number</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="addAdmin" type="submit">Create Admin</button>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
</main>






<?php
include '../shared/footer.php';
include '../shared/script.php';
?>