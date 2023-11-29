<?php
include "../Connection.php";

$nom = filterRequest("nom");
$prenom = filterRequest("prenom");
$email=filterRequest("email");
$password=sha1(filterRequest("password"));
$cne=filterRequest("cne");

$verifycode=rand(1000,99999);

$stmt=$con->prepare("
INSERT INTO `etudiant` (`nom`,`prenom`,`cne`,`email`,`password`,`verifycode`)
VALUES(?,?,?,?,?,?)
");

$stmt->execute(array($nom,$prenom,$cne,$email,$password,$verifycode));

$count=$stmt->rowcount();
if($count>0){
    
    if(sendEmail($email,"Verfiy Code Taleb","Verfiy code $verifycode")=="Success"){
        echo json_encode(array("status"=>"success","email"=>"email send Success"));
    }else{
        echo json_encode(array("status"=>"success","email"=>"failed send Success"));
    }
 
}else{
    echo json_encode(array("status"=>"error"));
}
?>