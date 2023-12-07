<?php

$dsn ="mysql:host=localhost;dbname=id21574197_umi";
$user="id21574197_umi_db";
$pass="Mohamed_2003";

global $con;
try{
    $con=new PDO($dsn,$user,$pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    include "fonctions.php";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
