<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edition</title>
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  <script defer type="text/javascript" src="../../js/scriptEdition.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body>
<header><a href="../../index.html">Rechercher un contact</a></header>
<main>
  <div class="page-title">
    <p>nom contact</p>
    <a class="button" id="edit-button" href="#">Editer</a>
  </div>
  <div>
    <p><strong>EDITION</strong></p>
    <form>
      <table id="info-table">
        <tr>
          <td><label for="name">Prénom & NOM</label></td>
          <td><input type="text" id="name" name="name"></td>
        </tr>
        <tr>
          <td><label for="tel">Téléphone</label></td>
          <td><input type="text" id="tel" name="tel"></td>
        </tr>
        <tr>
          <td><label for="email">Email</label></td>
          <td><input type="text" id="email" name="email"></td>
        </tr>
        <tr>
          <td><label for="adr">Adresse</label></td>
          <td><input type="text" id="adr" name="adr"></td>
        </tr>
        <tr>
          <td><label for="postalCode">Code postal</label></td>
          <td><input type="text" id="postalCode" name="postalCode"></td>
        </tr>
        <tr>
          <td><label for="town">Ville</label></td>
          <td><input type="text" id="town" name="town"></td>
        </tr>
      </table>
      <div id="edit-buttons">
        <a id="cancel-button" onclick="retourInfo()">Annuler</a>
        <input id="save-button" type="submit" value="Enregistrer">
      </div>
    </form>
  </div>
</main>
</body>
</html>