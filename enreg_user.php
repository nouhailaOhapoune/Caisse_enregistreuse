<?php
  include("setting.php");

  if(isset($_POST['Submit'])) {  
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email']; 
    $phone = $_POST['phone']; 
	  $pass =$_POST['pass']; 
    $sex = $_POST['sex']; 
   	$pass_chif = md5($pass);
     
  if (empty($name)) { 
		echo"Name is required"; 
	}
  if (empty($address)) { 
		echo "Address is required"; 
	}
  if (empty($email)) { 
		echo "Email is required"; 
	}
  if (empty($phone)) { 
		echo "Phone is required"; 
	}  
  if (empty($pass)) { 
		echo "Password is required"; 
	}
 else {
    $query = "INSERT INTO `user`(`name`, `address`, `sex`, `phone`, `email`, `password`) 
            VALUES ('$name','$address','$sex','$phone','$email','$pass')";
            $result = mysqli_query($connection, $query);
            if($result){
              $msg = "Registered Succesfully";
              echo $msg;
              header("location:page_accueil.php");
            }
            else{
            $msg = "Error Registering";
            echo $msg;
           }
            
  }
}
 ?>
     