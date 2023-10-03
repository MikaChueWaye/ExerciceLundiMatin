document.addEventListener("DOMContentLoaded", creer_interface);

//Remplit le tableau avec tous les clients disponibles
function creer_interface()
{
    requeteAJAX("Client", "readAll", callbackClient);
}

//Une requete AJAX pour interroger l'API
function requeteAJAX(type, action, callback)
{
    let url = "php/Controller/Controller"+ encodeURIComponent(type) +".php?action="+ encodeURIComponent(action);
    let requete = new XMLHttpRequest();
    requete.open("POST", url, true);

    requete.addEventListener("load", function () {
        callback(requete);
    });
    requete.send(null);
}

//Une fonction pour afficher les clients à partir d'un tableau de JSON
function afficherClients(tableau)
{
    tableau.forEach((item) => {
        console.log(item);
        let client = JSON.parse(item);
        let tr = document.createElement('tr');
        tr.addEventListener("click", function (event)
        {
            consulterClient(client.datas.id);
        });
        let tdImg = document.createElement('td');
        let tdNom = document.createElement('td');
        tdNom.innerText = client.datas.nom;
        let tdAdresse = document.createElement('td');
        tdAdresse.innerText = client.datas.adresse;
        let tdVille = document.createElement('td');
        tdVille.innerText = client.datas.ville;
        let tdTel = document.createElement('td');
        tdTel.innerText = client.datas.tel;
        tr.appendChild(tdImg);
        tr.appendChild(tdNom);
        tr.appendChild(tdAdresse);
        tr.appendChild(tdVille);
        tr.appendChild(tdTel);
        document.getElementById("contact-table").appendChild(tr);
    });
}

//renvoie vers la page d'information sur les clients
function consulterClient(id)
{
    location.replace("php/View/contactInfo.php?id=" + id);
}

//callback basique, appelé après avoir chargé la page
function callbackClient(req)
{
     let tab = JSON.parse(req.responseText);
     afficherClients(tab)
}

//En cours....
function rechercheClient()
{
    requeteAJAX("Client", "search", callbackClient);
}