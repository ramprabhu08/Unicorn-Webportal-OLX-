<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="login-page">
  <div class="form">
    <form action="registerram.php" method="post" class="form-container">
      <label for="name">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required><br><br>

      <label for="mob_no">Mobile Number</label>
    <input type="number" class="form-control" id="mob_no" name="mob_no" placeholder="Mobile Number" required><br><br>
 <label for="user_type">User type</label>
<select class="form-control" id='user_type' name='user_type'>
      <option value="0">Select</option>
      <option value="Student">Student</option>
      <option value="Staff">Staff</option>
      <option value="Faculty">Faculty</option>
    </select>

      <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required><br><br>

<label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required><br><br>

      <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success btn-block">
  <br>
  <a href="loginram.php">Click here to Login</a>

    </form>
  </div>
</div>




<?php
$db = mysqli_connect('localhost','root','ubuntu1997','dbms');

if(isset($_POST['submit'])){
  $name = mysqli_escape_string($db,$_POST['name']) ;
  $mobile_no = mysqli_escape_string($db,$_POST['mob_no']);
  $user_type = mysqli_escape_string($db,$_POST['user_type']);
  $email_address = mysqli_escape_string($db,$_POST['email']);
  $password = mysqli_escape_string($db,$_POST['password']);
  
  $query = "INSERT INTO Users (Nitcemailid,Username,Mobilenum,Usertype,pass_word) VALUES ('$email_address','$name','$mobile_no','$user_type','$password')";

  $result = mysqli_query($db,$query);
  echo '$result';
  /*if($result){
    echo "<script type='text/javascript'>alert('Submitted Successfully!!!')</script>";
  }
  else{
   echo "<script type='text/javascript'>alert('Registration Failed. Please try again')</script>"; 
  }*/
}



?>
