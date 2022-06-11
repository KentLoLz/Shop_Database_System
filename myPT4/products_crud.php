<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {

    $tempname = $_FILES["filename"]["tmp_name"]; //
    $target_dir = "products/";
    $target_file = $target_dir . basename($_FILES["filename"]["name"]); //
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["filename"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $message = "File is not an image.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["filename"]["size"] > 10000000) { //
      $message = "Sorry, your file is too large. Please upload file smaller than 10MB";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if( $imageFileType !== "gif" && $imageFileType !== "JPG" ) {
      $message = "Sorry, only GIF files are allowed.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      $message = "Sorry, your file was not uploaded.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
    
    } 
else {
      if (move_uploaded_file($tempname, $target_file)) {


  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a176664_pt2(
        fld_product_id, fld_product_name, fld_price, fld_warranty_length, fld_type,  fld_quantity, fld_chip_type, fld_product_image) VALUES(:pid, :name, :price, :warranty,
        :type, :quantity, :chiptype, :pimage)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':chiptype', $chiptype, PDO::PARAM_STR);
      $stmt->bindParam(':pimage', $pimage, PDO::PARAM_STR);
       
 $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $warranty =  $_POST['warranty'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $chiptype = $_POST['chiptype'];
    $pimage = $_FILES["filename"]["name"];
     
    $stmt->execute();
    }


 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else {
        $message = "Sorry, there was an error uploading your file.";
        echo "<script type='text/javascript'>alert('$message');";
        echo "window.location.href = 'products.php';";
        echo "</script>";
      }
    }
  
}
 
//Update
if (isset($_POST['update'])) {
 
  $tempname = $_FILES["filename"]["tmp_name"]; //
    $target_dir = "products/";
    $target_file = $target_dir . basename($_FILES["filename"]["name"]); //
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["filename"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $message = "File is not an image.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["filename"]["size"] > 10000000) { //
      $message = "Sorry, your file is too large. Please upload file smaller than 10MB";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if( $imageFileType !== "gif" && $imageFileType !== "png" ) {
      $message = "Sorry, only GIF and png files are allowed.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
      $uploadOk = 0;
    }
    if ($uploadOk == 0) {
      $message = "Sorry, your file was not uploaded.";
      echo "<script type='text/javascript'>alert('$message');";
      echo "window.location.href = 'products.php';";
      echo "</script>";
    
    } 
else {
      if (move_uploaded_file($tempname, $target_file)) {


  try {

  $stmt = $conn->prepare("UPDATE tbl_products_a176664_pt2 SET fld_product_id = :pid,
        fld_product_name = :name, fld_price = :price, fld_warranty_length = :warranty,
        fld_type = :type,fld_quantity = :quantity, fld_chip_type = :chiptype, fld_product_image=:pimage
        WHERE fld_product_id = :oldpid");
     
     $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':chiptype', $chiptype, PDO::PARAM_STR);
      $stmt->bindParam(':pimage', $pimage, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
      
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $warranty =  $_POST['warranty'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $chiptype = $_POST['chiptype'];
    $pimage = $_FILES["filename"]["name"];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
    }


 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}else {
        $message = "Sorry, there was an error uploading your file.";
        echo "<script type='text/javascript'>alert('$message');";
        echo "window.location.href = 'products.php';";
        echo "</script>";
      }
    }
 }
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a176664_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 //Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a176664_pt2 WHERE fld_product_id= :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a176664_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>
  

