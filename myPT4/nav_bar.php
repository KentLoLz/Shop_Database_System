
<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset ($_POST["loggout"])){
  session_destroy();
  header("Location:index.php");
}
}
?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Kent Apple Store</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home <span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
      <li><a href="search.php">Search <span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
      <li><a style="color:black; margin-left: 480px; font-size: 20px; font-family: fantasy; " > Welcome <?php if(isset($_SESSION["name"])) echo $_SESSION["name"] ?> , [ <?php if(isset($_SESSION["userlevel"])) echo $_SESSION["userlevel"] ?> ] </a></li>

    </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="glyphicon glyphicon-chevron-down"></span></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>
           
        </li>
        <li><button type="submit" class="btn btn-danger btn-s" name="loggout" style="margin-top: 8px ;"> Log Out <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></button></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</form>