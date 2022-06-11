<?php
  include_once 'products_crud.php';
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
  <title>Apple Products Ordering System : Products</title>
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
        <h2>Create New Product</h2>
      </div>
      <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group">
          <label for="pid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="pid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="name" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="price" class="col-sm-3 control-label">Price (RM)</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="price" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_price']; ?>"required>
        </div>
        </div>
      <div class="form-group">
          <label for="warranty" class="col-sm-3 control-label">Warranty</label>
          <div class="col-sm-9">
           <select name="warranty" class="form-control" id="warranty" required>
            <option value="">Please select</option>
            <option value="1 Year" <?php if(isset($_GET['edit'])) if($editrow['fld_warranty_length']=="1 Year") echo "selected"; ?>>1 Year</option>
            <option value="2 Year" <?php if(isset($_GET['edit'])) if($editrow['fld_warranty_length']=="2 Year") echo "selected"; ?>>2 Year</option>
            <option value="3 Year" <?php if(isset($_GET['edit'])) if($editrow['fld_warranty_length']=="3 Year") echo "selected"; ?>>3 Year</option>
          </select>
        </div>
        </div>
      <div class="form-group">
          <label for="type" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
          <input name="type" type="text" class="form-control" id="type" placeholder="Product Type" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_type']; ?>" required>
        </div>
        </div>
      <div class="form-group">
          <label for="quantity" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
          <input name="quantity" type="number" class="form-control" id="quantity" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_quantity']; ?>"required>
        </div>
        </div>
      <div class="form-group">
          <label for="chiptype" class="col-sm-3 control-label">Chip Type</label>
          <div class="col-sm-9">
          <input name="chiptype" type="text" class="form-control" id="chiptype" placeholder="Chip Type" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_chip_type']; ?>" required>
        </div>
        </div>
        <div class="form-group">
        <label for="pimage" class="col-sm-3 control-label">Image</label>
        <div class="col-sm-9">
          <input name="filename" type="file" class="form-control" id="filename" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_image']; ?>"  required>
          <!--input type='submit' value='Upload Image' name='submit' style="position: absolute; top:5px; right:30px"-->
        </div>
      </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
          <button class="btn btn-default" type="submit" name="update"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
      <?php } else { ?>
            <button class="btn btn-default" type="submit" name="create" <?php if ($userlevel=="Staff") echo "disabled"?>> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Create</button>
       <?php } ?>
      <button class="btn btn-default" type="reset" > <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button> 
        </div>
      </div>
    </form>
    </div>
  </div>
    <hr>    
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price (RM)</th>
          <th>Warranty</th>
          <th>Type</th>
          <th>Quantity</th>
          <th>Chip Type</th>
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
          $stmt = $conn->prepare("select * from tbl_products_a176664_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_price']; ?></td>
        <td><?php echo $readrow['fld_warranty_length']; ?></td>
        <td><?php echo $readrow['fld_type']; ?></td>
        <td><?php echo $readrow['fld_quantity']; ?></td>
        <td><?php echo $readrow['fld_chip_type']; ?></td>
        <td>
           <a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
           <a href="<?php if ($userlevel=="Admin"){ echo "products.php?edit="; echo $readrow['fld_product_id'];} ?>"class="btn btn-success btn-xs" role="button" onclick="<?php if ($userlevel=="Staff") echo "return confirm('Sorry, Only Admin Can Access This !');"?>" <?php if ($userlevel=="Staff") echo "disabled"?>> Edit</a>
          <a href="<?php if ($userlevel=="Admin"){ echo "products.php?delete="; echo $readrow['fld_product_id'];} ?>"class="btn btn-danger btn-xs" role="button" onclick="<?php if ($userlevel=="Staff") echo "return confirm('Sorry, Only Admin Can Access This !');"?>" <?php if ($userlevel=="Staff") echo "disabled"?>> Delete</a>
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
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a176664_pt2");
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
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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