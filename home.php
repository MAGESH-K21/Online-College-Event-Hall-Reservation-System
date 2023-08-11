<?php include('config/constants.php');?>
<?php include('config/logincheck.php');$id=$_GET['id'];?>
<!DOCTYPE html>
<html lang="en">

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
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  
    <!-- FontAwesome JS-->
	<script defer src="assets/fontawesome/js/all.min.js"></script>
       
  <!-- Theme CSS -->  
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills&display=swap" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<body style="background-image:url('admin/assets/img/background.jpg');width:100%;height:100%;background-size:cover;background-repeat:no-repeat;">
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" >
    <div class="container d-flex align-items-center justify-content-between" >

      <h1 class="logo "><a href="home.php?id=<?php echo $id; ?>">Emisha</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="#bookings">Booking details</a></li>
          <li><a class="nav-link scrollto " href="#" data-bs-toggle="modal" data-bs-target="#info">Info</a></li>
          <li class="dropdown"><a href="#"><i class="fa fa-user" style="font-size:26px"></i>&nbsp;&nbsp;<?php echo $user_name; ?><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="" data-bs-toggle="modal" data-bs-target="#changepassword"> &#x1F511;Change Password</a></li>
              <li><a href="admin/logout.php"> &#x1F511;logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("header").style.height= "50px";
    document.getElementById("header").getElementsByTagName("h1").getElementsByTagName("a").style.fontSize = "32px";
  } else {
    document.getElementById("header").style.height = "80px";
    document.getElementById("header").getElementsByTagName("h1").getElementsByTagName("a").style.fontSize = "10px";
  }
}
  </script>
  <div class="animate__animated animate__fadeInDown" id="collegeview" style="width:100vw;margin:auto;display:block;margin-top:7%;">
  <div id="searchbar">
  <form class="example" style="margin:auto;max-width:700px;" autocomplete="off" action="searchhistory.php?id=<?php echo $id; ?>" method="POST">
    <div class="autocomplete align-center" style="width:100%;margin-bottom:1%;">
      <input id="myInput" type="search" name="search" placeholder="Enter Room Name"  style="width:88%; background-color:white;border:1px solid gray;">
      <input id="myInput" type="hidden" name="id" value="<?php echo $id; ?>" placeholder="Enter the Rooms">
      <button id="myBtn" style="padding:10px;width:11%; !important;background-color:rgba(0,22,59,255) !important;color:white;display:inline;float:right;"><i class="fa fa-search"></i></button>
    </div>
  </form>
  </div>
  <div style="width:90%;height:600px;margin:auto;">
    <div style="float:right;margin-bottom:1% !important;">
        <div class="button-box1" style="background-color: grey">
          <div id="btn1" style="background-color: rgba(0,22,59,255) !important"></div>
          <button type="button" class="toggle-btn1" onclick="cad()" style="color:white;margin-left:7px !important;">Cad</button>
          <button type="button" class="toggle-btn1" onclick="aerial()" style="color:white;margin-left:3px !important;">&nbsp;&nbsp;&nbsp;Aerial</button>
        </div>
    </div>
    <div id="img" class="input-grouphome">
      <iframe src='https://sairamtap196.autodesk360.com/shares/public/SH919a0QTf3c32634dcff4e14ad133d44608?mode=embed' width='100%' height='600' allowfullscreen='true' webkitallowfullscreen='true' mozallowfullscreen='true'  frameborder='0' style='border-radius:15px;'></iframe>
    </div>
    <!--===================================================Book now===================================================-->
</div>
    <br>
      <!--===================================================Book now===================================================-->
  </div>
  <script>
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    function cad(){
      document.getElementById("btn1").style.transform='translateX(0px)';
      document.getElementById("img").innerHTML="<iframe src='https://sairamtap196.autodesk360.com/shares/public/SH919a0QTf3c32634dcff4e14ad133d44608?mode=embed' class='w-100' height='600' frameborder='0' allowfullscreen='' style='border-radius:15px;'></iframe>"
    }
    function aerial(){
        document.getElementById("btn1").style.transform='translateX(90px)';
        document.getElementById("img").innerHTML="<iframe src='https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sin!4v1448012719332!6m8!1m7!1sw3Irmajzt-wAAAQq2a2trw!2m2!1d12.96016306321714!2d80.05744112091281!3f310.8530991914611!4f-7.54790807555149!5f0.7820865974627469' class='w-100' height='600' frameborder='0' allowfullscreen='' style='border-radius:15px;'></iframe>"
    }
