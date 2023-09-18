<?php
include("navbar.php");
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >


<script src="https://kit.fontawesome.com/a43ceed218.js" crossorigin="anonymous"></script>

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
    <div class="col-sm-0 m-2 ">
        <div class="text-right">
            <a href="addworker.php">
                <button class="btn btn-success" type="submit">Add Worker</button>
                <!-- <button class="btn btn-success" type="submit" onclick="downlaod();">Export</button> -->
            </a>
        </div>
    </div>
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
                                    <th class="text-center">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $con = mysqli_connect("localhost:3307", "root", "", "pragentra");

                                if ($con == false) {
                                    echo "Connection not successful";
                                }

                                $qry = "SELECT * FROM `workerdetails` WHERE `is_active`=1";
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
                                            <td class="text-center"> <a href="admin_edit_worker.php?worker_id=<?php echo ($data['worker_id']); ?>"><img src="edit.png" height="24px" width="20px"></a></td>
                                            <td class="text-center"><a href="delete.php?worker_id=<?php echo ($data['worker_id']); ?>"> <img src="delete.png" height="24px" width="20px"></a></td>
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




<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>