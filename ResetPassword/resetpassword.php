<?php
include "../Connection.php";
$email=filterRequest("email");
$password=sha1(filterRequest("password"));


$stmt=$con->prepare("UPDATE  etudiants SET `password`=? WHERE `email`=? ");
$stmt->execute(array($password,$email));
$count=$stmt->rowcount();

if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
    echo json_encode(array("status"=>"error"));
}
?>