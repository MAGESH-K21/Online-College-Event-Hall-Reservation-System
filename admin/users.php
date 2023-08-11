<?php include('navbar.php');
$userid=$username=$userdept=$useremail=$userpass='';
$errors=array('userid'=>'','username'=>'','userdept'=>'','useremail'=>'','userpass'=>'','other'=>'');

if(isset($_GET['user_id'])){
    $uid = $_GET['user_id'];
    $sql = "DELETE FROM tbl_user WHERE user_id = $uid";
    $result = $conn->query($sql);
}
if(isset($_POST['submit'])){
    if(empty($_POST['username'])){
        $errors['username']="Enter the username field";
    }
    else{
        $username=$_POST['username'];
        if(!preg_match('/^[a-zA-Z\s]+$/',$username)){
            $errors['username']="Username must contain only alphabets and spaces";
        }
    }
    if(empty($_POST['useremail'])){
        $errors['useremail']="Enter the email field";
    }
    else{
        $useremail=$_POST['useremail'];
    }
    if(empty($_POST['userdept'])){
        $errors['userdept']="Enter the Department Field";
    }
    else{
        $userdept=$_POST['userdept'];
    }
    if(empty($_POST['userpass'])){
        $errors['userpass']="Enter the password field";
    }
    else{
        $userpass=$_POST['userpass'];
        $userpass = md5($userpass);
    }
    $query="INSERT INTO tbl_user(user_name,user_email,user_dept,user_password) VALUES('$username','$useremail','$userdept','$userpass')";
    $result = mysqli_query($conn, $query);
    if(!$result){
        ?>
        <script>
            alert("Already Exists");
            window.location.href="users.php?id=<?php echo $id; ?>";
        </script>
    <?php
    }
}
$sql="SELECT * FROM tbl_user";
$res=mysqli_query($conn,$sql);
$records=mysqli_fetch_all($res,MYSQLI_ASSOC);

?>
<head>
<style>
body {
  margin-top: 0%;
}

@media only screen and (max-width: 450px) {
  body {
    margin-top: 20%;
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title fw-bold heading" id="exampleModalLabel" >Add Users</h5>
                    

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="users.php?id=<?php echo $id;?>" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text" class="form-control" name="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Department</span>
                            <input type="text" class="form-control" name="userdept" placeholder="UserDept" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="email" class="form-control" name="useremail" placeholder="UserEmail" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Password</span>
                            <input type="password" class="form-control" name="userpass" value="sairam" placeholder="UserPassword" aria-label="Username" aria-describedby="basic-addon1">
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
        <a  href="" class="btn btn-lg btn-primary addBtn animate__animated animate__fadeInUp" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button" style="background-color:rgba(0,22,59,255) !important;">Add Users</a>
        <br>
    </div>
    <div class="container user-container">
        <table class="table table-striped table-hover text-center animate__animated animate__fadeInDown" style="background-color:whitesmoke;">
            <thead>
                <tr>
                    <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">User_Id</th>
                    <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">User_Name</th>
                    <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">User_Dept</th>
                    <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">User_Email</th>
                    <th scope="col" class="table-dark" style="background-color: rgba(0,22,59,255) !important;">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $f=1;foreach($records as $i):?>
                    <tr>
                    <td><?php echo $f++; ?></td>
                        <td><?php echo $i['user_name']?></td>
                        <td><?php echo $i['user_dept']?></td>
                        <td><?php echo $i['user_email']?></td>
                    <td>
                        <a href='update-users.php?id=<?php echo $i['user_id']; ?>' class="btn btn-sm editBtn"  role="button"><i class="bi bi-pencil-square"></i>Edit</a>
                        <a href="#exampleModal2" class="btn btn-sm delBtn ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal2" role="button" onclick="f(<?php echo $i['user_id']; ?>)"><i class="bi bi-trash"></i>Delete</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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
                    <button type="button" class="btn" style="background-color: rgba(0,22,59,255) !important;color:white" data-bs-dismiss="modal" onclick="window.location.href='users.php?id=<?php echo $id; ?>&user_id='+ del_id ;">Yes</button>
                    
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
    function f(id){
        del_id = id;
    }
</script>