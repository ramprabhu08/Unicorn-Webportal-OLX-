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
  <a href="mobile.php" >Mobile phone</a>
  <a href="books.php" class="active">Books</a>
  
  <div class="topnav-right">
    
  </div>

</div>

	<div class="container">
  <h2>Post an Advertisement</h2>
  <form class="form-horizontal" action="books.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="name_of_book">Name of Book</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name_of_book" placeholder="Name of Book" name="name_of_book" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="author1">Author Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author1" placeholder="Author Name1" name="author1" required>
      </div>
      <br>
      <br>

      <div class="col-sm-2">
      </div>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author2" placeholder="Author Name2" name="author2" >
      </div>
      
      <br>
      <br>

      <div class="col-sm-2">
      </div>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author3" placeholder="Author Name3" name="author3" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="condition">Condition</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="condition" placeholder="Condition" name="condition"></input>  
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
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>

<?php
    
    $today =  date("Y-m-d");
    $expiry = Date("Y-m-d",strtotime("+10 days"));
    
    $owner_email = $_SESSION['email'];
    
    
    if(isset($_POST['submit'])){
      $nameOfBook = mysqli_escape_string($db,$_POST['name_of_book']);
      $author1 = mysqli_escape_string($db,$_POST['author1']);
      $author2 = mysqli_escape_string($db,$_POST['author2']);
      $author3 = mysqli_escape_string($db,$_POST['author3']);
      $condition = mysqli_escape_string($db,$_POST['condition']);
      
      $expectedPrice = mysqli_escape_string($db,$_POST['expected_price']);
      $book = "Book";

      $query1 = "INSERT INTO Advertisements (itemname,itemtype,dateofinit,dateofexp,ownerid) VALUES ('$nameOfBook','$book','$today','$expiry','$owner_email')";
      $result1 = mysqli_query($db,$query1);
      if($result1){
            $query2 = "SELECT advid FROM Advertisements where itemname = '$nameOfBook' and ownerid = '$owner_email'";
            $result2 = mysqli_query($db,$query2);

            $row = mysqli_fetch_assoc($result2);
            $temp =  $row["advid"];
            $query3 = "INSERT INTO books (productid,nameofbook,itemcondition,expectedprice)
             VALUES ('$temp','$nameOfBook','$condition','$expectedPrice')";

            $result3 = mysqli_query($db,$query3);
            if($result3){
                  if($author1)
                  $query4 = "INSERT INTO Author (productid,authorname) VALUES ('$temp','$author1')";
                  $result4 = mysqli_query($db,$query4);
                  if($author2){
                    $query5 = "INSERT INTO Author (productid,authorname) VALUES ('$temp','$author2')";
                  $result5 = mysqli_query($db,$query5);
                  }
                  if($author3){
                    $query6 = "INSERT INTO Author (productid,authorname) VALUES ('$temp','$author3')";
                  $result6 = mysqli_query($db,$query6);
                  }
                  echo "<script type='text/javascript'>alert('Successfully Advertised')</script>";      
            }
            else{
                  echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
            } 

      }else{
        echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
      }
      
    }


?>
