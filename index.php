<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<header><a href="index.php">Rechercher un contact</a></header>
<main>
    <div class="page-title">
        <p>Recherche d'une fiche de contact</p>
    </div>
    <div>
        <form id="search-element">
            <label for="searchQuery">Renseigner un nom ou une dénomination</label>
            <input type="text" id="searchQuery" name="searchQuery">
            <input class="button" type="submit" value="Rechercher">
        </form>
    </div>
    <div>
        <table id="contact-table">
            <tr>
                <td></td>
                <td>Nom</td>
                <td>Adresse</td>
                <td>Ville</td>
                <td>Téléphone</td>
            </tr>
            <tr>
                <td></td>
                <td>Toto</td>
                <td>Oui</td>
                <td>Non</td>
                <td>0000000</td>
            </tr>
            <?php
            echo "test";

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
            $token = $data['datas']['token'];

            $chCli = curl_init();
            $url = "https://evaluation-technique.lundimatin.biz/api/clients";
            curl_setopt($chCli, CURLOPT_URL, $url);
            curl_setopt($chCli, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($chCli, CURLOPT_USERPWD, ":" . $token);
            curl_setopt($chCli, CURLOPT_RETURNTRANSFER, true);
            $listCli = curl_exec($chCli);
            curl_close($chCli);

            foreach($data['datas'] as $client) {
                echo "ID: " . $client['id'] . ", Nom: " . $client['nom'] . ", Ville: " . $client['ville'] . ", Code Postal: " . $client['code_postal'] . "<br>";
            }
            ?>
        </table>
    </div>
</main>
</body>
</html>