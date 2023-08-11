<?php include('navbar.php'); 
$roomid=$roomname=$location=$roomimage='';
$errors=array('roomid'=>'','roomname'=>'','location'=>'','roomimage'=>'','other'=>'');

if(isset($_GET['room_id'])){
    $rid = $_GET['room_id'];
    $sql = "DELETE FROM tbl_rooms WHERE room_id = $rid";
    $result = $conn->query($sql);
    $img_name=$_GET['img_name'];
    $path="../images/".$img_name;
    $remove=unlink($path);
}

if(isset($_POST['submit'])){
    if(empty($_POST['roomname'])){
        $errors['roomname']="Enter the roomname field";
    }
    else{
        $roomname=$_POST['roomname'];
    }
    if(empty($_POST['roomnum'])){
        $errors['roomnum']="Enter the roomnum field";
    }
    else{
        $roomnum=$_POST['roomnum'];
    }
    if(empty($_POST['location'])){
        $errors['location']="Enter the Location";
    }
    else{
        $location=$_POST['location'];
    }
    if(empty($_POST['roomid'])){
        $errors['roomid']="Enter the roomid field";
    }
    else{
        $roomid=$_POST['roomid'];
    }
    $capacity=$_POST['capacity'];
    $description=$_POST['description'];
    $query="INSERT INTO tbl_rooms(room_name,capacity,location,description,room_number) VALUES('$roomname','$capacity','$location','$description','$roomnum')";
    $result = mysqli_query($conn, $query);
    if(!$result){ ?>
    <script>alert("Already Exisits");</script>
    <?php 
    }
    else{
    $filename = $_FILES["imgfile"]["name"];
    $ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));

    $query1="SELECT * FROM tbl_rooms WHERE room_number='$roomnum'";
    $result1 = mysqli_query($conn, $query1);
    $row=mysqli_fetch_assoc($result1);
    $roomid=$row['room_id'];
    $filename=$roomid.'.'.$ext;
    $tempname = $_FILES["imgfile"]["tmp_name"];  
    $folder = "../images/".$filename;
    $upload=move_uploaded_file($tempname,$folder);
    $query2="UPDATE tbl_rooms SET img_name='$filename' WHERE room_id='$roomid'";
    $result2=mysqli_query($conn,$query2);
    if(!$result2){
        echo "Error".mysqli_error($conn);
    }
}
}


?>
<head>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel">Add Rooms</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="rooms.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" placeholder="Roomname" name="roomname" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" class="form-label">Room Number</span>
                        <input type="text" class="form-control" placeholder="RoomNumber" name="roomnum" value="" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Capacity</span>
                        <input type="text" class="form-control" placeholder="Capacity" name="capacity" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Location</span>
                        <input type="text" class="form-control" placeholder="Location" name="location" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Description</span>
                        <input type="text" class="form-control" placeholder="Description" name="description" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" class="form-label">Image</span>
                        <input type="file" class="form-control" placeholder="Roomimage" name="imgfile" value="" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn" value="Add" name="submit" style="background-color: rgba(0,22,59,255) !important;color:white">
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="controlBtn">
        <a href="" class="btn btn-lg addBtn animate__animated animate__fadeInUp" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" style="background-color:rgba(0,22,59,255) !important;">Add Rooms</a>
    </div>

    <section class="mt-1 p-4 animate__animated animate__fadeInDown">
        <div class="row">
        <?php 
                $sql1="SELECT * FROM tbl_rooms";
                $res1=mysqli_query($conn,$sql1);
                if($res1==True){
                    $count=mysqli_num_rows($res1);
                    if($count>0){
                        while($row=mysqli_fetch_assoc($res1)){
                            $room_id=$row['room_id'];
                            $room_number = $row['room_number'];
                            $room_name=$row['room_name'];
                            $location=$row['location'];
                            $description=$row['description'];
                            $img_name=$row['img_name'];
                            $capacity=$row['capacity'];
                            ?>
                            <div class="col-sm col-md-4 ">
                                    <div class="card mt-2 mb-5 d-block mx-auto zoom-card " style="width: 70%;border:2px solid #487eb0;">
                                        <img src="../images/<?php echo $img_name; ?>" class="card-img-top" alt="..." width="150" height="215">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;"><?php echo $room_name; ?></h5>
                                            <p class="card-text" style="text-align: center;">Number: <?php echo $room_number; ?></p>
                                            <p class="card-text" style="text-align: center;">Location: <?php echo $location; ?></p>
                                            <p class="card-text" style="text-align: center;"><?php echo $capacity; ?>&nbsp;maximum</p>
                                            <button class="btn btn-md d-block editBtn w-100" data-bs-toggle="modal" role="button" onClick="window.location.href='update-rooms.php?id=<?php echo $id;?>&room_id=<?php echo $room_id; ?>'"><i class="bi bi-pencil-square"></i>Edit</button>
                                            <a class="btn btn-md d-block delBtn mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal2" role="button" onclick="f(<?php echo $room_id; ?>,'<?php echo $img_name; ?>')"><i class="bi bi-trash"></i>Delete</a>
                                        </div>
                                    </div>
                            </div>
                            <?php
                        }
                    }else{
                        ?>
                           <div class="col-sm col-md-2" style="margin:auto;display:block;">
                                    <div class="card mt-2 mb-5 d-block mx-auto zoom-card" style="width: 70%;">
                                        <img src="../images/image-not-found.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;">Oops!Your search is not available</h5>
                                            <button onClick="window.location.href='index.php?id=<?php echo $id; ?>'"  class="btn btn-dark d-block mx-auto w-100 " style="background-color: #5c9f25;" data-bs-toggle="modal">Back</button>
                                        </div>
                                    </div>
                            </div> 
                        <?php
                    }
                }
            ?>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?php 
                if(isset($_Post['edit'])){
                    $room_id=$_POST['roomid'];
                }
                ?>
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel1">Update</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Room_Name</span>
                            <input type="text" class="form-control" name="Roomname" value="<?php echo $room_id; ?>" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Room_Name</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Location</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Room_Image</span>
                            <input type="file" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel2">Confirmation</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Do you really want to delete?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn" style="background-color: rgba(0,22,59,255) !important;color:white" data-bs-dismiss="modal" onclick="window.location.href='rooms.php?id=<?php echo $id; ?>&room_id='+ del_id +'&img_name='+del_img;">Yes</button>
                    
                    
                </div>
            </div>
        </div>
    </div>
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

<script>
    let del_id = 0;
    let del_img = '';
    function f(id,name){
        del_id = id;
        del_img = name;
    }
</script>