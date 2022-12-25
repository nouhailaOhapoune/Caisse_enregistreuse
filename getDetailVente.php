<?php
session_start();
include "setting.php";
$idUser= $_SESSION['id'];
$username= $_SESSION['username'];
$sql = "SELECT * FROM detailvente WHERE idSeller=$idUser";
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $sumTotal = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['detail_id'];
        $price = $row['price'];
        $name = $row['name'];
        $quantity = $row['quantity'];
        $total = $row['total'];
        $sumTotal = $total + $sumTotal;
        echo ' <tr class="text-center">
        <td>' . $name . '</td>
        <td>' . $quantity . '</td>
        <td>' . $price . '</td>
        <td>' . $total . '</td>
        <td >
        <a type="button" onclick=" deleteProduct'.$id.'()" style="color: darkred; cursor: pointer" >Delete</a> 
        <a href="#" data-toggle="modal" onclick="validateProduct'.$id.'()" data-target="#validate_product" type="button" style="color: #1e7e34; cursor: pointer" >Validate</a></td>
    </tr>';









        echo '<script>
            function validateProduct'.$id.'(){
        var id = "'.$id.'";
        var username = "'.$username.'";
        var name = "'.$name.'";
        var quantity = "'.$quantity.'";
        var total = "'.$total.'";
        var userId = "'.$idUser.'"
        $("#formusername").text(username);
        $("#formproductname").text(name);
        $("#formquantity").text(quantity);
        $("#formtotal").text(total);
        $("#hiddenProductId").val(id);
        $("#hiddenUserId").val(userId);
    }
    
    function deleteProduct'.$id.'(){
        var id = "'.$id.'"
        var submit = "submit";
        var formData = new FormData();
        formData.append("id", id);
        formData.append("submit", submit);
        $.ajax({
            url: "deleteProduct.php",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $.ajax({
                    type: "GET",
                    url: "getDetailVente.php",
                    dataType: "html",
                    success: function (data) {
                        $("#myTable").html(data);
                        $("#alertMessage").text("'.$name.' deleted successfully");
                        $("#deleteSuccess").css("display","block");
                        setTimeout(function(){ $("#deleteSuccess").css("display", "none")},1300);
                    }
                });
            }
        });
    }
    

            </script>';
    }
}
?>

<script>
    $("#totalP").text("Total: <?php echo $sumTotal; ?>DH    ");
    var p = document.getElementById("totalP").style.marginRight='50px';
</script>

