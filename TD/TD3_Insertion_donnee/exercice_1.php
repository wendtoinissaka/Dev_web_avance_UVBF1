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

    // Vérifier si des données ont été soumises via la méthode GET
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Récupérer les données du formulaire GET
        $nomPersonne = $_GET["nomPersonne"];
        $prenomPersonne = $_GET["prenomPersonne"];
        $dateNaissancePersonne = $_GET["dateNaissancePersonne"];
        $genrePersonne = $_GET["genrePersonne"];
        $administrateur = isset($_GET["administrateur"]) ? 1 : 0;

        // Préparer la requête paramétrée d'insertion
        $query = $pdo->prepare("INSERT INTO personne (nomPersonne, prenomPersonne, dateNaissancePersonne, genrePersonne,    administrateur) 
                               VALUES (:nom, :prenom, :dateNaissance, :genre, :administrateur)");

        // Binder les valeurs aux paramètres de la requête
        $query->bindParam(":nom", $nomPersonne);
        $query->bindParam(":prenom", $prenomPersonne);
        $query->bindParam(":dateNaissance", $dateNaissancePersonne);
        $query->bindParam(":genre", $genrePersonne);
        $query->bindParam(":administrateur", $administrateur);

        // Exécuter la requête d'insertion
        $query->execute();

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout</title>
</head>

<body>
    <h2>Ajouter une personne</h2>
    <form method="GET" action="">
        <label for="nomPersonne">Nom:</label>
        <input type="text" name="nomPersonne" required><br>

        <label for="prenomPersonne">Prénom:</label>
        <input type="text" name="prenomPersonne" required><br>

        <label for="dateNaissancePersonne">Date de naissance:</label>
        <input type="date" name="dateNaissancePersonne" required><br>

        <label for="genrePersonne">Genre:</label>
        <input type="text" name="genrePersonne" required><br>

        <label for="administrateur">Administrateur:</label>
        <input type="checkbox" name="administrateur" value="1"><br>

        <input type="submit" value="Ajouter">
    </form>
</body>

</html>