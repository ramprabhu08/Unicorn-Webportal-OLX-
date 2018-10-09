<?php 
   session_start();
$db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buyer Information</title>
	

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
</head>

<body>
 
	<nav class="navbar navbar-inverse">
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

<div class="container">
  <h2>ITEMS SOLD</h2>
  <form class="form-horizontal" action="set_buyer.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="advt_id">Enter Advertisement ID</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="advt_id" placeholder="Advertisement ID" name="advt_id" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="product_name">Enter Buyer Email Id:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="buyer_email" placeholder="Email Id" name="buyer_email" required>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</form>
</div>
<footer class="container-fluid bg-4 text-center">
  <p>@ 2018 Copyright: <a href="homeram.php">www.olx.com </a>| Designed by Ram Prabhu</p> 
</footer>

<?php

if(isset($_POST['submit'])){
	$user_id = $_SESSION['email'];
	$advt_id = mysqli_escape_string($db,$_POST['advt_id']);
	$buyer_id = mysqli_escape_string($db,$_POST['buyer_email']);
	
	if($user_id == $buyer_id){
		echo "<script type='text/javascript'>alert('Buyer ID cannot be same as Logged in ID')</script>";
	}
    
    $advt_id_num = (int)$advt_id;
   
    
    $query = "UPDATE Advertisements SET buyerid = '$buyer_id' WHERE advid = '$advt_id_num'";
    $result = mysqli_query($db,$query);
    
    if($result){
       echo "<script type='text/javascript'>alert('Updated Succesfully')</script>";	
    }
    else{
    	echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
    }
}

?>
