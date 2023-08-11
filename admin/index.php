<?php include('navbar.php'); ?>
<head>
<meta http-equiv="refresh" content="100">
</head>
    <!-- ======= Hero Section ======= -->
    <br>
    <br><br><br><br>
    <section id="hero" style="background-color:transparent" class="d-flex flex-column h-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8" >
                    <h2 class="animate__animated animate__fadeInDown"><img src="../assets/img/logo512.png" class="img-fluid" width="150px" height="90px"></img></h2>
                    <h2 style="color:black;"><b>SRI SAIRAM ENGINEERING COLLEGE</b></h2>
                </div>
            </div>
        </div>
        <div class="animate__animated animate__fadeInDown" style="width:100%;height:100% !important;margin:auto;display:block;margin-top:1%;">
            <div id="calendar" style="color:black width:80% !important;height:100% !important;font-family: 'Roboto', sans-serif;"></div>
        </div>
        <br>
        <br>
    </section>
    <!-- End Hero -->


    <!-- Vendor JS Files -->
    <!-- these files are for calender-->
    <!-- Add jQuery library (required) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="assets/js/evo-calendar.min.js"></script>
    <script>
      
        // Initialize evo-calendar in your script file or an inline <script> tag
        $(document).ready(function() {
            $('#calendar').evoCalendar({
              theme:"Orange Coral",
              calendarEvents: [
                <?php
                $sql="SELECT * FROM tbl_book_history WHERE status='BOOKED' ORDER BY start_time,end_time";
                $res=mysqli_query($conn,$sql);
                if($res==true){
                  while($row=mysqli_fetch_assoc($res)){
                    $bookid=$row['book_id'];
                    $book_num=$row['book_num'];
                    $room_id=$row['room_id'];
                    $user_id = $row['user_id'];
                    $sql4 = "SELECT user_name FROM tbl_user WHERE user_id='$user_id'";
                    $res4=mysqli_query($conn,$sql4);
                    $row4=mysqli_fetch_assoc($res4);
                    $user_name=$row4['user_name'];
                    $sql3="SELECT room_name FROM tbl_rooms WHERE room_id='$room_id'";
                    $res3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_assoc($res3);
                    $room_name=$row3['room_name'];
                    $date=$row['date'];
                    $date1=date_create($date);
                    $start_time=$row['start_time'];
                    $end_time=$row['end_time'];
                    $status = $row['status'];

                  ?>
                  {
                    id: 'bHay68s', // Event's ID (required)
                    name: "<?php echo $room_name; ?>", // Event name (required)
                    description: "<?php echo "$start_time".'-'."$end_time"; ?>", //description
                    date: "<?php echo date_format($date1,"m/d/Y"); ?>", // Event date (required)
                    type: "holiday", // Event type (required)
                    everyYear: false // Same event every year (optional)
                  },
                  <?php
                  }
                }
                ?>
              ]
            })
        })
    </script>
    <!--files for calender ends here-->
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