<?php

if(isset($_POST['submit']))
{

$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$subject= filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message= filter_var($_POST['textmessage'], FILTER_SANITIZE_STRING);

$mailTo = "orzata.andrei@gmail.com";
$headers ="From: ".$email;
$formcontent="You got contacted by Costumer:$name\nEmail:$email\nSubject:$subject \nMessage:$message";

if(mail($mailTo, $subject, $formcontent, $headers))
{
header("location:https://orzataandreiphp.000webhostapp.com/home/");
}
else 
{
die(header("location: 404.php"));
}
}
?>
<html>
    <head>
        <title>Contact US</title>
        <link rel="stylesheet" href="contact.css">
    </head>
    <body>
        <div class="contact-form">
            <form action="index.php" method="POST">
            <h1>Contact Us</h1>
            <div class="field">
                <label>Full Name:</label>
                <input type="text" name="name" placeholder="Enter your name here" required>
            </div>
            <div class="field">
                <label>Email:</label>
                <input type="email" name="email" placeholder="Introduce a valid e-mail" required>
            </div>
            <div class="field">
                <label>Subject:</label>
                <input type="text" name="Subject" placeholder="Enter the subject of your email here" required>
            </div>
            <div class="field">
                <label>Message:</label>
                <textarea name="message" placeholder="Enter your message here"></textarea>
            </div>
            <input type ="submit" name="submit" value="Send">
        </form>
        </div>
    </body>
</html>