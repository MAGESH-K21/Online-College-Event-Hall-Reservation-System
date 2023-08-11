<?php 
  if(!isset($_GET['id'])){
    ?>
    <script>
      alert("ALERT!BARGED LOGIN!");
      window.location.href="../login.php";
    </script>
    <?php
  }
?>