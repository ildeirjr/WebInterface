<?php

include '../UbspacesURL.php';

if(isset($_POST)){
    session_start();
    $token = $_SESSION['token'];

    $jsonObj = json_encode($_POST);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'uploadImg/');
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
    echo($result);
}

?>