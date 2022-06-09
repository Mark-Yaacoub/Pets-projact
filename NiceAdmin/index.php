<?php
include './shared/head.php';
include './shared/config.php';
session_start();



if (isset($_POST['login'])) {
  $name = $_POST['name'];
  $password = $_POST['password'];

  $select = "SELECT * FROM  `admin` WHERE `name` = '$name' and `password` = '$password' ";
  $s = mysqli_query($conn, $select);
  $numOfRows = mysqli_num_rows($s);
  $row = mysqli_fetch_assoc($s);
  if ($numOfRows > 0) {
    $_SESSION['admin'] = $name ;
    $_SESSION['adminId'] = $row['id'];
    $_SESSION['role'] = $row['role'] ;

    header('location:/NiceAdmin/home/home.php');
  } else {
    echo '<div  class="alert alert-danger text-center mt-5  w-50 mx-auto" role="alert">
    The name or password is incorrect 
      </div>';
  }
}

print_r($_SESSION);
?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">


            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your name & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="POST">

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Name</label>
                    <div class="input-group has-validation">
                      <input type="text" name="name" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your Name</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>
                  <div class="col-12">
                    <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                </form>

              </div>
            </div>



          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<?php
include './shared/footer.php';
include './shared/script.php';
?>