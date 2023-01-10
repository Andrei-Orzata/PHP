<?php

//require_once ("config.php");
require_once ("component.php");

$conn = mysqli_connect("localhost","id17950791_andorzat","p0GNN~ruL*so6kO@","id17950791_easytour:travel");
if(!$conn) 
{
    die("Connection error" . mysqli_connect_error());
}




if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();

}

function createData(){
    $countries = textboxValue("country");
    $regions = textboxValue("region");
    $prices = textboxValue("price");

    if($countries && $regions && $prices){

        $sql = "INSERT INTO travel (country, region, price) 
                        VALUES ('$countries','$regions','$prices')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...!");
        }else{
            echo "Error";
        }

    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }else{
        return $textbox;
    }
}

function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


function getData(){
    $sql = "SELECT * FROM travel";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

function UpdateData(){
    $vid = textboxValue("id");
    $countries = textboxValue("country");
    $regions = textboxValue("region");
    $prices = textboxValue("price");

    if($countries && $regions && $prices){
        $sql = "
                    UPDATE books SET country='$countries', region = '$regions', price = '$prices' WHERE id='$vid';                    
        ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Data Successfully Updated");
        }else{
            TextNode("error", "Enable to Update Data");
        }

    }else{
        TextNode("error", "Select Data Using Edit Icon");
    }


}


function deleteRecord(){
    $vid = (int)textboxValue("id");

    $sql = "DELETE FROM books WHERE id=$vid";

    if(mysqli_query($GLOBALS['con'], $sql)){
        TextNode("success","Record Deleted Successfully...!");
    }else{
        TextNode("error","Enable to Delete Record...!");
    }

}


function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while ($row = mysqli_fetch_assoc($result)){
            $i++;
            if($i > 3){
                buttonElement("btn-deleteall", "btn btn-danger" ,"<i class='fas fa-trash'></i> Delete All", "deleteall", "");
                return;
            }
        }
    }
}




// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    return ($id + 1);
}









