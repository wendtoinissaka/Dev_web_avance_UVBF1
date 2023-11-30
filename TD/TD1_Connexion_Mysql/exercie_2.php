<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD1_ConnexionMysql_EXO2</title>
</head>

<body>
    <?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $database = "uvbf-dwa-2023";

    // Création de l'objet MySQLi
    $mysqli = new mysqli($serverName, $username, $password, $database);

    // Vérification de la connexion
    if ($mysqli->connect_error) {
        // En cas d'échec de la connexion, afficher un message d'erreur
        echo "<p>Une erreur est survenue lors de la connexion à la BD en utilisant la méthode MySQLi objet !</p>";
        echo "<p>Détails de l'erreur : " . $mysqli->connect_error . "</p>";
        // Terminer l'exécution du script PHP
        die();
    } else {
        // La connexion à la base de données a réussi
        echo "<p>La connexion à la BD a réussi en utilisant la méthode MySQLi objet !</p>";

        // Vous pouvez effectuer d'autres opérations avec la base de données ici
    
        // Fermer la connexion à la base de données
        $mysqli->close();
    }
    ?>

</body>

</html>