<?php
session_start();
$db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");
?>

<!DOCTYPE html>
<html>
<head>
	<title>UNICORN</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body background="">

    <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homeram.php"><span>UNICORN</span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="homeram.php">HOME</a></li>
        <li><a href="my_products.php">MY PRODUCTS</a></li>
        <li><a href="message.php">MESSAGES</a></li>
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


<center>
    <div class="text-center">
        <h1 class="tp1">Let's Unicorn!</h1>

        <div class="button">
        	<a href="advertiseram.php" class="btn-one button_n">Advertise Your Product</a><br>
        	<a href="purchase.php" class="btn-two button_n">Purchase Product</a>
        </div>
    </div>
    </center>
    </header>

<footer class="container-fluid bg-4 text-center">
  <p>@ 2018 Copyright: <a href="homeram.php">www.unicorn.com </a>| Designed by Ram Prabhu</p> 
</footer>

    
</body>
</html>
