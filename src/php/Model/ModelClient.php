<?php

require_once('Conf.php');

class ModelClient
{
    public static function selectAllClientId()
    {
        $chCli = curl_init();
        $url = "https://evaluation-technique.lundimatin.biz/api/clients";
        curl_setopt($chCli, CURLOPT_URL, $url);
        curl_setopt($chCli, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($chCli, CURLOPT_USERPWD, ":" . Conf::getToken());
        curl_setopt($chCli, CURLOPT_RETURNTRANSFER, true);
        $cliList = curl_exec($chCli);
        curl_close($chCli);
        return $cliList;
    }

    public static function getClientById($id)
    {
        $chCli = curl_init();
        $url = "https://evaluation-technique.lundimatin.biz/api/clients/".$id;
        curl_setopt($chCli, CURLOPT_URL, $url);
        curl_setopt($chCli, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($chCli, CURLOPT_USERPWD, ":" . Conf::getToken());
        curl_setopt($chCli, CURLOPT_RETURNTRANSFER, true);
        $dataList = curl_exec($chCli);
        curl_close($chCli);
        return $dataList;
    }

    public static function selectAllClient()
    {
        $listCliArray = json_decode(self::selectAllClientId(), true);
        $clientList = [];
        if (isset($listCliArray['datas'])) {
            foreach ($listCliArray['datas'] as $clientId) {
                $clientList[] = self::getClientById($clientId['id']);
            }
        }
        return $clientList;
    }

    public static function searchClient($nom)
    {
        $chCli = curl_init();
        $url = "https://evaluation-technique.lundimatin.biz/api/clients/nom=".$nom;
        curl_setopt($chCli, CURLOPT_URL, $url);
        curl_setopt($chCli, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($chCli, CURLOPT_USERPWD, ":" . Conf::getToken());
        curl_setopt($chCli, CURLOPT_RETURNTRANSFER, true);
        $dataList = curl_exec($chCli);
        curl_close($chCli);
        $clientList = [];
        if (isset($dataList['datas'])) {
            foreach ($dataList['datas'] as $clientId) {
                $clientList[] = self::getClientById($clientId['id']);
            }
        }
        return $clientList;
    }
}