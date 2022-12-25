<?php
include "setting.php";

$sql = "SELECT * FROM article";

$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $sql)) {
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while ($row = mysqli_fetch_assoc($result)) {
        $id_article = $row['article_id'];
        $name = $row['article_name'];
        $img = $row['photo'];
        $price = $row['price'];

        echo '  <div  type="button" id="'.$id_article.'" onclick="addCart'.$id_article.'()" >  
                <div style="cursor:pointer;" class="card mr-3">
                <img class="card-img-top" src="images/'.$img.'" alt="Card image cap">
                <div class="card-body">
                    <h4 class="text-center">'.$name.'</h4><br>
                    <h5 class="text-center">'.$price.' dhs </h5>
                    <input id="productId'.$id_article.'" type="hidden" value="'.$id_article.'">
                    <input id="productPrice'.$id_article.'" type="hidden" value="'.$price.'">
                    <input id="productName'.$id_article.'" type="hidden" value="'.$name.'">
                </div>
              </div>
            </div>
            
            <div class="alert alert-warning alert-dismissible fade show" 
            style=" display: none; position: absolute; top: 55px; left:600px" id="productSuccess'.$id_article.'" role="alert">
'.$name.' added successfully
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>';

        echo '<script>
    function addCart'.$id_article.'(){
        var id = $("#productId'.$id_article.'").val();
        var name = $("#productName'.$id_article.'").val();
        var price = $("#productPrice'.$id_article.'").val();
        var submit = "submit";
        var formData = new FormData();
        formData.append("id", id);
        formData.append("name", name);
        formData.append("price", price);
        formData.append("submit", submit);
        $.ajax({
            url: "addToTable.php",
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
               $("#productSuccess'.$id_article.'").css("display","block");
                setTimeout(function(){ $("#productSuccess'.$id_article.'").css("display","none")},1300);
            }
        });
            }
        });
    }
</script>';
    }
}




