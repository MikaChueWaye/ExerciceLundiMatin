<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Informations</title>
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <script defer type="text/javascript" src="../../js/scriptInfo.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<header><a href="../../index.html">Rechercher un contact</a></header>
<main>
  <div class="page-title">
    <p>nom contact</p>
    <a class="button" id="edit-button" onclick="editer()">Editer</a>
  </div>
  <div>
    <p><strong>INFORMATIONS</strong></p>
    <table id="info-table">
      <tr>
        <td>Prénom & NOM</td>
        <td id="nom"></td>
      </tr>
      <tr>
        <td>Téléphone</td>
        <td id="tel"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td id="email"></td>
      </tr>
      <tr>
        <td>Adresse</td>
        <td id="adr"></td>
      </tr>
    </table>
  </div>
</main>
</body>
</html>