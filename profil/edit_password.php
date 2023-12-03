<?php
include "../Connection.php";


$cne = filterRequest("cne");
$oldpassword=sha1(filterRequest("oldpassword"));
$newpassword=sha1(filterRequest("newpassword"));



$stmt=$con->prepare("UPDATE  etudiant SET `password`=? WHERE `password`=? AND `cne`=?");
$stmt->execute(array($newpassword,$oldpassword,$cne));

$count=$stmt->rowcount();

if($count>0){
    echo json_encode(array("status"=>"success")); 
}else{
    echo json_encode(array("status"=>"error"));
}

?>