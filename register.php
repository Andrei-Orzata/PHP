<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = 'user';

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>
<html>
    <head>
        <title>Register Form</title>
        <link rel ="stylesheet" type="text/css" href="registerstyle.css">
    </head>
    <body>
        <div class ="registerbox">
            <img src ="avatar.png" class="avatar">
            <h1>Sign Up Here</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Username</p>
                <input type="name" name ="name" placeholder ="Enter a username" required>
                <p>Email</p>
                <input type="email" name = "email" placeholder="Enter a valid email adress" required>
                <p>Password</p>
                <input type="password" name = "password" placeholder="Enter a password" required>
                <p>Confirm your Password</p>
                <input type="password" name = "cpassword" placeholder="Enter a password" required>
                <input type="submit" name ="submit" value = "Sign Up">
                <a href="https://orzataandreiphp.000webhostapp.com/login.php">Login-in instead</a><br>
                <a href="https://orzataandreiphp.000webhostapp.com/">Back to front page</a>
            </form>
        </div>

    </body>
</html>