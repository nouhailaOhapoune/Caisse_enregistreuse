<?php
 include("setting.php");
 $id= $_GET["id"];
 $sql=" SELECT password ,name FROM user WHERE id =' $id'";

$result= mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$username=$row["name"];
$pass=$row["password"];

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
<link rel="stylesheet" type="text/css" href="user_ver.css">
    <title>User verification</title>

    <script>       
function valider(){
    var liens;
	var mp = document.getElementById('display').value;
    
    var real_password = <?php echo $pass ?>;
    if(mp == real_password){
	  liens = "article.php?id=<?php echo $id;?>"+" username=<?php echo $username;?>"+" &mp=" +mp;
    window.location = ""+ liens +""
    <?php  
       session_start(); 
      $_SESSION['username']=$username; 
      $_SESSION['id']=$id; ?>
      } 
     
    else{
        alert("Incorrect password");
        display.value = '';
    }
}
</script>

</head>

<body>
<div class="container" >
    <center>
        <div class="calculator dark center" style="width: 340px;height:600px; padding: 20px;top: 20px;">
           <form action="page_accueil.php">    
        <button class="close" >
          <span>X</span>
        </button>
           </form>
        <div class="theme-toggler active">
                <i class="toggler-icon"></i>
        </div>
            <div  style=" margin-left: 20px;">
            <br><br>

                <table>
                <tr style="width:275px;">
                         <td colspan="3"  align="center">
                     <input class="w3-border w3-input w3-animate-input  " style="width:250px;height:40px ;color:black;border-radius: 10px;"
                      type="password" name="mp" id="display" placeholder="    Entrer votre mot de passe">
                         </td>
                </tr>
              </table>
                <br><br>
                <table>
                <div class="buttons">
                    <tr>
            
                        <td align="left"><button class="btn-number"  value="1" onclick="display.value += '1'">1</button></td>
                        <td align="center"><button class="btn-number"  value="2" onclick="display.value += '2'">2</button></td>
                        <td align="right"><button class="btn-number"  value="3" onclick="display.value += '3'">3</button></td>
                    </tr>
                    <tr>
                        <td><button class="btn-number" id="4" value="4" onclick="display.value += '4'">4</button></td>
                        <td><button class="btn-number" id="5" value="5" onclick="display.value += '5'">5</button></td>
                        <td><button class="btn-number" id="6" value="6" onclick="display.value += '6'">6</button></td>
                    </tr>
                    <tr>
                        <td><button class="btn-number" id="7" value="7" onclick="display.value += '7'">7</button></td>
                        <td><button class="btn-number" id="8" value="8" onclick="display.value += '8'">8</button></td>
                        <td><button class="btn-number" id="9" value="9" onclick="display.value += '9'">9</button></td>
                    </tr>
                    <tr>
                        <td><button class="btn-number" id="0" value="0" onclick="display.value += '0'">0</button></td>
                        <td><button class="btn-operator" id="clear" onclick="display.value = '' ">C</button></td>
                    </tr>
                     </div>
                </table>
                <br>

<button  class="w3-btn w3-round w3-hover-green" style="height: 70px;width:200px;margin-left: 15px;" onclick="valider()">Vérifier</button>
</div>
</center>  
        </div>
    </div>
    <script src="script2.js"></script>
</body>
</html>