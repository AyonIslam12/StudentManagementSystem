<?php 
 require_once "./dbcon.php";
  $id =base64_decode($_GET['id']);
 mysqli_query($connect,"DELETE FROM `studentinfo` WHERE `id` = '$id'");
 header('location: index.php?page=allStudents&deleteMsg=1');
?>