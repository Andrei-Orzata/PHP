<?php
session_start();
session_unset();
session_destroy();
header("location:https://orzataandreiphp.000webhostapp.com/");
exit();

?>