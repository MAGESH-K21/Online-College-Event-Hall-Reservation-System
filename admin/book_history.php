<?php 
include('navbar.php'); 
$id = $_GET['id'];
if(isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    $sql = "UPDATE tbl_book_history SET status='Cancelled' WHERE book_id=$del_id";
    $result = $conn->query($sql);
}
if(isset($_GET['del_past'])){
  $date1 = $_GET['del_past'];
  $sql = "DELETE FROM tbl_book_history WHERE date<='$date1'";
  $result = $conn->query($sql);
}
$str = "All Bookings";
if(isset($_GET['filter'])){
  $filter = $_GET['filter'];
  if($filter=='Today')
  $str = "This day Bookings";
  elseif($filter=='Week')
  $str = "This Week Bookings";
  elseif($filter=='Month')
  $str = "This Month Bookings";
  elseif($filter=='User')
  $str = "User Cancelled Bookings";
  elseif($filter=='Admin')
  $str = "Admin Cancelled Bookings";

}
?>
    <!-- End Header -->
    <head>
<meta http-equiv="refresh" content="100">
<style>
body {
  margin-top: 0%;
}

@media only screen and (max-width: 450px) {
  body {
    margin-top: 10%;
  }
}
@media only screen and (min-width: 450px) and (max-width: 750px) {
  body {
    margin-top: 0%;
  }
}
@media only screen and (min-width: 750px) and (max-width: 1050px) {
  body {
    margin-top: 10%;
  }
}
@media only screen and (min-width: 1050px) and (max-width: 1370px) {
  body {
    margin-top: 5%;
  }
}
</style>
</head>
    <br><br><br><br>
    <h1 style="text-align: center;"><?php echo $str; ?></h1>
  <div style="display: inline">
  <a>
  <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-left: 75px;"><i class="bi bi-trash"></i> Delete</a>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel">Delete</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                <br>
                <?php
                  date_default_timezone_set("Asia/kolkata");
                  $currentDate = date("Y-m-d"); 
                ?>
                <div style="display:inline">
                    <p style="display:inline;float:left;font-size: 130%">Delete Records dated till:</p>
                    <div style="display:inline;float:right; margin-right: 5%; height:20%"> <input type=date name="deldate" max="<?php echo $currentDate; ?>"> </div>
                  <br>
                </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger" value="Delete" name="submitdel"> 
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_POST['submitdel'])){
          $date = $_POST['deldate'];
          ?>
          <script>window.location.href='book_history.php?id=<?php echo $id; ?>&del_past=<?php echo $date; ?>';</script>
          <?php 
        }
    ?>
    <div class="dropdown pull-right mb-2" style="margin-top:2px;">
        <button class="btn btn-md dropdown-btn dropdown-toggle animate__animated animate__fadeInUp" style="background-color:rgba(0,22,59,255) !important" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Filters
            </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>&filter=Today">Today</a></li>
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>&filter=Week">This Week</a></li>
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>&filter=Month">This Month</a></li>
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>&filter=User">User Cancelled</a></li>
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>&filter=Admin">Admin Cancelled</a></li>
            <li><a class="dropdown-item" href="book_history.php?id=<?php echo $id; ?>">All</a></li>
        </ul>
    </div>
</div>
    

    <div style="width:90%;margin:auto;display:block;margin-top:3%;" id="bookings">
      <table class="table table-hover animate__animated animate__fadeInDown" style="background-color:whitesmoke;">
        <thead>
          <tr style="width:70px;">
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Sno</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Booking ID</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">User Name</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Room Name</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Date</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Starting Time</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Ending Time</th>
            <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
              $sql="SELECT * FROM tbl_book_history ORDER BY date DESC, start_time";
              if(isset($_GET['filter'])){
                $filter = $_GET['filter'];
                if($filter == 'Today'){
                    date_default_timezone_set("Asia/kolkata");
                    $currentDate = date("Y-m-d");
                    $sql="SELECT * FROM tbl_book_history WHERE date='$currentDate' AND status='Booked' ORDER BY start_time";
                }
                if($filter == 'Week'){
                    $sql = "SELECT * FROM tbl_book_history WHERE week(date)=week(now()) AND status='Booked' ORDER BY date DESC,start_time";                    
                }
                if($filter == 'Month'){
                    $sql="SELECT * FROM tbl_book_history WHERE MONTH(date)=MONTH(CURRENT_DATE()) AND YEAR(date)=YEAR(CURRENT_DATE()) AND status='Booked' ORDER BY date DESC,start_time";                      
                }
                if($filter == 'User'){
                  $sql="SELECT * FROM tbl_book_history WHERE status='UserCancelled' ORDER BY date DESC,start_time";                      
                }
                if($filter == 'Admin'){
                  $sql="SELECT * FROM tbl_book_history WHERE status='Cancelled' ORDER BY date DESC,start_time";
                }
              }
              $res=mysqli_query($conn,$sql);
              if($res==True){
                $count=mysqli_num_rows($res);
                if($count>0){
                  $i=1;
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
                        <tr>
                          <th scope="row"><?php echo $i++; ?></th>
                          <td><?php echo $book_num; ?></td>
                          <td><?php echo $user_name; ?></td>
                          <td><?php echo $room_name; ?></td>
                          <td><?php echo date_format($date1,"d/m/Y"); ?></td>
                          <td><?php echo $start_time; ?></td>
                          <td><?php echo $end_time; ?></td>
                          <?php 
                          if($status=='Cancelled' || $status=='UserCancelled'){ ?>
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
        </tbody>
      </table>
  </div>
  <?php
    if(isset($_GET['book_id'])){
      $bookid=$_GET['book_id'];
      $sql4="DELETE FROM tbl_book_history WHERE book_id='$bookid'";
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="window.location.href='book_history.php?id=<?php echo $id; ?>&del_id='+ bookid">Yes</button>
                    
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


    <!-- Vendor JS Files -->
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>