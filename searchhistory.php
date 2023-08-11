<?php include('config/constants.php');?>
<?php include('config/logincheck.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Searched Rooms</title>
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
        .zoom {
            transition: transform .2s;
        }

.zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.2);
  transition-delay:1s;
  transition-duration:2s;
}
    </style>
</head>

<body style="background-image:url('admin/assets/img/background.jpg');background-size:cover;background-repeat:no-repeat;width:100%;height:100%;">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo "><a href="home.php?id=<?php echo $id; ?>">Emisha</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="home.php?id=<?php echo $id; ?>">Home</a></li>
                    <li class="dropdown"><a href="#"><i class="fa fa-user" style="font-size:26px"></i><?php echo $user_name; ?><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="admin/logout.php"> &#x1F511;logout</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <br><br><br>
    
    <!--//////////////////////////////////////////-->
     <!--//////////////////////////////////////////-->
      <!--//////////////////////////////////////////-->
    <!--change password-->
    <div class="modal fade" id="changepassword" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changepassword">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--form in search box-->
            <form autocomplete="off"  method="POST">
              <div class="autocomplete" style="width:250px;margin-bottom:1%;">
                <table>
                  <tr>
                    <td style="margin-right:1%;">Current Password:</td>
                    <td style="width:30%!important;"><input id="myInput" type="text" name="currentpassword" value="<?php echo $user_password; ?>" /></td>
                  </tr>
                  <tr>
                    <td>New Password:</td>
                    <td style="width:10%!important;"><input type="password" name="newpassword" required/></td>
                  </tr><br>
                  <tr>
                    <input type="hidden" name="userid" value="<?php echo $id; ?>"/> 
                    <td style="float:right!important;"><input type="submit" name="ChangePassword" value="Change Password" style="border-radius:10px;background-color: #487eb0;margin-top:10%;"/></td>
                   </tr>
                </table>
              </div>
            </form>
          <!--form end in serach box-->            
          </div>
        </div>
      </div>
    </div>
    <?php 
      if(isset($_POST['ChangePassword'])){
            $id=$_POST['userid'];
            $current_password=$_POST["currentpassword"];
            $new_password=$_POST["newpassword"];
            $sql0="UPDATE tbl_user SET user_password='$new_password' WHERE user_id='$id'";
            $res0=mysqli_query($conn,$sql0);
            if($res0==true){
            ?>
            <script>
                alert("password changed successfully");
                window.location.href=history.go(-1);
            </script>
            <?php
            }
        }
    ?>
    <!--change password end-->
     <!--//////////////////////////////////////////-->
      <!--//////////////////////////////////////////-->
       <!--//////////////////////////////////////////-->
    <?php 
        if(isset($_POST['search']) && $_POST['search']!=''){ 
    ?>
    <form class="example" action="/action_page.php" style="margin:auto;max-width:350px;padding-top:5%;border-radius:15px;margin-right:30px;">
        <input type="text" placeholder="&#xF002;&nbsp;&nbsp;<?php echo $_POST['search']; ?>" name="search" style="border-radius:15px;font-family:Arial, FontAwesome"/ disabled>
    </form>
    <section class="mt-4 p-4 animate__animated animate__fadeInDown" style="margin-top: 1px;">
        <div class="row">
            <?php 
                $search=$_POST['search'];
                $sql1="SELECT * FROM tbl_rooms WHERE room_name LIKE '%$search%' OR description LIKE '%$search%'";
                $res1=mysqli_query($conn,$sql1);
                if($res1==True){
                    $count=mysqli_num_rows($res1);
                    if($count>0){
                        while($row=mysqli_fetch_assoc($res1)){
                            $room_id = $row['room_id'];
                            $room_number = $row['room_number'];
                            $room_name=$row['room_name'];
                            $location=$row['location'];
                            $description=$row['description'];
                            $img_name=$row['img_name'];
                            $capacity=$row['capacity'];
                            ?>
                            <div class="col-sm col-md-4">
                                    <div class="card mt-2 mb-5 d-block mx-auto zoom" style="width: 70%;border-radius:15px;">
                                        <img src="images/<?php echo $img_name; ?>" class="card-img-top" alt="..." height="215" width="150">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;"><?php echo $room_name; ?></h5>
                                            <p class="card-text" style="text-align: center;">Number: <?php echo $room_number; ?></p>
                                            <p class="card-text" style="text-align: center;">Location: <?php echo $location; ?></p>
                                            <p class="card-text" style="text-align: center;"><?php echo $capacity; ?>&nbsp;maximum</p>
                                            <a class="btn btn-dark d-block mx-auto " style="background-color:rgba(0,22,59,255) !important;" href="admin\bookdate.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id; ?>" role="button">Book Now</a>
                                        </div>
                                    </div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                           <div class="col-sm col-md-4" style="margin:auto;display:block;">
                                    <div class="card mt-2 mb-5 d-block mx-auto zoom" style="width: 70%;">
                                        <img src="images/image-not-found.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;">Oops!Your search is not available</h5>
                                            <a href="#" onClick='window.location.href="home.php?id=<?php echo $id; ?>"' class="btn btn-dark d-block mx-auto " style="background-color:#d04622;" data-bs-toggle="modal">Back</a>
                                        </div>
                                    </div>
                            </div> 
                        <?php
                    }
                }
            }else{
                ?>
                <script>
                    alert("No Such Search Found!!");
                    window.location.href='home.php?id=<?php echo $id; ?>';
                </script>
                <?php
            }
            ?>
        </div>
    </section>
    <!--model 2 ends-->
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
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Book Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Name:<?php echo $room_name; ?><br><br> Location:<?php echo $location; ?><br><br> Description:<?php echo $description; ?><br><br>Capacity -<?php echo $capacity; ?><br><br>
                <label for="date">Date: </label>
                <input type="date" name="date">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Proceed</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Book Now</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Name: Hall-1 <br><br> Location: Block A <br><br> Description: Capacity - 60 <br><br> Date: 26/09/2021 <br><br>
                <label for="slot">Slot: </label>
                <input type="time" name="slot">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Book
              </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Booking Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your Slot has been Successfully Booked.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>