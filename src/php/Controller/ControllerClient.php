<?php

require_once"../Model/ModelClient.php";

$action = $_GET["action"] ?? "read";
$actions = get_class_methods("ControllerClient");
if (in_array($action, $actions))
    ControllerClient::$action();

class ControllerClient
{
    static function readAll() {
        $clients = ModelClient::selectAllClient();
        echo json_encode($clients);
    }


}