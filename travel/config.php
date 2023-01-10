<?php

function Createdb(){
    $servername = "localhost";
    $username = "andorzat";
    $password = "p0GNN~ruL*so6kO@";
    $dbname = "travel";

 
    $con = mysqli_connect($servername, $username, $password);

    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS books(
                            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                            country VARCHAR (30) NOT NULL,
                            region VARCHAR (30),
                            price FLOAT 
                        );
        ";

        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
