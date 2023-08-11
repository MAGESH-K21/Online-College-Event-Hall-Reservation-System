<!-- Modal -->
<?php include('navbar.php')?>
<div class="modal-dialog modal-dialog-centered banner login animate__animated animate__fadeInDown" style="margin-top:7%;">
    <div class="modal-content">
                <?php 
                if(isset($_GET['room_id'])){
                    $room_id1=$_GET['room_id'];
                    $sql1="SELECT * FROM tbl_rooms WHERE room_id='$room_id1'";
                    $res1=mysqli_query($conn,$sql1);
                    if($res1==True){
                        while($row=mysqli_fetch_assoc($res1)){
                            $room_name=$row['room_name'];
                            $room_number=$row['room_number'];
                            $capacity=$row['capacity'];
                            $location=$row['location'];
                            $description=$row['description'];
                            $img_name=$row['img_name'];
                        }
                    }
                }
                ?>
                <div class="modal-header">
                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel1">Update</h5>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div style="padding:10px;">
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room Name</span>
                            <input type="text" class="form-control" name="roomname" value="<?php echo $room_name; ?>" aria-describedby="basic-addon1" style="display:inline !important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room Number</span>
                            <input type="text" class="form-control" name="roomnum" value="<?php echo $room_number; ?>" aria-describedby="basic-addon1" style="display:inline !important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Location</span>
                            <input type="text" class="form-control"  name="Location" value="<?php echo $location; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Capacity</span>
                            <input type="text" class="form-control" name="Capacity" value="<?php echo $capacity; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Description</span>
                            <input type="text" class="form-control" name="Description" value="<?php echo $description; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Current image</span>
                            <span style="display:inline!important;width:70%;"><img src="../images/<?php echo $img_name; ?>" alt="<?php echo $img_name; ?>" width="150px" height="150px" style="margin:auto;display:block;"></img></span>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Room_Image</span>
                            <input type="file" class="form-control" placeholder="Roomimage" name="image" value="" style="display:inline!important;width:70%;"/>
                        </div>
                    </div>
                    <div style="float:right;margin:10px;">
                    <a class="btn btn-secondary"  href='rooms.php?id=<?php echo $id; ?>'>Cancel</a>
                        <input type="Submit" value="Update" class="btn" name="update" style="background-color: rgba(0,22,59,255) !important;color:white">
                        <input type="hidden" name="roomid" value="<?php echo $room_id1; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $img_name; ?>">

                    </div>
                </form>
                <?php 
                    if(isset($_POST['update'])){
                        $room_id=$_POST['roomid'];
                        $roomname1=$_POST['roomname'];
                        $roomnum1=$_POST['roomnum'];
                        $location1=$_POST['Location'];
                        $capacity1=$_POST['Capacity'];
                        $description1=$_POST['Description'];
                        $current_image=$_POST['current_image'];
                        if(isset($_FILES["image"]["name"])){
                            $image_name=$_FILES['image']['name'];
                            //echo $image_name;
                            if($image_name!=''){
                                $path="../images/".$current_image;
                                $remove=unlink($path);
                                $ext=strtolower(pathinfo($image_name,PATHINFO_EXTENSION));
                                $image_name=$room_id.'.'.$ext;
                                $source=$_FILES['image']['tmp_name'];
                                $destination='../images/'.$image_name;
                                $upload=move_uploaded_file($source,$destination);
                            }else{
                                $image_name=$current_image;
                            }
                        }else{
                            $image_name=$current_image;
                        }
                        $sql2="UPDATE tbl_rooms SET 
                        room_name='$roomname1',
                        capacity='$capacity1',
                        location='$location1',
                        description='$description1',
                        room_number='$roomnum1',
                        img_name='$image_name' WHERE room_id='$room_id'";
                        $res1=mysqli_query($conn,$sql2);
                        //echo $sql2;
                        if($res1==True){
                            ?>
                            <script>
                                alert("Updated Successfully");
                                window.location.href="rooms.php?id=<?php echo $id; ?>"
                            </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                alert("Already Exists");
                                window.location.href="update-rooms.php?id=<?php echo $id; ?>&room_id=<?php echo $room_id1; ?>";
                            </script>
                            <?php

                        }
                    }
                ?>
            </div>
        </div>
</body>
</html>
