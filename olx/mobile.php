<?php
session_start();
$db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");
?>

<!DOCTYPE html>
<html>
<head>
	<title>OLX</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

	<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homeram.php">UNICORN</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homeram.php">HOME</a></li>
        <li><a href="my_products.php">MY PRODUCTS</a></li>
        
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email']; ?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="change_password.php">Change Password</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>


<div class="topnav">

<a href="laptop.php">Laptop</a>
  <a href="mobile.php" class="active">Mobile phone</a>
  <a href="books.php" >Books</a>


<div class="topnav-right">
    
  </div>

</div>

	<div class="container">
  <h2>Post an Advertisement</h2>
  <form class="form-horizontal" action="mobile.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_name">Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="manufacturer">Manufacturer</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer" name="manufacturer" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="model_name">Model Name</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="model_name" placeholder="Model Name" name="model_name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="yop">Year of Purchase</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="yop" placeholder="Year of Purchase" name="yop" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="expected_price">Expected Price</label>
      <div class="col-sm-10">          
        <input type="number" class="form-control" id="expected_price" placeholder="Expected Price" name="expected_price" required>
      </div>
</div>

<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>


<?php
    
    $today =  date("Y-m-d");
    $expiry = Date("Y-m-d",strtotime("+10 days"));
    
    $owner_email = $_SESSION['email'];
    
     //echo $owner_email;
   
    if(isset($_POST['submit'])){
      $productName = mysqli_escape_string($db,$_POST['product_name']);
      $manufacturer = mysqli_escape_string($db,$_POST['manufacturer']);
      $modelName = mysqli_escape_string($db,$_POST['model_name']);
      $yearOfPurchase = mysqli_escape_string($db,$_POST['yop']);
      
      $expectedPrice = mysqli_escape_string($db,$_POST['expected_price']);
      $mobile = "Mobile";

      $query1 = "INSERT INTO Advertisements (itemname,itemtype,dateofinit,dateofexp,ownerid) VALUES ('$productName','$mobile','$today','$expiry','$owner_email')";
      $result1 = mysqli_query($db,$query1);
      //echo "lol";
      if($result1){
            $query2 = "SELECT advid FROM Advertisements where itemname = '$productName' and ownerid = '$owner_email'";
            $result2 = mysqli_query($db,$query2);

            $row = mysqli_fetch_assoc($result2);
            $temp =  $row["advid"];
            $query3 = "INSERT INTO mobile (productid,manufacturer,modelname,yof,expectedprice)
             VALUES ('$temp','$manufacturer','$modelName','$yearOfPurchase','$expectedPrice')";

            $result3 = mysqli_query($db,$query3);
            if($result3){
                  echo "<script type='text/javascript'>alert('Successfully Advertised')</script>";      
            }
            else{
                  echo "<script type='text/javascript'>alert('Failed! Please try again yoyoy')</script>";
            } 

      }else{
        echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
      }
      
    }


?>
