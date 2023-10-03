document.addEventListener("DOMContentLoaded", clientInfo);

let $id ="";

//affiche les informations d'un client
function clientInfo()
{
    $id = window.location.search.substr(1);
    requeteAJAX("Client", "getClientById", callbackInfo);
}

//effectue une requete à l'API en fonction de l'id du client donné dans la méthode GET de l'HTML
function requeteAJAX(type, action, callback)
{
    let url = "../Controller/Controller"+ encodeURIComponent(type) +".php?action="+ encodeURIComponent(action) +'&' + $id;
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
    document.getElementById("name").value = client.datas.nom;
    document.getElementById("tel").value = client.datas.tel;
    document.getElementById("email").value = client.datas.email;
    document.getElementById("adr").value = client.datas.adr;
    document.getElementById("postalCode").value = client.datas.code_postal;
    document.getElementById("town").value = client.datas.ville;
}

//En cours....
function retourInfo()
{
    location.replace("contactInfo.php?"+window.location.search.substr(1));
}

function miseAJour()
{

}