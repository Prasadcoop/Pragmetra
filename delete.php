<?php

$con = mysqli_connect("localhost:3307", "root", "", "pragentra");

if ($con == false) {
    echo "Connection not successful";
}

    $worker_id=$_GET['worker_id'];
    $bool=0;
    $qry="UPDATE `workerdetails` SET `is_active`=0 WHERE `worker_id`='$worker_id' ";
    $run=mysqli_query($con,$qry);

    if($run == true){
        
        ?>
        <script>
           alert ("Worker remove from table Successfully");
        </script>
        <?php
         mysqli_close($con);
        header("location: dashboard.php");
    }else{
		echo "Error: " . mysqli_error($con); 
	}
   
?>