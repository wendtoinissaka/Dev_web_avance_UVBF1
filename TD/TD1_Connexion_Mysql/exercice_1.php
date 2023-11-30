<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD1_ConnexionMysql_EXO1</title>
    <style>
        .centrer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-weight: bold;
            font-size: 40px;
            
        }
    </style>
</head>

<body>
    <?php
    $serverName = "localhost";
    $username = "uvbf-dwa-2023";
    $password = "elcapo";
    $database = "uvbf-dwa-2023";

    $mysqli = mysqli_connect($serverName, $username, $password, $database);

    if (!$mysqli) {
        echo "<p>Une erreur est survenue lors de la connexion à la BD en utilisant la méthode mysqli procédurale !</p>";
        echo "<p>Détails de l'erreur : " . mysqli_connect_error() . "</p>";
        die();
    } else {
        echo "<p class='centrer'>La connexion à la BD a réussi en utilisant la méthode mysqli procédurale !</p>";

        mysqli_close($mysqli);
    }
    ?>
</body>

</html>