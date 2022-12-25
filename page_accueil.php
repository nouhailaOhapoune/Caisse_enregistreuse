<?php
  include("setting.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Biblio/bootstrap.min.css">
    <script src="Biblio/jquery.min.js"></script>
    <script src="Biblio/popper.min.js"></script>
    <script src="Biblio/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles.css">

<title>Caisse enregistreuse</title>

</head>
<body>
  <?php  include("add_user.php"); ?>
  <br><br>

<div class="row" style="margin-left: 50px;">  

  <?php
      $sql = "SELECT * FROM user";
			$resultset = mysqli_query($connection, $sql) or die("database error:". mysqli_error($connection));
      while( $record = mysqli_fetch_assoc($resultset) ) {    
  
      ?> 

<?php 
if( $record['sex']=='femme')   { 
  ?> 
<div class="card" style="margin-top: 100px;">

<a href=<?php echo("user_verification.php?id=".$record['id']);?> >
  <img class="card-img-top" src="images/avatar_femme.png" alt="Card image"></a>
  <div class="container">
    <h4 class="card-title text-center"><?php echo $record['name']; ?></h4>
  </div> 
</div>  
<?php } ?>

<?php 
if($record['sex']=='homme')   { 
  ?> 
<div class="card" style="margin-top: 100px;">

<a href=<?php echo("user_verification.php?id=".$record['id']);?> >
  <img class="card-img-top" src="images/avatar_homme.png" alt="Card image"></a>
  <div class="container">
    <h4 class="card-title text-center"><?php echo $record['name']; ?></h4>
  </div>
</div> 
<?php } ?>

<?php } ?>
</div>
</body>