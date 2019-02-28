<?php

    function getObject($id){
        $userToken = $_SESSION['token'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, UbspacesURL::$URL.'getObject/?id='.$id);
        $header = array(
                'Authorization: '.$userToken
                    );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        // curl_setopt($curl, CURLOPT_POST, true);
        // curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonObj);
        //curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        return json_decode($result);
    }

?>