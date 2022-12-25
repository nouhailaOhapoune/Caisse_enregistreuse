<?php
  include("setting.php");

  if(isset($_POST['Submit'])) {  
    $photo = rand(1000,100000)."-".$_FILES['photo']['name'];
    $photo_loc = $_FILES['photo']['tmp_name'];
    $photo_size = $_FILES['photo']['size'];
    $photo_type = $_FILES['photo']['type'];
    $folder="images/";
    $new_size = $photo_size/1024;  
    $new_photo_name = strtolower($photo);
    $final_photo=str_replace(' ','-',$new_photo_name);
 
    if(move_uploaded_file($photo_loc,$folder.$final_photo))
    {
    $article_name = $_POST['article_name'];
	$price =$_POST['price']; 
    
     
  if (empty($article_name)) { 
		echo"Name is required"; 
	}
  if (empty($final_photo)) { 
		echo "Photo is required"; 
	}
  if (empty($price)) { 
		echo "Price is required"; 
	}
 else {
    $query = "INSERT INTO `article`(`article_name`, `photo`, `price`) 
            VALUES ('$article_name','$final_photo','$price')";
            $result = mysqli_query($connection, $query);
            if($result){
              $msg = "Registered Succesfully";
              echo $msg;
              header("location:article.php");
            }
            else{
            $msg = "Error Registering";
            echo $msg;
            $article_name ='';
            $photo = ''; 
	        $price =''; 
            
           }
            
  }
}
}
?>