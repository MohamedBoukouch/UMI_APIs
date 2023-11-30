<?php
include "../Connection.php";


$user_id = filterRequest("user_id");
$oldpassword=sha1(filterRequest("oldpassword"));
$newpassword=sha1(filterRequest("newpassword"));



$stmt=$con->prepare("UPDATE  etudiant SET `password`=? WHERE `password`=? AND `id`=?");
$stmt->execute(array($newpassword,$oldpassword,$user_id));

$count=$stmt->rowcount();

if($count>0){
    echo json_encode(array("status"=>"success")); 
}else{
    echo json_encode(array("status"=>"error"));
}

?>