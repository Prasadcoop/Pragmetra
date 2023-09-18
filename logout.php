

<?php
session_start();


if(isset($_SESSION['admin_id'])){
  
    $_SESSION = array();

  
    session_destroy();

    header('Location: adminlogin.php');
    exit();
} else {
    
    header('Location: adminlogin.php');
    exit();
}
?>