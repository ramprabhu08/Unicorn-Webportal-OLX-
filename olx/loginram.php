   
<div>
<div>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<form action='loginram.php' method="post" class="login-form">
<h1>Login Page</h1>
<label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email" required><br><br>
<label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required><br><br>

      <br>
  <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success btn-block">
  <br>
  <p>If not Registered <a href="registerram.php">Click Here</a></p>
    </form>
  </div>
</div>






<?php
 
    session_start();
    $db = mysqli_connect("localhost", "root", "ubuntu1997", "dbms");

   if(isset($_POST['submit'])){
     $email_address = mysqli_escape_string($db,$_POST['email']);
     $password = mysqli_escape_string($db,$_POST['password']);

     $query = "SELECT *FROM Users WHERE Nitcemailid = '$email_address' AND pass_word= '$password'";
     $result = mysqli_query($db,$query);

     if(mysqli_num_rows($result)==1){
           $_SESSION['email'] = $email_address;
           $_SESSION['success'] = "You are now logged in";
           header('location: homeram.php');
     }
     else{
           echo "<script type='text/javascript'>alert('Failed to Login! Incorrect Email or Password')</script>";
     }
   }
?>

