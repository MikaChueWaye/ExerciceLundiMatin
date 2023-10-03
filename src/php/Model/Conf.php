<?php

class Conf {
    static public function getToken(){
        $ch = curl_init();
        $url = "https://evaluation-technique.lundimatin.biz/api/auth";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array(
            "Content-Type: application/json",
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $data = array(
            "username" => "test_api",
            "password" => "api123456",
            "password_type" => 0,
            "code_application" => "webservice_externe",
            "code_version" => "1"
        );
        $postData = json_encode($data);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        return $data['datas']['token'];
    }
}


