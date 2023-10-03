document.addEventListener("DOMContentLoaded", clientInfo);

//affiche les informations d'un client
function clientInfo()
{
    requeteAJAX("Client", "getClientById", callbackInfo);
}

//effectue une requete à l'API en fonction de l'id du client donné dans la méthode GET de l'HTML
function requeteAJAX(type, action, callback)
{
    let url = "../Controller/Controller"+ encodeURIComponent(type) +".php?action="+ encodeURIComponent(action) +'&' + window.location.search.substr(1);
    let requete = new XMLHttpRequest();
    requete.open("POST", url, true);

    requete.addEventListener("load", function () {
        callback(requete);
    });
    requete.send(null);
}

//callback appelé lors du chargelent de la page
function callbackInfo(req)
{
    let jsonClient = JSON.parse(req.responseText);
    let client = JSON.parse(jsonClient);
    afficherInfo(client);
    document.getElementById("nom")
}

//affiche les informations du client
function afficherInfo(client)
{
    document.getElementById("nomContact").innerText = client.datas.nom;
    document.getElementById("nom").innerText = client.datas.nom;
    document.getElementById("tel").innerText = client.datas.tel;
    document.getElementById("email").innerText = client.datas.email;
    document.getElementById("adr").innerText = client.datas.adr;
}

//en cours....
function editer()
{
    location.replace("contactEdition.php?"+window.location.search.substr(1));
}

//{"code":200,"message":"","datas":{"id":"C-00003","nom":"Leon Frelon8011","date_creation":"2015-12-11 08:40:44","email":"maya333@desruches.fr","tel":"06 26 51 45 81 333","adresse":"11519 avenue villeneuve d'angouleme 44","code_postal":"34700 533","ville":"ville 33"},"warnings":[]}