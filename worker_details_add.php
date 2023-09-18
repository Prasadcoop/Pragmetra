
<?php

$con=mysqli_connect("localhost:3307","root","","pragentra");

if($con==false){
    $errorMessage= "Connection not successful";
}

$message = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fullname = $_POST["fullname"];
	
    if (empty($fullname)) {
        $message[] = "Full Name is required.";
    }

    $password = $_POST["password"];
	
    if (empty($password)) {

        $message[] = "Password is required.";
    }else {
       
		if (strlen($password) < 8) {
            $message[] = "Password must be at least 8 characters long.";
        }

        $hasDigit = false;
        for ($i = 0; $i < strlen($password); $i++) {
            if (ctype_digit($password[$i])) {
                $hasDigit = true;
                break;
            }
        }
        if (!$hasDigit) {
            $message[] = "Password must contain at least one digit.";
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
            $message[] = "Password must contain at least one special character like @, $, !, %, *, ?, or &.";
        }
    }
    


	$email = $_POST["email"];
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message[] = "Invalid email format.";
    }

   
    $mobile = $_POST["mobile"];
    if (!empty($mobile) ) {
        $message[] = "Mobile is required.";
    }else{
		if (strlen($password) < 10) {
            $message[] = "Invalid Mobile.";
        }
	}

	$count = "SELECT COUNT(*) AS total_records FROM workerdeatils";

    $countid = $con->query($count);
	if ($countid->num_rows > 0) {
		// Fetch the result as an associative array
		$row_id = $countid->fetch_assoc();
		$total_id = $row_id["total_records"]+1;
		
	} else {
		$total_id=1;
	}
	
	$worker_id = "W" . str_pad($total_id, 3, "0", STR_PAD_LEFT);

	echo $worker_id;
	if (empty($message)) {
		$message ="<h1>submitted successfully </h1>";
       
    } else {
       
        echo "<h1>Validation Errors</h1>";
        foreach ($message as $msg) {
            echo "<p>$msg</p>";
		}
	}
	
    
  
} else {
    
    echo "Form submission error.";
}
?>