</script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" onclick="unhide()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--form in search box-->
            <form autocomplete="off" action="searchhistory.php?id=<?php echo $id; ?>" method="POST">
              <div class="autocomplete align-center" style="width:100%;margin-bottom:1%;">
                  <input id="myInput" type="search" name="search" placeholder="Enter Room Name"  style="width:88%;">
                  <input id="myInput" type="hidden" name="id" value="<?php echo $id; ?>" placeholder="Enter the Rooms">
                  <button id="myBtn" style="padding:7px;width:11%;margin-left:0% !important;background-color:rgba(0,22,59,255) !important;color:white;display:inline;"><i class="fa fa-search"></i></button>
              </div>
            </form>
          <!--form end in serach box-->            
          </div>
        </div>
      </div>
    </div>

    <script>
      var input = document.getElementById("myInput");
      input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
          event.preventDefault();
          document.getElementById("myBtn").click();
      }
      });
      function hide(){
      document.getElementById("searchbar").style.visibility = "hidden";
      }
      function unhide(){
      document.getElementById("searchbar").style.visibility = "visible";
      }  
    </script>
    
    <!--//////////////////////////////////////////-->
     <!--//////////////////////////////////////////-->
      <!--//////////////////////////////////////////-->
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
                <input type="text" id="myInput" name="currentpassword" style="padding:1%;width:40%"><br><br>
                <label for="newpassword" style="font-size: 110%;margin-right:10px">New Password: </label>
                <input type="text" id="myInput" name="newpassword" style="padding:1%;width:40%"><br><br>
                <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
                <button style="border-radius:10px;background-color: rgba(0,22,59,255);color:white;padding:7px;float:right;margin-right:10px;" name="ChangePassword">Change</button>
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
            $current_password = md5($current_password);
            $new_password=$_POST["newpassword"];
            $new_password=md5($new_password);
            $s = "SELECT * FROM tbl_user WHERE user_id=$id";
            $r = $conn->query($s);
            $row = $r->fetch_assoc();
            $p = $row['user_password'];
            if($current_password==$p){
              $sql0="UPDATE tbl_user SET user_password='$new_password' WHERE user_id='$id'";
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
     <!--//////////////////////////////////////////-->
      <!--//////////////////////////////////////////-->
       <!--//////////////////////////////////////////-->
    <!--modal 2-->
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Personal Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table>
              <tr>
                <td>Name:</td>
                <td><?php echo $user_name; ?></td>
              </tr>
              <tr>
                <td>Dept:</td>
                <td><?php echo $user_dept; ?></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><?php echo $user_email; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!--==================================================-->
    <!--==================================================-->
    <!--==================================================-->
    <!--==================================================-->
    <!--==================================================-->
    <!--Booking Section-->
        <br>
    <div style="width:90%;margin:auto;display:block;margin-top:3%;" id="bookings">
      <h2 class="animate__animated animate__fadeInDown" style="color:black;margin-left:40%;">&nbsp;BOOKING DETAILS</h2>
      <table class="table table-hover animate__animated animate__fadeInDown" style="background-color:whitesmoke;margin-top:1%;">
        <thead>
          <tr style="width:70px;">
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Sr No</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Booking ID</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Room Name</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Date</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Starting Time</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Ending Time</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              $sql="SELECT * FROM tbl_book_history WHERE user_id='$id' AND status!='UserCancelled' ORDER BY date DESC, start_time";
              $res=mysqli_query($conn,$sql);
              if($res==True){
                $count=mysqli_num_rows($res);
                if($count>0){
                  $i=1;
                  while($row=mysqli_fetch_assoc($res)){
                    $bookid=$row['book_id'];
                    $book_num = $row['book_num'];
                    $room_id=$row['room_id'];
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
                        <tr>
                          <th scope="row"><?php echo $i++; ?></th>
                          <td><?php echo $book_num; ?></td>
                          <td><?php echo $room_name; ?></td>
                          <td><?php echo date_format($date1,"d/m/Y"); ?></td>
                          <td><?php echo $start_time; ?></td>
                          <td><?php echo $end_time; ?></td>
                          <?php 
                          if($status=='Cancelled'){ ?>
                            <td><button class="btn btn-sm delBtn ms-2 border" disabled>Cancelled</button></td>
                          <?php }
                          else {
                            date_default_timezone_set("Asia/kolkata");
                            $currentDate = date("Y-m-d");
                            $currentTime = date("H:i:s");
                            $now = new DateTime($currentDate.' '.$currentTime);
                            $datetime1 = new DateTime($date.' '.$start_time);
                              if($datetime1>$now){
                                ?>
                                  <td><button class="btn btn-sm delBtn ms-2 border border-danger bg-danger" data-bs-toggle="modal" data-bs-target="#cancelbooking" onClick="f(<?php echo $bookid; ?>)"><i class="bi bi-trash"></i>Cancel</button></td>
                                <?php
                              }else{
                                ?>
                                  <td><button class="btn btn-sm delBtn ms-2 border" disabled>Expired</button></td>
                                <?php
                              }
                            }
                          ?>
                        </tr>
                    <?php
                  }
                }else{
                  ?>
                    <tr>
                      <td colspan=6 style="text-align: center; vertical-align: middle;font-weight:bold;">No Bookings Yet</td>
                    </tr>
                  <?php
                }
              }

          ?>
        </body>
      </table>
  </div>
  <?php
    if(isset($_GET['book_id'])){
      $bookid=$_GET['book_id'];
      $sql4="UPDATE tbl_book_history SET status='UserCancelled' WHERE book_id='$bookid'";
      $res4=mysqli_query($conn,$sql4);
      if($res4==True){
        ?>
        <script>
          window.location.href='home.php?id=<?php echo $id; ?>';
        </script>
        <?php
      }
    }

  ?>
  <div class="modal fade" id="cancelbooking" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to Cancel?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.href='home.php?id=<?php echo $id; ?>&book_id='+ bookid">Yes</button>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
      let bookid=0;
      function f(a){
        bookid=a;
      }

    </script>
  <!--=======================================================================================================-->
  <!--=======================================================================================================-->
  <!--=======================================================================================================-->
  <!--=======================================================================================================-->
  <!--=======================================================================================================-->
  <!--Booking Section ends-->
<script>
    function autocomplete(inp, arr) {
      /*the autocomplete function takes two arguments,
      the text field element and an array of possible autocompleted values:*/
      var currentFocus;
      /*execute a function when someone writes in the text field:*/
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          /*close any already open lists of autocompleted values*/
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          /*create a DIV element that will contain the items (values):*/
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          /*append the DIV element as a child of the autocomplete container:*/
          this.parentNode.appendChild(a);
          /*for each item in the array...*/
          for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              /*create a DIV element for each matching element:*/
              b = document.createElement("DIV");
              /*make the matching letters bold:*/
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              /*insert a input field that will hold the current array item's value:*/
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
                  /*insert the value for the autocomplete text field:*/
                  inp.value =this.getElementsByTagName("input")[0].value;
                  /*close the list of autocompleted values,
                  (or any other open lists of autocompleted values:*/
                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });
      /*execute a function presses a key on the keyboard:*/
      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
          } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      /*execute a function when someone clicks in the document:*/
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }
    
    /*An array containing all the country names in the world:*/
    var countries = [];
    <?php 
    $sql = "SELECT * FROM tbl_rooms";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        ?>
        countries.push('<?php echo $row['room_name']; ?>');
        <?php 
      }
    }
    ?>

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    autocomplete(document.getElementById("myInput"), countries);
    </script>
  <!--===========================================Script tags======================================-->
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