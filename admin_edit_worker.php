<?php
include("navbar.php");
?>



<?php

$con=mysqli_connect("localhost:3307","root","","pragentra");

if($con==false){
    $errorMessage= "Connection not successful";
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $worker_id =$_POST['worker_id'];
    echo $worker_id;
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
        header("location: dashboard.php");
    }else{
		$message = "Error: " . mysqli_error($con); 
	}
}
	
    
  
}
?>




<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>

<style>
        /* Use CSS to style the container */
        .icon-container {
            display: inline-flex;
            align-items: center;
        }

        /* Use CSS to adjust the icon size */
        .custom-size {
            font-size: 0.7em;
        }
    </style>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
		<h1 class="m-4 text-center">Update Worker details</h1>
				<?php
			if (!empty($message)) 
			{
				echo '<div class="text-center alert alert-danger" role="alert">' . $message . '</div>';
			}
			?>
			<form action="" method="post" >
            <?php

                $con = mysqli_connect("localhost:3307", "root", "", "pragentra");

                if ($con == false) {
                    echo "Connection not successful";
                }
                
                $worker_id =$_GET['worker_id'];
               
                $qry = "SELECT * FROM `workerdetails` WHERE `worker_id`='$worker_id'";
                $result = mysqli_query($con, $qry);



                if ($result) {
                    $count = 0;
                    while ($data = mysqli_fetch_assoc($result)) {
                        $count++;
                ?>
				<div class="form-group">
					<label>Full Name <span class="text-danger">*</span></label>
					<input class="form-control" name="fullname" value="<?php echo $data['full_name']; ?>" type="name">
				</div>
				<div class="form-group">
				    
					<label>Password <span class="text-danger">*</span></label>
					
					<input class="form-control" name="password"  type="text" value="<?php echo $data['password'];?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" name="email" value="<?php echo $data['email'];?>" type="email">
				</div>
				<div class="form-group">
					<label>Mobile No.</label>
					<input class="form-control" name="mobile" value="<?php echo $data['mobile'];?>" type="mobile">
				</div>
				
				<div class="form-group">
                <input type="hidden" name='worker_id' value="<?php echo $data['worker_id']; ?>" />
                <button id="butsave" class="btn btn-primary btn-block"> Sumbit </button>
              
            </div>
            <?php
                    }
                }
                mysqli_close($con);
                ?>
			</form>
		</div>
	</div>

</div>
</div>
