<?php
   session_start();
$db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Title</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>

</style>
<body >

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
       <li><a href="message.php">MESSENGER</a></li>
        
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
    $email_id = $_SESSION['email'];
    $query = "SELECT * FROM Messages WHERE receiver_id ='$email_id'";
    $result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)){
          $sender_id = $row["sender_id"];
          $query2 = "SELECT *FROM Users WHERE Nitcemailid = '$sender_id'";
          $result2 = mysqli_query($db,$query2);
          $row2 = mysqli_fetch_assoc($result2);
          $sender_name = $row2["Username"];  
          ?> 
         <div class="container">
<div class="row row-margin-bottom">
            <div class="col-md-12 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        
                        <div class="col-md-12">
                            <div class="lib-row lib-message">
                                <b><?php echo $sender_id; ?></b>
                                
                            </div> 

                            <div class="lib-row lib-data">
                                 <?php echo $row["message"]; ?>
                            </div>
                            <div class="lib-row lib-desc" style="text-align: right;">
                                 <?php echo $row["msg_date"]." ".$row["msg_time"]; ?>
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
      </div>    
    <?php
    } 

?>

<a href="send_message.php"><center><button style="width: 50%;" type="submit" id="sold" name="sold" class="btn btn-primary" >CLICK HERE TO MESSAGE</button></center></a>  
