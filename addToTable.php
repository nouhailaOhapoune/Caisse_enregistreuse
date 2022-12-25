<?php
include_once 'setting.php';
session_start();
$idUser= $_SESSION['id'];

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $success = false;

    $sql = "SELECT * FROM detailvente WHERE detail_id='$id' and idSeller='$idUser'";

    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            $quantity = $row['quantity'];
            $newQuantity = $quantity + 1;
            $newTotal = $price * $newQuantity;
            $sql2 = "UPDATE detailvente SET quantity = '$newQuantity', total='$newTotal' WHERE detail_id=$id AND idSeller=$idUser";
            $stmt2 = mysqli_stmt_init($connection);

            if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                echo '<span class="text-danger">Something went wrong!1</span>';
                exit();
            }
            mysqli_stmt_execute($stmt2);
            mysqli_stmt_close($stmt2);

        } else {
            $sql2 = "INSERT INTO detailvente(detail_id, name, quantity,price,  total, idSeller) VALUES ( ?, ?, ?, ?, ?,?);";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql2)) {
                echo '<span class="text-danger">Something went wrong!</span>';
                exit();
            }
            $quantity = 1;
            mysqli_stmt_bind_param($stmt, "issisi", $id, $name, $quantity, $price, $price, $idUser);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);



            $success = true;
        }

    }

}
?>

<script>
    success = <?php echo $success; ?>
    if(success == true){

    }

</script>
