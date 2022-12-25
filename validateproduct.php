<?php

if(isset($_POST['submit'])){
    include_once "setting.php";

    $productName =  $_POST['name'];
    $productId =  $_POST['article_id'];
    $userId= $_GET['id_user'];
    $date =  $_POST['date'];
    $total =  $_POST['total'];
    $quantity =  $_POST['quantity'];
    $clientName =  $_POST['client'];
    $errorEmpty = false;
    $success = false;
    if(empty($clientName) || empty($date) ) {
        $errorEmpty = true;
        echo '<span class="text-danger"> Fill in all fields!</span>';
    }
    else{
        $sql = "INSERT INTO vente(nom,price, quantity, total, dateVente, client,idSeller) VALUES ( ?, ?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($connection);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '<span class="text-danger">Something went wrong!</span>';
        }

        mysqli_stmt_bind_param($stmt, "issssis",$productId, $productName, $quantity, $total, $date, $clientName, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        echo '<span class="text-danger">Sale validated successfully!</span>';

        $result = mysqli_query($connection, "DELETE FROM detailvente WHERE detail_id=$productId AND idSeller=$userId");
        $success = true;
    }
}

?>

<script>
    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var success = "<?php echo $success; ?>";

    if (success == true) {
        $("#date").removeClass("border-danger");
        $("#client").removeClass("border-danger");
        $("#date").val("");
        $("#client").val("");
        $.ajax({
            type: "GET",
            url: "getDetailVente.php",
            dataType: "html",
            success: function (data) {
                $("#myTable").html(data);
            }
        });
    }
    if (errorEmpty == true) {
        $("#date").addClass("border-danger");
        $("#client").addClass("border-danger");

    }
</script>
