<?php
$serverName = "localhost";
$username = "root";
$password = "";
$database = "uvbf-dwa-2023";

try {
    // Connexion à la base de données en utilisant la méthode PDO
    $pdo = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);

    // Configurer PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // if ($_SERVER["REQUEST_METHOD"] == "POST")
    // Vérifier si des données ont été soumises via la méthode POST
    if (isset($_POST) && !empty($_POST)) {
        // Récupérer les données du formulaire POST
        $nomPersonne = $_POST["nomPersonne"];
        $prenomPersonne = $_POST["prenomPersonne"];
        $dateNaissancePersonne = $_POST["dateNaissancePersonne"];
        $genrePersonne = $_POST["genrePersonne"];
        $administrateur = $_POST["administrateur"];


        // Préparer la requête paramétrée d'insertion
        $sth = $pdo->prepare("INSERT INTO personne (nomPersonne, prenomPersonne, dateNaissancePersonne, genrePersonne, administrateur) 
                               VALUES (:nom, :prenom, :dateNaissance, :genre, :administrateur)");

        // Binder les valeurs aux paramètres de la requête
        $sth->bindParam(":nom", $nomPersonne);
        $sth->bindParam(":prenom", $prenomPersonne);
        $sth->bindParam(":dateNaissance", $dateNaissancePersonne);
        $sth->bindParam(":genre", $genrePersonne);
        $sth->bindParam(":administrateur", $administrateur, PDO::PARAM_INT);

        // Exécuter la requête d'insertion
        $sth->execute();

        // Afficher un message de réussite
        echo "<p>Enregistrement ajouté avec succès !</p>";
    }

    // Fermer la connexion à la base de données
    $pdo = null;
} catch (PDOException $e) {
    // En cas d'erreur, afficher un message d'erreur avec les détails
    echo "<p>Une erreur est survenue : " . $e->getMessage() . "</p>";
}
?>













<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout de Personne</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form method="POST" action="">
        <label for="nomPersonne">Nom </label>
        <input type="text" name="nomPersonne" required>

        <label for="prenomPersonne">Prénom </label>
        <input type="text" name="prenomPersonne" required>

        <label for="dateNaissancePersonne">Date de naissance </label>
        <input type="date" name="dateNaissancePersonne" required>

        <label for="genrePersonne">Genre </label>
        <select name="genrePersonne">
            <option value="HOMME">Homme</option>
            <option value="FEMME">Femme</option>
        </select>

        <label for="administrateur" name="administrateur">Administrateur </label>
        <input type="checkbox" name="administrateur" value="0" id="administrateurCheckbox"
            onchange="updateCheckboxValue(this)">

        <input type="submit" value="Ajouter">
    </form>

</body>

</html> -->