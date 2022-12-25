<?php
  include("setting.php");
  include("enreg_user.php");
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
    <script src="Biblio/bootst0ap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    -<div class="row" style="margin-left:90;margin-left: 600px;margin-top: 60px;">
     <h3 style="color:white" >Ajouter un nouveau utilisateur</h3>
     <button type="button"  style="margin-left: 30px;height: 38.979166px" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
  Ajouter
</button>
</div>
<!-- Modal -->
<div class="modal fade"  id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau utilisateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="add_user.php" id="addFrm">


       <!-- name -->
      <div class="form-group">
        <label >Nom</label>
          <input name="name" id="name" type="text" class="form-control"  placeholder="Entrer votre nom" />
      </div>

      <!-- address -->
      <div class="form-group ">
        <label >Adresse</label>
          <input name="address" id="address" type="text" class="form-control"  placeholder="Entrer votre addresse" />
      </div>

      <!-- sex -->
      <fieldset class="form-group">
        <legend class="col-form-label col-sm-2 pt-0">Sexe</legend>
        <div class="col-sm-10">
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="sex"
              id="sex"
              checked
              value="homme"
            />
            <label class="form-check-label" > Homme </label>
          </div>
          <div class="form-check form-check-inline">
            <input
              class="form-check-input"
              type="radio"
              name="sex"
              id="sex"
              value="femme"
            />
            <label class="form-check-label" > Femme </label>
          </div>
        </div>
      </fieldset>

      <!-- email -->
      <div class="form-group ">
        <label>Email</label>
        <input type="text" name="email" id="email" class="form-control"  placeholder="Entrer votre email" required="">
      </div>

      <!-- password -->
   <div class="form-group ">
        <label>Password</label>
          <input name="pass" id="pass" type="password" class="form-control"  placeholder="Entrer votre mot de passe" />
      </div>

      <!-- phone -->
      <div class="form-group">
        <label>Telephone</label>
          <input name="phone" id="phone" type="tel" class="form-control" id="inputphone" placeholder="Entrer votre numéro de téléphone" />
      </div>

      <br />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="Submit"  class="btn btn-primary">Enregistrer</button>
      </div>
    </div>
  </div>
</div>


</body>     