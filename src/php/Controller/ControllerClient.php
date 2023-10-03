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

    static function getClientById() {
        $id = $_GET['id'];
        $client = ModelClient::getClientById($id);
        echo json_encode($client);
    }

//    static function search() {
//        $nom = $_GET['nom'];
//        $clients = ModelClient::searchClient($nom);
//        echo json_encode($clients);
//    }
}