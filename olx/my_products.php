<?php 
   session_start();
$db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
 
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

<?php
$user_id = $_SESSION['email'];
$query = "SELECT * FROM Advertisements where ownerid = '$user_id'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result) == 0){
  echo "<script type='text/javascript'>alert('You have not Advertised any Product')</script>";
}
while ($row = mysqli_fetch_assoc($result)) {
    
    $id = $row["advid"];
    $email_id = $row["ownerid"];
     
    if ($row["itemtype"]==="Laptop") {
      $query2 = "SELECT * FROM laptop WHERE productid = '$id'";
      $result2 = mysqli_query($db,$query2);
      $row2 = mysqli_fetch_assoc($result2);
        

      $query3 = "SELECT * FROM Users WHERE Nitcemailid = '$email_id'";
      $result3 = mysqli_query($db,$query3);
      $row3 = mysqli_fetch_assoc($result3); 
       ?>
      <div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                          
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <b><?php echo $row["itemname"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-data">
                            <p>Advt ID: <b><?php echo $row["advid"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Manufacturer: <b><?php echo $row2["manufacturer"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Model Name: <b><?php echo $row2["modelname"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Year Of Purchase: <b><?php echo $row2["yof"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Battery Status: <b><?php echo $row2["batterystatus"]; ?></b></p>
                            </div>
                           
                            <div class="lib-row lib-price">
                              <p>Expected Price: Rs <b><?php echo $row2["expectedprice"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Contact Details: <b><?php echo $row3["Username"]." Mobile No: ".$row3["Mobilenum"]; ?></b></p>
                            </div>
                            <input type="hidden" name="id" value="4">
                            <div class="lib-row lib-data">
                              <p>Email ID: <b><?php echo $row["ownerid"];?></b></p>
                            </div>
                            <?php
                               if ($row["buyerid"]) {
                               	?>
                             <div class="lib-row lib-data">
                              <p style="color: red;">SOLD TO: <b><?php echo $row["buyerid"];?></b></p>
                            </div>
                            <?php 
                               }
                            ?>
                        </div>	
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            
                   
        </div>
        
</div>

<?php
    }
    else if($row["itemtype"]==="Mobile"){
        $query2 = "SELECT * FROM mobile WHERE productid = '$id'";
      $result2 = mysqli_query($db,$query2);
      $row2 = mysqli_fetch_assoc($result2);
        

      $query3 = "SELECT * FROM Users WHERE Nitcemailid = '$email_id'";
      $result3 = mysqli_query($db,$query3);
      $row3 = mysqli_fetch_assoc($result3);

      ?>
        <div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <b> <?php echo $row["itemname"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-data">
                            <p>Advt ID: <b><?php echo $row["advid"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Manufacturer: <b><?php echo $row2["manufacturer"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Model Name: <b><?php echo $row2["modelname"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Year Of Purchase: <b><?php echo $row2["yof"]; ?></b></p>
                            </div>
                           
                            <div class="lib-row lib-price">
                              <p>Expected Price: Rs <b><?php echo $row2["expectedprice"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Contact Details: <b><?php echo $row3["Username"]." Mobile No: ".$row3["Mobilenum"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Email ID: <b><?php echo $row["ownerid"];?></b></p>
                            </div>
                            <?php
                               if ($row["buyerid"]) {
                               	?>
                             <div class="lib-row lib-data">
                              <p style="color: red;">SOLD TO: <b><?php echo $row["buyerid"];?></b></p>
                            </div>
                            <?php 
                               }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            
        </div>
</div>  
<?php
    }
    else if($row["itemtype"]==="Book"){
        $query2 = "SELECT * FROM books WHERE productid = '$id'";
      $result2 = mysqli_query($db,$query2);
      $row2 = mysqli_fetch_assoc($result2);
        

      $query3 = "SELECT * FROM Users WHERE Nitcemailid = '$email_id'";
      $result3 = mysqli_query($db,$query3);
      $row3 = mysqli_fetch_assoc($result3);

        
        $i=0;
        $query4 = "SELECT * FROM Author WHERE productid = '$id'";
        $result4 = mysqli_query($db,$query4);
        while($row4 = mysqli_fetch_assoc($result4)){
             if($i==0){
                  $author1 = $row4["authorname"];
                  $i++; 
             }
             else if($i==1){
                $author2 = $row4["authorname"];
                $i++;
             }
             else if($i==2){
                $author3 = $row4["authorname"];
                $i++;
             }
        }
       ?>
    <div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            
                        </div>
                        
                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <b><?php echo $row["itemname"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-data">
                            <p>Advt ID: <b><?php echo $row["advid"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Name of Book: <b><?php echo $row2["nameofbook"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Author Name: <b><?php echo $author1." ".$author2." ".$author3; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Condition: <b><?php echo $row2["itemcondition"]; ?></b></p>
                            </div>
                            
                            <div class="lib-row lib-price">
                              <p>Expected Price: Rs <b><?php echo $row2["expectedprice"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Contact Details: <b><?php echo $row3["Username"]." Mobile No: ".$row3["Mobilenum"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                              <p>Email ID: <b><?php echo $row["ownerid"];?></b></p>
                            </div>
                            <?php
                               if ($row["buyerid"]) {
                               	?>
                             <div class="lib-row lib-data">
                              <p style="color: red;">SOLD TO: <b><?php echo $row["buyerid"];?></b></p>
                            </div>
                            <?php 
                               }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            


        </div>
</div>  
      
 <?php  
    }
  }
  ?>
 <a href="set_buyer.php"><center><button style="width: 50%;" type="submit" id="sold" name="sold" class="btn btn-primary" >CLICK TO ADD SOLD ITEMS</button></center></a>	
 <br>	
 <br>


<footer class="container-fluid bg-4 text-center">
  <p>@ 2018 Copyright: <a href="homeram.php">www.olx.com </a>| Designed by Ram Prabhu</p> 
</footer>


