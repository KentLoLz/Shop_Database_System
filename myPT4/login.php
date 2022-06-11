<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  session_start();

// Paste here
include "database.php";
      // Give value to the variables
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $passwords = filter_var($_POST['passwords'],FILTER_SANITIZE_STRING);


  $_SESSION["email"] = $email;
  $_SESSION["passwords"] = $passwords;





    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      // Prepare the SQL statement
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a176664_pt2");

    $stmt->execute();
 
    $result = $stmt->fetchAll();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
foreach($result as $row) {
  if ($email == $row["fld_email"] && $passwords == $row["fld_password"] && $row["fld_userlevel"]=="Admin") {
    $_SESSION['userlevel'] ="Admin";
    $_SESSION['name']= $row["fld_staff_name"];
    header("Location:index.php");

  }
   if ($email == $row["fld_email"] && $passwords == $row["fld_password"] && $row["fld_userlevel"]=="Staff" ) {
    $_SESSION['userlevel'] ="Staff";
    $_SESSION['name']= $row["fld_staff_name"];
    header("Location:index.php");
  }
}  
   $_SESSION["wrongwrong"]="!!! Invalid Email Or Passwords !!! ";
  


  }

 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
h2 {
  color: white;
  text-align: center;
  font-size: 100px;
}
/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin:0 auto;
  display:block;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}


/* Extra styles for the cancel button */
.cancelbtn {
  width: 50%;
  padding: 14px 20px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 25%;
  border-radius: 0%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}


/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}


/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>

</head>
<body style="background-image: url('applebg.jpg');">
<table>
  <tr>
    <td>
     <h2>Kent Apple Store</h2> 
    </td>
  </tr>
    <tr style="height: 250px; background-image: url('applefrontlogo.png'); background-size:200px; background-repeat: no-repeat; background-position: center;">
    <td>
    </td>
  </tr>
  <tr>
    <td>
     <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-dark" style="width:auto;margin: 100px 900px; padding: 30px 50px;font-size: 20px; background-color: black; font-family: TimesNewRoman;">Login</button>  
 
    </td>
  </tr>
</table>




<div id="id01" class="modal" >
  
  <form class="modal-content animate" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="applelocky.gif" alt="Avatar" class="avatar">

      
    </div>
    <div class="imgcontainer">
     <label style="text-align:center; color: red;" >  <?php if(isset($_SESSION["wrongwrong"])) echo $_SESSION["wrongwrong"] ?> 
</label>     
   </div>
    <div class="container">
      <label for="email"><b>Username</b></label>
      <input type="text" style="text-align: center;" placeholder="Enter Username" name="email" value="<?php if(isset($_SESSION["email"])) echo $_SESSION["email"] ?>"required>

      <label for="passwords"><b>Password</b></label>
      <input type="password" style="text-align: center;" placeholder="Enter Password" name="passwords"value="<?php if(isset($_SESSION["passwords"])) echo $_SESSION["passwords"] ?>" required>
        
      <button type="submit">Login</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button"  onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
