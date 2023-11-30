<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="GET" action="">
        <label>Nom</label>
        <input type="text" name="nomPersonne">
        <br />

        <label>Prenom</label>
        <input type="text" name="prenomPersonne">
        <br />

        <label>Date de naissance</label>
        <input type="date" name="dateNaissancePersonne">
        <br />

        <label>Genre</label>
        <select name="genrePersonne">
            <option value="HOMME">Homme</option>
            <option value="FEMME">Femme</option>
        </select>
        <br />

        <label>Administrateur</label>
        <select name="administrateur">
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
        <br />

        <button type="submit">Enregistrer</button>
        <button type="reset">Effacer</button>
    </form>
</body>

</html>



<?php
try {
    $connexion = new PDO("mysql:host=localhost;dbname=uvbf-dwa-2023", "uvbf-dwa-2023", "elcapo");

    // Définir le mode d'erreur PDO sur exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si les champs ne sont pas vides
    if (!empty($_POST['nomPersonne']) && !empty($_POST['prenomPersonne'])) {
        // Utiliser une requête préparée pour éviter les attaques par injection SQL
        $stmt = $connexion->prepare("INSERT INTO `uvbf-dwa-2023` (nomPersonne, prenomPersonne) VALUES (:nom, :prenom)");

        // Binder les paramètres à la requête préparée
        $stmt->bindParam(':nom', $_POST['nomPersonne']);
        $stmt->bindParam(':prenom', $_POST['prenomPersonne']);

        // Exécution de la requête
        $stmt->execute();

        echo "Enregistrement ajouté avec succès !";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermeture de la connexion
$connexion = null;
?>