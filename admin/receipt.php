<?php include('../config/constants.php');?>
<?php include('../config/logincheck.php');?>
<!DOCTYPE html>
<html lang="en">


<?php 
    $start = $_GET['start'];
    $end = $_GET['end'];
    $book_num = $_GET['num'];
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
                    <li><a class="nav-link scrollto mt-3 " href="../home.php?id=<?php echo $id; ?>">Home</a></li>
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


    <div class="modal-dialog modal-dialog-centered banner login animate__animated animate__fadeInDown" style="margin-top:8%;">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold heading" id="exampleModalLabel1" style="text-align:center">Booking Confirmation</h5>
            </div>
            <br>
            <div>
                <div style="padding:10px;">
                <div class="mb-3">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Booking ID</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px; font-size:120%">
                            <?php echo $book_num; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:7%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room Name</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $room_name; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:7%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room Number</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $_GET['room_number']; ?>
                        </p>
                    </div>
                    <?php 
                        $date = $_GET['date'];
                        $date1=date_create($date);
                    ?>
                    <div class="mb-3" style="margin-top:7%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Date</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo date_format($date1,"d/m/Y"); ?>
                        </p>
                    </div>
                    <div style="disply:inline">
                    <div class="mb-3" style="margin-top:5%;float:left">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Start Time</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $start; ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;display:inline;float:left;margin-left:10%">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">End Time</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $end; ?>
                        </p>
                    </div>  
                    </div>
                    </div>
        </div>
                    <br>
        <div class="modal-footer">
        <a href='../home.php?id=<?php echo $id; ?>#bookings'><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
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