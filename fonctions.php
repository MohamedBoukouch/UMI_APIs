<?php
define('MB',1048576);
// include "Connection.php";

function filterRequest($requestname){
    return htmlspecialchars(strip_tags($_POST[$requestname]));
}

function imageUpload($imageRequest)
{

    $imges=$_FILES["$imageRequest"];
    $file_name=$_FILES["$imageRequest"]["name"];
    $location="upload/";
    $image_name=implode(",",$file_name);
   
    if(!empty($image_name)){
       foreach($file_name as $key =>$val){
           $targetpath=$location .$val;
           move_uploaded_file($_FILES["$imageRequest"]["tmp_name"][$key],$targetpath);
       }
       return $image_name;
    }
}   

function sendEmail($to,$title,$body)
{
    $header="From :boukouchmohamed7@gmail.com";
    mail($to,$title,$body,$header);
    return "Success";
}

function sendGCM($title, $message, $topic, $pageid, $pagename)
{


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default"

        ),
        'data' => array(
            "pageid" => $pageid,
            "pagename" => $pagename
        )

    );


    $fields = json_encode($fields);
    $headers = array(
        'Authorization: key=' . "AAAASu-d5yk:APA91bED8Z2ZS4NW85cUyuigaOns_koAKhkprPunZtBYfcPMhujNZMdVeTlgfjzBhHxceQXCiimj1ej01NCUVvM2OU6CxVCBJ02aRShfqR_qG2QUNa318LF1Tm84xdIYEJYifp-W-7-8",
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    return $result;
    curl_close($ch);
}



?>