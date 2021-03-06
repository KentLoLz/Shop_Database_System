<?php
  include_once 'staffs_crud.php';
  include_once 'auth.php';
?>
 
<!DOCTYPE html>
<html>
<style type="text/css">
  tr:nth-child(even) {
    background-color: lightgrey;
  }
   .page-header h2{
    color: white;
    text-align: center;
    font: ;
  }
  .form-group label{
    color: white;
  }

</style>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Apple Products Ordering System : Staffs</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url('applebg.jpg');">
  <?php include_once 'nav_bar.php'; ?>
  <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Staff</h2>
      </div>
      <form action="staffs.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="sid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="sid" type="text" class="form-control" id="sid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_id']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="name" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-9">
          <input name="email" type="email" class="form-control" id="email" placeholder="Staff Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_email']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
          <input name="phone" type="text" class="form-control" id="phone" placeholder="Staff Phone" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_phone']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="address" class="col-sm-3 control-label">Address</label>
          <div class="col-sm-9">
          <input name="address" type="text" class="form-control" id="address" placeholder="Staff Address" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_address']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="gender" class="col-sm-3 control-label">Gender</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="gender" type="radio" id="gender" value="Male" <?php if(isset($_GET['edit'])) if($editrow['fld_gender']=="Male") echo "checked"; ?> required> Male
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="gender" type="radio" value="Female" <?php if(isset($_GET['edit'])) if($editrow['fld_gender']=="Female") echo "checked"; ?>> Female
            </label>
            <br>
            <br>
            </div>
          </div>

          <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Password</label>
          <div class="col-sm-9">
          <input name="passwords" type="password" class="form-control" id="passwords" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_password']; ?>" required>
        </div>
        </div>
        <div class="form-group">
          <label for="userlevel" class="col-sm-3 control-label">User Level</label>
          <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="userlevel" type="radio" id="userlevel" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_userlevel']=="Admin") echo "checked"; ?> required> Admin
            </label>
          </div>
          <div class="radio">
            <label>
              <input name="userlevel" type="radio" value="Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_userlevel']=="Staff") echo "checked"; ?>> Staff
            </label>
            <br>
            <br>
            </div>
          </div>
      </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_id']; ?>">
          <button class="btn btn-default" type="submit" name="update"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
            <button class="btn btn-default" type="submit" name="create" <?php if ($userlevel=="Staff") echo "disabled"?>> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
       <?php } ?>
      <button class="btn btn-default" type="reset"> <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button> 
        </div>
      </div>
    </form>
    </div>
  </div>
    <hr>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Staffs List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Staff ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Gender</th>
          <th>User Level</th>
          <th></th>
      </tr>  
       <?php
      // Read
       $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_staffs_a176664_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_id']; ?></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_email']; ?></td>
        <td><?php echo $readrow['fld_phone']; ?></td>
        <td><?php echo $readrow['fld_address']; ?></td>
        <td><?php echo $readrow['fld_gender']; ?></td>
        <td><?php echo $readrow['fld_userlevel']; ?></td>
        <td>
          <a href="<?php if ($userlevel=="Admin"){ echo "staffs.php?edit="; echo $readrow['fld_staff_id'];} ?>"class="btn btn-success btn-xs" role="button" onclick="<?php if ($userlevel=="Staff") echo "return confirm('Sorry, Only Admin Can Access This !');"?>" <?php if ($userlevel=="Staff") echo "disabled"?>> Edit</a>
          <a href="<?php if ($userlevel=="Admin"){ echo "staffs.php?delete="; echo $readrow['fld_staff_id'];} ?>"class="btn btn-danger btn-xs" role="button" onclick="<?php if ($userlevel=="Staff") echo "return confirm('Sorry, Only Admin Can Access This !');"?>" <?php if ($userlevel=="Staff") echo "disabled"?>> Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
 
    </table>
     </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a176664_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">??</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">??</span></li>
          <?php } else { ?>
            <li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    </div>
</div>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>  

    
