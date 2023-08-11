<?php include('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
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
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills&display=swap" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        #btn {
    top: 0;
    left: 0;
    position: absolute;
    width: 130px;
    height: 100%;
    background: #00183e;
    border-radius: 30px;
    transition: .3s;
}
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.php">Emisha</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                  <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background: url(assets/img/slide/slide-1.jpg);background-size:cover;background-repeat:no-repeat;width:100%;">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <div class="banner login animate__animated animate__fadeInDown">
                                    <div class="container">
                                        <div class="banner-info" style="margin-top:100px;">
                                            <div class="container-fluid register"><!--register is the form box-->
                                                <div class="button-box">
                                                    <div id="btn"></div>
                                                    <button type="button" class="toggle-btn" onclick="user()" style="color:white;margin-left:5%">User</button>
                                                    <button type="button" class="toggle-btn" onclick="admin()" style="color:white;margin-left:7%">&nbsp;Admin</button>
                                                </div>
                                                <div class="social-icons">
                                                    <a href="https://www.facebook.com/sairamec/" target="_blank"><img src="assets/img/fblogo.png" alt="fblogo" srcset=""></a>
                                                    <a href="https://twitter.com/sairam_ec?lang=en" target="_blank"><img src="assets/img/twitterlogo.png" alt="twitterlogo" srcset=""></a>
                                                    <a href="https://www.instagram.com/sairamec/?hl=en" target="_blank"><img src="assets/img/instagramlogo.png" alt="googlelogo" srcset=""></a>
                                                </div>
                                                <form id="user" class="input-group" method="POST" autocomplete="off" >
                                                    <div style="display:inline">
                                                        <input type="text" name="email" class="input-field" placeholder="Enter email" style="color:white;width: 55%;float:left; display:inline" required>
                                                        <div style="display:inline; float:right;margin-top:12%;">@sairam.edu.in</div>
                                                    </div>
                                                    <input type="password" visibility="hidden" name="password" class="input-field" placeholder="Enter Password" style="color:white" required>
                                                    <input type="Submit" name="user" class="submit-btn" value="Login" style="color:white;font-weight:bold; background-color:rgba(0,22,59,255);" >
                                                </form>
                                                <form id="admin" class="input-group" method="POST" autocomplete="off">
                                                    <div style="display:inline">
                                                        <input type="text" name="email1" class="input-field" placeholder="Enter email" style="color:white;width: 55%;float:left; display:inline" required>
                                                        <div style="display:inline; float:right;margin-top:12%;">@sairam.edu.in</div>
                                                    </div>
                                                    <input type="password" name="password1" class="input-field" placeholder="Enter Password" style="color:white" required>
                                                    <input type="Submit" name="admin" class="submit-btn" value="Login" style="color:white;font-weight:bold; background-color:rgba(0,22,59,255);">
                                                </form>
                                            </div>
                                        </div>
                                        <script>
                                            var x = document.getElementById("user");
                                            var y = document.getElementById("admin");
                                            var z = document.getElementById("btn");
                                            var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
                                            function admin(){
                                                x.style.left="-400px";
                                                y.style.left="50px";
                                                if(width<=481){
                                                    z.style.left="50%"; 
                                                }else{
                                                    z.style.left="110px";
                                                }
                                            }
                                            function user(){
                                                x.style.left="50px";
                                                y.style.left="450px";
                                                z.style.left="0px";
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
           </div>
        </div>
        <?php 
            if(isset($_POST['user'])){
                $email=$_POST['email'];
                $password=$_POST['password'];
                $password=md5($password);
                $email=$email.'@sairam.edu.in';
                $sql="SELECT * FROM tbl_user WHERE user_email='$email' AND user_password='$password'";
                $res=mysqli_query($conn,$sql);
                if($res==True){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        while($row=mysqli_fetch_assoc($res)){
                            $id=$row['user_id'];
                            ?>
                            <script>
                                window.location.href='home.php?id=<?php echo $id; ?>';
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script>
                            alert("INVALID USERNAME OR PASSWORD!TRY AGAIN LATER");
                        </script>
                        <?php
                    }
                }
            }
            else if(isset($_POST['admin'])){
                $email=$_POST['email1'];
                $password=$_POST['password1'];
                $password=md5($password);
                $email=$email.'@sairam.edu.in';
                $sql="SELECT * FROM tbl_admin WHERE admin_email='$email' AND admin_password='$password'";
                $res=mysqli_query($conn,$sql);
                if($res==True){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        while($row=mysqli_fetch_assoc($res)){
                            $id=$row['admin_id'];
                            ?>
                            <script>
                                window.location.href='admin/index.php?id=<?php echo $id; ?>';
                            </script>
                            <?php
                        }
                    }else{
                        ?>
                        <script>
                            alert("INVALID USERNAME OR PASSWORD!TRY AGAIN LATER");
                        </script>
                        <?php
                    }
                }
            }
        ?>
    </section>
    <!-- End Hero -->

    <!-- Vendor JS Files -->
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