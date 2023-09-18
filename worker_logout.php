
    <?php
    session_start();


    if(isset($_SESSION['worker_id'])){
    
        $_SESSION = array();

    
        session_destroy();

        header('Location: worker.php');
        exit();
    } else {
        
        header('Location: worker.php');
        exit();
    }
 
?>