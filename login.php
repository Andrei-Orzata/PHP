<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){
    




   $notemail = trim($_POST['email']);
   $email = mysqli_real_escape_string($conn, $notemail);
   $notpassword = trim($_POST['password']);
   $pass = mysqli_real_escape_string($conn, md5($notpassword));
   
   if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretAPIkey = '6LdamuQjAAAAAF7aoJXlzSfEtSuKCPgqgPJe99lg';
        //reCAPTCHA response verification
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);


   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }
}
}

?>
<html>
    <head>
        <title>Login Form Design</title>
        <link rel ="stylesheet" type="text/css" href="loginstyle.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    
    <?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
    <body>
        <div class ="loginbox">
            <img src ="avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Email</p>
                <input type="email" name ="email" placeholder ="Enter your email" required>
                <p>Password</p>
                <input type="password" name = "password" placeholder="Enter your password" required>
                <div class="g-recaptcha" data-sitekey="6LdamuQjAAAAAF7aoJXlzSfEtSuKCPgqgPJe99lg"></div>
                <input type="submit" name ="submit" value = "Login">
                <a href="https://orzataandreiphp.000webhostapp.com/register.php">Sign up</a><br>
                <a href="https://orzataandreiphp.000webhostapp.com">Back to front page</a>
            </form>
        </div>
    </body>
</html>