document.addEventListener("DOMContentLoaded", creer_interface);

function creer_interface()
{
    requeteAJAX("Client", "readAll", callbackClient);
}

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

function consulterClient(id)
{
    location.replace("php/View/contactInfo.php?id=" + id);
}

function callbackClient(req)
{
     let tab = JSON.parse(req.responseText);
     afficherClients(tab)
}

function rechercheClient()
{
    requeteAJAX("Client", "search", callbackClient);
}