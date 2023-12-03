<?php
include "../Connection.php";

$stmt=$con->prepare("SELECT * FROM annonce");

$stmt->execute(array());
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

$count=$stmt->rowcount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"error"));
}
?>