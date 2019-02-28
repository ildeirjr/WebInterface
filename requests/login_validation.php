<?php

include '../UbspacesURL.php';

if(isset($_POST)){
    session_start();

    $jsonObj = json_encode($_POST);

    echo($jsonObj);

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'validateLogin/');
    $header = array(
            'Authorization: 1gdh87efuhwi',
            'Content-Type: application/json',
            'Content-Length: '.strlen($jsonObj)
                );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonObj);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    if($result == '0'){
        $_SESSION['error'] = true;
        header("Location:../login.php");
    } else {
        $jsonAuth = json_decode($result);
        $_SESSION['idUser'] = $jsonAuth->idUser;
        $_SESSION['token'] = $jsonAuth->token;
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'getOperator/?id='.$_SESSION['idUser']);
        $header = array(
                'Authorization: '.$_SESSION['token']
                    );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $jsonAuth = json_decode($result);
        $_SESSION['nome'] = $jsonAuth->nome;
        $_SESSION['email'] = $jsonAuth->email;
        $_SESSION['data_nasc'] = $jsonAuth->data_nasc;
        $_SESSION['depto'] = $jsonAuth->depto;

        header("Location:../home.php");
    }

}

?>