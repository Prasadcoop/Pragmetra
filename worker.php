<?php
session_start();


if(isset($_SESSION['worker_id']))
{
    // header('location: dashboard.php');
    $worker_id=$_SESSION['worker_id'];
    
    header('location: workerdashboard.php');
    echo "";
}
?>
<?php
//include('dbcon.php');
$errorMessage = ''; 
$con=mysqli_connect("localhost:3307","root","","pragentra");

if($con==false){
    $errorMessage= "Connection is failed";
}





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $worker_id = $_POST['worker_id'];
    $password = $_POST['password'];

    $qry = "SELECT worker_id,password FROM `workerdetails` WHERE `worker_id`='$worker_id'";
    
    // Check if the user exists
    $run = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($run);
   
    
    if ($row == 1)
    {
        $data = mysqli_fetch_assoc($run);
       
        $password_db=$data['password'];

        if ($password_db == $password) {
            session_start();
            $_SESSION['worker'] = true;
            $_SESSION['worker_id'] = $data['worker_id'];
           
            header('Location: workerdashboard.php');
            exit();
        } else {
            $errorMessage = 'Invalid Password. Please try again.'; 
        }
    }
    else{
        $errorMessage = 'Invalid username.'; 
    }
    
   
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>worker Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>
</head>
<body>
   

   
    <article class="card-body mx-auto" style="max-width: 400px;">
    <h1 align="center ">Worker Login</h1><br>
    <?php
    if (!empty($errorMessage)) {
        echo '<div class="text-center alert alert-danger" role="alert">' . $errorMessage . '</div>';
    }
    ?>
        <form action="" method="post" class="form-control">
   
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="worker_id" class="form-control" placeholder="Username" type="text" required>
            </div> <!-- form-group// -->
        
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control" placeholder="Password" type="password" required>
            </div> <!-- form-group// -->
           
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
            </div> <!-- form-group// -->
        </form>
    </article>

</body>
</html>



