<?php
include "config.php";

$user_id = $_GET['id'];

$sql = "DELETE FROM `members` WHERE id = '$user_id'";

// echo $sql;
// die();
if($sql){
    mysqli_query($conn , $sql);
    echo "<script>setTimeout(()=>{ window.location.href = 'index.php'; })</script>";
}

?>