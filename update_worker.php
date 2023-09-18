<?php

$message = ''; 
$con=mysqli_connect("localhost:3307","root","","pragentra");

if($con==false){
    $message= "Connection is failed";
}

if (isset($_POST['update'])) {
    session_start();
    $worker_id =$_SESSION['worker_id'];
  
    $fullname = $_POST["fullname"];
	
    if (empty($fullname)) {
        $message = "Full Name is required.";
    }

    $password = $_POST["password"];
	
    if (empty($password)) {

        $message = "Password is required.";
    }else {
       
		if (strlen($password) < 8) {
            $message= "Password must be at least 8 characters long.";
        }

        $hasDigit = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_digit($password[$i])) {
                $hasDigit = true;
                break;
            }
        }
        if (!$hasDigit) {
            $message = "Password must contain at least one digit.";
        }

       
        $specialChars = array('@', '$', '!', '%', '*', '?', '&');
        $hasSpecialChar = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (in_array($password[$i], $specialChars)) {
                $hasSpecialChar = true;
                break;
            }
        }
        if (!$hasSpecialChar) {
            $message = "Password must contain at least one special character like @, $, !, %, *, ?, or &.";
        }
    }
    


	$email = $_POST["email"];
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    }

   
    $mobile = $_POST["mobile"];
	
    if (empty($mobile) ) {
        $message = "Mobile is required.";
    }else{
		if (strlen($mobile) < 10) {
            $message = "Invalid Mobile.";
        }
	}

	

	// echo $worker_id;
	if (empty($message)) {
		$sql = "UPDATE `workerdetails` SET `full_name`='$fullname',`password`='$password' ,`email`='$email',`mobile`='$mobile' WHERE `worker_id`='$worker_id' ";

        $run = mysqli_query($con, $sql);
		
            if ($run === TRUE) {
            
                mysqli_close($con);
                ?>
                <script>
                <h1>Updated successfully </h1>
                windows.reload();
                </script>
                <?php
                header("location: workerdashboard.php");
            }else{
                ?>
                <script>
                  alert("<?php echo mysqli_error($con); ?>");
                  window.location.href = "workerdashboard.php";
                </script>
    
                    <?php
                //  $message = "Error: " . mysqli_error($con);
            
            }

    }else{
        // echo $message;
        ?>
            <script>
              alert("<?php echo $message; ?>");
              window.location.href = "workerdashboard.php";
            </script>

                <?php
         //header("location: workerdashboard.php");
        exit;
    }
	
    
  
}
?>