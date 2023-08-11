<!-- Modal -->
<?php include('navbar.php')?>
<div class="modal-dialog modal-dialog-centered banner login animate__animated animate__fadeInDown" style="margin-top:7%;">
    <div class="modal-content">
                <?php 
                if(isset($_GET['id'])){
                    $user_id1=$_GET['id'];
                    $sql1="SELECT * FROM tbl_user WHERE user_id='$user_id1'";
                    $res1=mysqli_query($conn,$sql1);
                    if($res1==True){
                        while($row=mysqli_fetch_assoc($res1)){
                            $userid=$row['user_id'];
                            $username=$row['user_name'];
                            $userdept=$row['user_dept'];
                            $useremail=$row['user_email'];
                            $userpassword=$row['user_password'];
                        }
                    }
                }
                ?>
                <div class="modal-header">
                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel1">Update</h5>
                </div>
                <form method="post">
                    <div style="padding:10px;" enctype="multipart/form-data">
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">User_Name</span>
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" aria-describedby="basic-addon1" style="display:inline !important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">User_Dept</span>
                            <input type="text" class="form-control"  name="userdept" value="<?php echo $userdept; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">User_Email</span>
                            <input type="text" class="form-control" name="useremail" value="<?php echo $useremail; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                        <div class="mb-3">
                            <span class="input-group-text" id="basic-addon1" style="display:inline!important;margin-right:0px;">Password</span>
                            <input type="text" class="form-control" name="userpass" value="<?php echo $userpassword; ?>" aria-describedby="basic-addon1" style="display:inline!important;width:70%;"/>
                        </div>
                    </div>
                    <div style="float:right;margin:10px;">
                    <a class="btn btn-secondary"  href='users.php?id=<?php echo $id; ?>'>Cancel</a>
                        <input type="submit" class="btn" value="Update" name="update" style="background-color: rgba(0,22,59,255) !important;color:white">
                        <input type="hidden" name="userid" value="<?php echo $user_id1; ?>">

                    </div>
                </form>
                <?php 
                    if(isset($_POST['update'])){
                        $userid1=$_POST['userid'];
                        $username1=$_POST['username'];
                        $userdept1=$_POST['userdept'];
                        $useremail1=$_POST['useremail'];
                        $userpass1=md5($_POST['userpass']);
                        $sql2="UPDATE tbl_user SET 
                        user_name='$username1',
                        user_dept='$userdept1',
                        user_email='$useremail1',
                        user_password='$userpass1' WHERE user_id='$user_id1'";
                        $res2=mysqli_query($conn,$sql2);
                        //echo $sql2;
                        if($res2==True){
                            ?>
                            <script>
                                alert("User Updated Successfully");
                                window.location.href="users.php?id=<?php echo $userid1; ?>";
                            </script>
                            <?php
                        }
                        else{
                            ?>
                            <script>
                                alert("Already exists");
                                window.location.href="update-users.php?id=<?php echo $user_id1; ?>";
                            </script>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
</body>
</html>
