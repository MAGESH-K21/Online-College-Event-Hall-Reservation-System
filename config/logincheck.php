<?php 
  if(!isset($_GET['id'])){
    ?>
    <script>
      alert("ALERT!BARGED LOGIN!");
      window.location.href="login.php";
    </script>
    <?php
  }else{
    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_user WHERE user_id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res==True){
      while($row=mysqli_fetch_assoc($res)){
        $user_name=$row['user_name'];
        $user_dept=$row['user_dept'];
        $user_email=$row['user_email'];
        $user_password=$row['user_password'];
      }
    }
  }
?>