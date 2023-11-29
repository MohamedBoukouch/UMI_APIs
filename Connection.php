<?php

$dsn ="mysql:host=localhost;dbname=umi";
$user="root";
$pass="";

global $con;
try{
    $con=new PDO($dsn,$user,$pass);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    include "fonctions.php";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
