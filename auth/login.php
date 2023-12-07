<?php
include "../Connection.php";

$email=filterRequest("cne");
$password=filterRequest("password");

$stmt=$con->prepare("SELECT * FROM etudiant WHERE `cne`=? AND `password`=?");

$stmt->execute(array($email,sha1($password)));
$data=$stmt->fetch(PDO::FETCH_ASSOC);

$count=$stmt->rowcount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"error"));
}
?>