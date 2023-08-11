<?php include('../config/constants.php');?>
<?php include('../config/logincheck.php');?>
<!DOCTYPE html>
<html lang="en">


<?php 
    if(isset($_GET['room_id'])){
        $room_id1=$_GET['room_id'];
        $sql1="SELECT * FROM tbl_rooms WHERE room_id='$room_id1'";
        $res1=mysqli_query($conn,$sql1);
        if($res1==True){
            while($row=mysqli_fetch_assoc($res1)){
                $room_name=$row['room_name'];
                $capacity=$row['capacity'];
                $location=$row['location'];
                $description=$row['description'];
                $img_name=$row['img_name'];
            }
        }
    }
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills&display=swap" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('../images/<?php echo $img_name; ?>');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        .navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: #fff;
            -webkit-transform: scale(1.2);
        }
    </style>
    <style>
    body {
  margin-top: 0%;
}

@media only screen and (max-width: 450px) {
  body {
    margin-top: 30%;
  }
}
@media only screen and (min-width: 450px) and (max-width: 1050px) {
  body {
    margin-top: 15%;
  }
}
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo "><a href="../home.php?id=<?php echo $id; ?>">Emisha</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto mt-3" href="../home.php?id=<?php echo $id; ?>">Home</a></li>
                    <li class="dropdown"><a href="#"><i class="fa fa-user" style="font-size:26px"></i><?php echo $user_name; ?><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="logout.php"> &#x1F511;logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>

    <?php date_default_timezone_set("Asia/kolkata");
    $currentDate = date("Y-m-d");
    $currentTime = date("h:i:sa"); ?>

    <div class="modal-dialog modal-dialog-centered banner login animate__animated animate__fadeInDown" style="margin-top:8%;">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold heading" id="exampleModalLabel1">Book Hall</h5>
            </div>
            <form autocomplete="off" action="booktime.php">
                <div style="padding:10px;">
                    <div class="mb-3">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room_Name</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $room_name; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Location</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $location; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Capacity</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $capacity; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Description</span>
                        <br><br>
                        <p style="display:inline !important;width:70%;">
                            <?php echo $description; ?> </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Date</span>
                        <input type="date" class="form-control" name="date" aria-describedby="basic-addon1" style="display:inline !important;width:70%;" min="<?php echo $currentDate; ?>" required />
                    </div>
                    <input id="myInput" type="hidden" name="id" value="<?php echo $id; ?>">
                    <input id="myInput" type="hidden" name="room_id" value="<?php echo $room_id1; ?>">
                </div>
                <div style="float:right;margin:10px;">
                    <a class="btn btn-secondary"  href='../home.php?id=<?php echo $id; ?>'>Cancel</a>
                    <input type="Submit" class="btn btn-primary" name="update" value="Proceed" style="background-color:rgba(0,22,59,255) !important;">
                </div>
            </form>
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>