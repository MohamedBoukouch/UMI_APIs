<?php
include "../Connection.php";
$email=filterRequest("email");
$verifycode=rand(1000,99999);


$stmt=$con->prepare("SELECT * FROM etudiants WHERE `email`=?");

$stmt->execute(array($email));
// $data->$stmt->fetch(PDO::FETCH_ASSOC);

$count=$stmt->rowcount();
if($count>0){

    //Updateverifycode
    $stmt=$con->prepare("UPDATE  etudiants SET `verifycode`=? WHERE `email`=? ");
    $stmt->execute(array($verifycode,$email,));
    $countt=$stmt->rowcount();
    
    if($countt>0){
        if(sendEmail($email,"Verfiy Code Taleb","Verfiy code $verifycode")=="Success"){
            echo json_encode(array("status"=>"success"));
        }  
    }

}else{
    echo json_encode(array("status"=>"Error"));
}

// if($count>0){
//     echo "yeah";
//     // update($verifycode,$email);
//     // if(sendEmail($email,"Verfiy Code Taleb","Verfiy code $verifycode")=="Success"){
//     //     echo json_encode(array("status"=>"success","email"=>"email send Success"));
//     // }else{
//     //     echo json_encode(array("status"=>"success","email"=>"failed send Success"));
//     // }
// }else{
//     echo "error";
// }


// $count=$stmt->rowcount();
// $stmttow=$contow->prepare("UPDATE  users SET `verifycode`=$verifycode WHERE `email`=$email ");
// $stmttow->execute(array($verifycode,$email));
// $counttow=$stmttow->rowcount();

// if($count>0 ){
//     return "success"
// // $stmt=$con->prepare("UPDATE  users SET `verifycode`=$verifycode WHERE `email`=$email ");
// // $stmt->execute(array($email,$verifycode));
// // $count=$stmt->rowcount();

// // sendEmail($email,"Verfiy Code Taleb","Verfiy code $verifycode");
// //     if(sendEmail($email,"Verfiy Code Taleb","Verfiy code $verifycode")=="success"){
//         // echo json_encode(array("status"=>"success","email"=>"email send Success"));    
// }else{
//     return
//     // echo json_encode(array("status"=>"success","email"=>"failed send Success"));
// }
?>