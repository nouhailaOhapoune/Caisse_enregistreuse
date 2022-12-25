<?php
  include("setting.php");
  include("enreg_article.php");
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
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
</head>
<body>
    -<div class="row" style="margin-left: 143px;margin-top: 25px;">
     <h3 style="color:black" >Ajouter un nouveau article</h3>
     <button type="button"  style="margin-left: 30px;height: 38.979166px" class="btn btn-primary" 
     data-toggle="modal" data-target="#ModalCenter">
  Ajouter
</button>
</div>
<!-- Modal -->
<div class="modal fade"  id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="add_article.php" id="addFrm" enctype="multipart/form-data">


       <!-- name -->
      <div class="form-group">
        <label >Nom:</label>
          <input name="article_name" id="article_name" type="text" class="form-control"  placeholder="Entrer le nom de l'article" />
      </div>

      <!-- photo -->
      <div class="form-group">
      <label >Photo de l'article: </label><br>
         <input type="file"
            id="photo" name="photo"
            accept="image/jpg, image/png, image/jpeg"/>
     </div>

      <!-- phone -->
      <div class="form-group">
        <label>Prix: </label>
          <input name="price" id="price" type="text" class="form-control" id="inputprice" placeholder="Entrer le prix de l'article" />
      </div>

      <br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="Submit"  class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>


</body>     