<?php 

session_start();

function auth(){
    if (!$_SESSION['admin']){
        header('location:/NiceAdmin/admin/index.php');
    }
}
auth();

?>