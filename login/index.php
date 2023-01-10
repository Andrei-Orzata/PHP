<?php
session_start();
if(isset($_SESSION['logat'])){
    die(header("location:https://orzataandreiphp.000webhostapp/home/"));
}
require_once("config.php");
if(isset($_POST['submit']))
{
    //sql injection protection
    $notusername = trim($_POST['username']);
    $username = mysqli_real_escape_string($conn,$notusername);
    $notpassword = trim($_POST['password']);
    $password = mysqli_real_escape_string($conn,$notpassword);
    
    $sql = "select * from users where username = '".$username."'";
    
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretAPIkey = '6LdamuQjAAAAAF7aoJXlzSfEtSuKCPgqgPJe99lg';
        //reCAPTCHA response verification
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

	
    $rs = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($rs);
    

    if($numRows == 1)
    {
        
        $row = mysqli_fetch_assoc($rs);
        $pass = $row['password'];
        echo "$pass";
        if($password==$row['password'])
        {
        echo "Password verified";
        session_start();
            $_SESSION['username']= $username;
            $_SESSION['logat'] = true;
        header("location:https://orzataandreiphp.000webhostapp.com/home/");
        }
        else {
        	echo "Invalid Credentials";
        	}
     }
    else {
     	echo "Invalid Credentials";
     }
  
    }
}

?>
<html>
    <head>
        <title>Login Form Design</title>
        <link rel ="stylesheet" type="text/css" href="loginstyle.css">
        //<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>
    <body>
        <div class ="loginbox">
            <img src ="avatar.png" class="avatar">
            <h1>Login Here</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <p>Username</p>
                <input type="username" name ="username" placeholder ="Enter username or email" required>
                <p>Password</p>
                <input type="password" name = "password" placeholder="Enter password" required>
                <input type="submit" name ="submit" value = "Login">
                <a href="https://orzataandreiphp.000webhostapp.com/register/">Sign up</a><br>
                <a href="https://orzataandreiphp.000webhostapp.com">Back to front page</a>
            </form>
        </div>

    </body>
</html>