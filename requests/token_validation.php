<?php

include 'UbspacesURL.php';

session_start();

$userToken = $_SESSION['token'];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'idle/');
$header = array(
        'Authorization: '.$userToken
            );
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
// curl_setopt($curl, CURLOPT_POST, true);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonObj);
curl_setopt($curl, CURLOPT_NOBODY, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if($httpCode == '401'){
    if(isset($_SESSION['token'])){
        $_SESSION = array();
        session_destroy();
    }
    header("Location:login.php");
}

echo($result);
?>