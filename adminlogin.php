<?php
session_start();


if(isset($_SESSION['username']))
{
    header('location: dashboard.php');
    exit();
}
?>
<?php
//include('dbcon.php');
$errorMessage = ''; 
$con=mysqli_connect("localhost:3307","root","","pragentra");

if($con==false){
    $errorMessage= "Connection not successful";
}





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $qry = "SELECT id, username,password  FROM `adminlogin` WHERE `username`='$username'";
    
    // Check if the user exists
    $run = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($run);
   
    
    if ($row == 1)
    {
        $data = mysqli_fetch_assoc($run);
       
        $password_db=$data['password'];

        if ($password_db == $password) {
            session_start();
            $_SESSION['admin'] = true;
            $_SESSION['admin_id'] = $data['username'];
            header('Location: dashboard.php');
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
    <title>admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>
</head>
<body>
   

   
    <article class="card-body mx-auto" style="max-width: 400px;">
    <h1 align="center ">Admin Login</h1><br>
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
                <input name="username" class="form-control" placeholder="Username" type="text" required>
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



