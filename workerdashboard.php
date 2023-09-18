<?php
session_start();


if (isset($_SESSION['worker_id'])) {

    $worker_id = $_SESSION['worker_id'];


    echo "";
} else {
    header('location: worker.php');
}


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>
<style>
        /* Style for the button */
        #topLeftButton {
            position: absolute;
            top: 10px; /* Adjust the top position as needed */
            right: 25px; /* Adjust the left position as needed */
            background-color: #007bff;
            color: #fff;
            padding: 5px 5px;
            border: none;
            cursor: pointer;
        }
    </style>

<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="row">
    <div class="col-sm-10">
        <h2 class="text-center">Workers Details</h2>
    </div>
     -->
    </div>
    <h2 class="text-center m-4">Workers Details</h2>
    <div class="row">
        <a id="topLeftButton" href="worker_logout.php" class="btn btn-danger">Logout</a>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered nowrap row-border table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Sr.No</th>
                                    <th class="text-center">Worker Id</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Email Id </th>
                                    <th class="text-center">Mobile</th>
                                    <th class="text-center">Edit</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $con = mysqli_connect("localhost:3307", "root", "", "pragentra");

                                if ($con == false) {
                                    echo "Connection is failed";
                                }

                                $worker_id = $_SESSION['worker_id'];

                                $qry = "SELECT * FROM `workerdetails` WHERE `worker_id`='$worker_id'";
                                $result = mysqli_query($con, $qry);



                                if ($result) {
                                    $count = 0;
                                    while ($data = mysqli_fetch_assoc($result)) {
                                        $count++;
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo $count; ?> </td>
                                            <td class="text-center"><?php echo $data['worker_id']; ?></td>
                                            <td class="text-center"><?php echo $data['password']; ?></td>
                                            <td class="text-center"><?php echo $data['full_name']; ?></td>
                                            <td class="text-center"><?php echo $data['email']; ?></td>
                                            <td class="text-center"><?php echo $data['mobile']; ?></td>
                                            <td class="text-center"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">edit
                                                </button></td>
                                        </tr>
                                <?php
                                    }
                                    mysqli_close($con);
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="loading" class="p-2 d-flex align-items-center flex-column">
                        <!-- <img src='https://media.tenor.com/cWhSRPC9900AAAAj/loading-black.gif' width="50px">
                            <p class="text-center text-muted p-2">&nbsp;&nbsp;&nbsp; Loading !!!</p> -->
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">update your details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                if (!empty($message)) {
                    echo '<div class="text-center alert alert-danger" role="alert">' . $message . '</div>';
                }
                ?>
                <form action="update_worker.php" method="post">
                    <?php

                    $con = mysqli_connect("localhost:3307", "root", "", "pragentra");

                    if ($con == false) {
                        echo "Connection not successful";
                    }

                    $worker_id = $_SESSION['worker_id'];

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

                                <input class="form-control" name="password" type="text" value="<?php echo $data['password']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="<?php echo $data['email']; ?>" type="email">
                            </div>
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input class="form-control" name="mobile" value="<?php echo $data['mobile']; ?>" type="mobile">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name='worker_id' value="<?php echo $data['worker_id']; ?>" />
                                <button name="update" type="submit" id="butsave" class="btn btn-primary btn-block"> Sumbit </button>

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


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>