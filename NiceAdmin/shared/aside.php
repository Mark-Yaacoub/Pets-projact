<?php session_start() ;

if(isset($_GET['Logout'])){
  session_unset();
  session_destroy();
  header('location:/NiceAdmin/index.php');
}
if($_SESSION['admin']){

}else{
    header('location:/NiceAdmin/index.php');
}

?>
<!-- ======= Sidebar ======= -->
<?php if(isset($_SESSION['admin'])) : ?>
<aside>

<ul class="sidebar-nav" id="sidebar-nav">
    
  <li class="nav-item">
    <a class="nav-link collapsed" href="/NiceAdmin/home/home.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  
  <li class="nav-item">
    <a class="nav-link collapsed" href="/NiceAdmin/users-profile.php">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li>
  <!-- End Contact Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="/NiceAdmin/category/add.php">
    <i class="bi bi-plus-circle"></i>
      <span>catogery</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" href="/NiceAdmin/admin/pages-register.php">
      <i class="bi bi-card-list"></i>
      <span>Add Admin</span>
    </a>
  </li>
  <!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="/NiceAdmin/pages-contact.php">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

 
  
  <li class="nav-item">
  <form>
    <button name = "Logout" class="nav-link collapsed"  >
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Logout</span>
    </button>
    </form>
  </li>
  
  
  
  <!-- End Login Page Nav -->

  

  
    <?php endif ; ?>
</ul>
</aside>
<!-- End Sidebar--> 


