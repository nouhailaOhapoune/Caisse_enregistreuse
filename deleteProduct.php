<?php
include_once "setting.php";
session_start();
$idUser= $_SESSION["id"];
if(isset($_POST['submit'])) {
    $productId = $_POST['id'];

    $result = mysqli_query($connection, "DELETE FROM detailvente WHERE detail_id=$productId AND idSeller=$idUser");
}

