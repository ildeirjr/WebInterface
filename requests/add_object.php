<?php

include '../UbspacesURL.php';

if(isset($_POST)){
    session_start();
    $token = $_SESSION['token'];

    $jsonObj = json_encode($_POST);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'addObject/');
    $header = array(
            'Authorization: '.$token,
            'Content-Type: application/json',
            'Content-Length: '.strlen($jsonObj)
                );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonObj);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    if($result == '23000'){
        //header("Location:../cadastrar.php?status=duplicateEntry");
        echo "duplicate_id";
    } else if($result == '00000'){
        //header("Location:../cadastrar.php?status=ok");
        echo "ok";
    }
    //echo($result);

}

?>