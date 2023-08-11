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
                $room_num = $row['room_number'];
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


    <div class="modal-dialog modal-dialog-centered banner login animate__animated animate__fadeInDown" style="margin-top:8%;">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title fw-bold heading" id="exampleModalLabel1">Book Hall</h5>
            </div>
            <div>
                <div style="padding:10px;">
                    <div class="mb-3">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room_Name</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo $room_name; ?>
                        </p>
                    </div>
                    <?php 
                        $date = $_GET['date'];
                        $date1=date_create($date);
                    ?>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Date</span>
                        <p style="display:inline !important;margin-right:0px;margin-left:5px;">
                            <?php echo date_format($date1,"d/m/Y"); ?>
                        </p>
                    </div>
                    <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Booked Slots</span>
                        <br><br>
                        <?php 
                            $sql = "SELECT * FROM tbl_book_history WHERE date='$date' AND room_id=$room_id1 AND status='Booked' ORDER BY start_time";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                while($row=$result->fetch_assoc()){
                                    ?>
                                    <div style="text-align:center;">
                                    <h1 style="font-size: 110%;"><?php echo $row['start_time']; ?> - <?php echo $row['end_time']; ?> </h1> 
                                    </div>
                                    <?php  
                                }
                            }
                            else{
                        ?>
                        <div style="text-align:center;">
                        <h1 style="display:inline !important; margin-right:0px;margin-left:5px;font-size:110%;">
                            No slots booked.
                            </h1>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <form method="POST">
                <div class="mb-3" style="margin-top:5%;">
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:5px; margin-left:3px">From </span>
                        <input type="time"  name="start"  style="display:inline" required />
                        <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:5px;">To </span>
                        <input type="time"  name="end" style="display:inline" required />
                    </div>
                <div style="float:right;margin:10px;">
                <a class="btn btn-secondary"  href='../home.php?id=<?php echo $id; ?>'>Cancel</a>
                    <input type="Submit" class="btn btn-primary" name="update" value="Book" style="background-color:rgba(0,22,59,255) !important;">
                </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    if(isset($_POST['update'])){
        $start = $_POST['start'];
        $end = $_POST['end'];
        date_default_timezone_set("Asia/kolkata");
        $currentDate = date("Y-m-d");
        $date = $_GET['date'];
        $currentTime = date("H:i:s");
        $now = new DateTime($currentDate.' '.$currentTime);
        $datetime1 = new DateTime($date.' '.$start);
        $datetime2 = new DateTime($date.' '.$end);
        if($now>$datetime1){
            ?>
            <script>
            alert("Start Time Expired!!");
            window.location.href='booktime.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>&date=<?php echo $date; ?>';
            </script>
            <?php
        }
        else{
            if($datetime1>=$datetime2){
                ?>
            <script>
            alert("Invalid Slot");
            window.location.href='booktime.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>&date=<?php echo $date; ?>';
            </script>
            <?php
            }
            else{ 
                $flag=1;
                $sql8 = "SELECT * FROM tbl_book_history WHERE room_id=$room_id1 AND date='$date' AND status='Booked'";
                $result8 = $conn->query($sql8);
                if($result8->num_rows>0){
                    while($row8 = $result8->fetch_assoc()){
                        if(testRange($start.':00',$end.':00',$row8['start_time'],$row8['end_time'])){
                            $flag = 0;
                            break;
                        }
                    }
                }
                if($flag==1){
                    $book_num = strval(rand(1,9999));
                    $book_num = 'SI'.str_repeat("0",4-strlen($book_num)).$book_num;
                    $sql8 = "INSERT INTO tbl_book_history(user_id,room_id,date,start_time,end_time,book_num) VALUES ('$id','$room_id1','$date','$start','$end','$book_num')";
                    $result8 = $conn->query($sql8);
                    if($result8){
                        ?>
                        <script>
                        window.location.href='receipt.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>&date=<?php $date; ?>&start=<?php echo $start; ?>&end=<?php echo $end; ?>&num=<?php echo $book_num; ?>&room_number=<?php echo $room_num; ?>';
                        </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                        alert("Some Technical issues. Please try again later.");
                        window.location.href='booktime.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>&date=<?php echo $date; ?>';
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                    <script>
                    alert("Slot Not Available!!");
                    window.location.href='booktime.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>&date=<?php echo $date; ?>';
                    </script>
                <?php
                }
            }
        }
    }
?>   
<?php 
    function testRange($start_time1,$end_time1,$start_time2,$end_time2)
    {
        if($start_time1==$start_time2 && $end_time1==$end_time2){
            return true;
        }
        $age=array($start_time1,$end_time1,$start_time2,$end_time2);
        sort($age);
        if($age[0]==$start_time1 && $age[1]==$end_time1 && $age[2]==$start_time2 && $age[3]==$end_time2){
            return false;
        }
        if($age[0]==$start_time2 && $age[1]==$end_time2 && $age[2]==$start_time1 && $age[3]==$end_time1){
            return false;
        }
        return true;
    }
?>

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