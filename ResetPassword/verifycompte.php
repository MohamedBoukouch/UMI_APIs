<?php
include "../Connection.php";
$verifycode=filterRequest("verifycode");
$email=filterRequest("email");

$stmt=$con->prepare("SELECT * FROM etudiant WHERE `email`=? AND `verifycode`=?");
$stmt->execute(array($email,$verifycode));

$count=$stmt->rowcount();
if($count>0){
    echo json_encode(array("status"=>"success"));
}else{
    echo json_encode(array("status"=>"error"));
}

?>