<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD1_ConnexionMysql_EXO3</title>
</head>

<body>
    <?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $database = "uvbf-dwa-2023";

    try {
        // Création de l'objet PDO
        $pdo = new PDO("mysql:host=$serverName;dbname=$database", $username, $password);

        // Configurer PDO pour afficher les erreurs
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // La connexion à la base de données a réussi
        echo "<p>La connexion à la BD a réussi en utilisant la méthode PDO !</p>";

        // Vous pouvez effectuer d'autres opérations avec la base de données ici
    
        // Fermer la connexion à la base de données
        $pdo = null;
    } catch (PDOException $e) {
        // En cas d'échec de la connexion, afficher un message d'erreur
        echo "<p>Une erreur est survenue lors de la connexion à la BD en utilisant la méthode PDO !</p>";
        echo "<p>Détails de l'erreur : " . $e->getMessage() . "</p>";
        // Terminer l'exécution du script PHP
        die();
    }
    ?>

</body>

</html>