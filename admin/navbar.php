<?php include('../config/constants.php');?>
 <?php include('logincheckadmin.php');$id=$_GET['id'];?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Emisha</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link  href="assets/css/evo-calendar.min.css" rel="stylesheet">
    <link href="assets/css/evo-calendar.orange-coral.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
</head>

<body style="background-image:url('assets/img/background.jpg');background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;">

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center" style="position:fixed;top:0;left:0;background: #d04622 !important;">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.php?id=<?php echo $id; ?>">Emisha</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php?id=<?php echo $id; ?>">Home</a></li>
                    <li><a class="nav-link scrollto" href="rooms.php?id=<?php echo $id; ?>">Rooms</a></li>
                    <li><a class="nav-link scrollto" href="users.php?id=<?php echo $id; ?>">Users</a></li>
                    <li><a class="nav-link scrollto" href="book_history.php?id=<?php echo $id; ?>">Book History</a></li>
                    <li class="dropdown " style="margin-bottom:8%"><a class="nav-link scrollto"><i class="fa fa-user" style="font-size:26px;"></i>&nbsp;&nbsp;Admin<i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="" data-bs-toggle="modal" data-bs-target="#changepassword"> &#x1F511;Change Password</a></li>
                            <li><a href="logout.php"> &#x1F511;logout</a></li>
                        </ul>
                    </li> 
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- end navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!--change password-->
    <div class="modal fade" id="changepassword" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content password">
          <div class="modal-header">
            <h5 class="modal-title" id="changepassword">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--form in search box-->
            <br>
            <form autocomplete="off" method="POST">
                <label for="currentpassword" style="font-size: 110%;margin-right:10px">Current Password: </label>
                <input type="text" id="myInput" name="currentpassword" style="padding:1%;background-color: rgba(241,241,241,255);border:none"><br><br>
                <label for="newpassword" style="font-size: 110%;margin-right:10px">New Password: </label>
                <input type="text" id="myInput" name="newpassword" style="padding:1%;background-color: rgba(241,241,241,255);border:none"><br><br>
                <button style="border-radius:10px;background-color: rgba(0,22,59,255);color:white;padding:7px;float:right;margin-right:10px;" name="ChangePassword">Change</button>
            </form>
          <!--form end in serach box-->            
          </div>
        </div>
      </div>
    </div>
    <?php 
      if(isset($_POST['ChangePassword'])){
            $id=$_GET['id'];
            $current_password=$_POST["currentpassword"];
            $current_password = md5($current_password);
            $new_password=$_POST["newpassword"];
            $new_password=md5($new_password);
            $s = "SELECT * FROM tbl_admin WHERE admin_id=$id";
            $r = $conn->query($s);
            $row = $r->fetch_assoc();
            $p = $row['admin_password'];
            if($current_password==$p){
              $sql0="UPDATE tbl_admin SET admin_password='$new_password' WHERE admin_id='$id'";
              $res0=mysqli_query($conn,$sql0);
              if($res0==true){
                ?>
                <script>
                    alert("Password Changed Successfully");
                    window.location.href=history.go(-1);
                </script>
                <?php
              }
            }
            else{
              ?>
                <script>
                    alert("Password doesn't match");
                    window.location.href=history.go(-1);
                </script>
                <?php
            }
        }
    ?>
    <!--change password end-->
