<?php
session_start();
  include("setting.php");
  $username= $_SESSION["username"];
  $id_user= $_SESSION["id_user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Biblio/bootstrap.min.css">
    <script src="Biblio/jquery.min.js"></script>
    <script src="Biblio/popper.min.js"></script>
    <script src="Biblio/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="article.css">
    <title>eStock</title>
</head>
<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 50%;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  margin-left: 650px
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: gray ;color: black;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: gray;
}
</style>
<body>

<div class="split left">


<i class="fa fa-home" style="color: rgb(255, 255, 255); font-size:30px">   e-boutique </i>
<br><br><br>
<div class=" flex-fill background"  id="table"> 
</div>
<script>
    $.ajax({
        type: "GET",
        url: "detailVente.php",
        dataType: "html",
        success: function (data) {
            $("#table").html(data);
        }
    });
</script>
  <br><br><br>
</div>



<div class="split right">

<div class="dropdown" class="margin-left: 650px">
  <button class="dropbtn"><?php echo $username; ?></button>
  <div class="dropdown-content">
    <a href="page_accueil.php">LOG OUT</a>
  </div>
</div>
    <br><br>
<?php  include("add_article.php"); ?>
  
<div class="row" id="products-container" > 
</div>
<script>
$.ajax({
        type: "GET",
        url: "getProduct.php",
        dataType: "html",
        success: function (data) {
            $("#products-container").html(data);
        }
    });

    $.ajax({
        type: "GET",
        url: "getDetailVente.php",
        dataType: "html",
        success: function (data) {
            $("#myTable").html(data);
        }
    });
    </script>
</div>


<div class="modal fade" id="validate_product">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Validate sale</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p><strong>Seller:</strong> <span id="formusername"></span> <strong class="ml-3">Product:</strong>
                        <span id="formproductname"></span> <strong class="ml-3">Quantity:</strong> <span
                                id="formquantity"></span><br> <strong class="ml-3">Total:</strong>
                                 <span id="formtotal"></span></p>
                </div>
                <div class="form-group">

                </div>
                <input type="hidden" id="hiddenUserId">
                <input type="hidden" id="hiddenProductId">
                <div class="form-group">
                    <label for="client">Client: </label>
                    <input type="text" class="form-control" id="client" placeholder="type the name of the Client"
                           name="client">
                </div>
                <div class="form-group">
                    <label for="pwd">Validation date : </label>
                    <input type="date" class="form-control" id="date" placeholder="type the date"
                           name="date">
                </div>
                <div class="text-center">
                    <button type="submit" onclick="validateSale()" id="submitValidation" name="validate"
                            class="btn btn-primary">Validate
                    </button>
                    <p id="validationMessage" class="mt-3"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function validateSale() {
        name = $("#formproductname").text(); 
        quantity = $("#formquantity").text();
        total = $("#formtotal").text();
        productId = $("#hiddenProductId").val();
        userId = $("#hiddenUserId").val();
        date = $("#date").val();
        clientName = $("#client").val();
        submit = 'submit';

        var formData = new FormData();
        formData.append('name', name);
        formData.append('quantity', quantity);
        formData.append('total', total);
        formData.append('productId', productId);
        formData.append('userId', userId);
        formData.append('date', date);
        formData.append('clientName', clientName);
        formData.append('submit', submit);

        $.ajax({
            url: 'validateProduct.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                $("#validationMessage").html(data);
            }
        });
    } 
    </script>
</body>
</html> 
