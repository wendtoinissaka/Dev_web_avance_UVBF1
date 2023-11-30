<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Ajout de Personne</title>

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin-bottom: 8px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            color: #ff0000;
            /* couleur rouge pour les messages d'erreur */
        }
    </style>
</head>

<body>

    <form method="POST" action="">
        <label for="nomPersonne">Nom :</label>
        <input type="text" name="nomPersonne" required>

        <label for="prenomPersonne">Prénom :</label>
        <input type="text" name="prenomPersonne" required>

        <label for="dateNaissancePersonne">Date de naissance :</label>
        <input type="date" name="dateNaissancePersonne" required>

        <label for="genrePersonne">Genre :</label>
        <select name="genrePersonne">
            <option value="HOMME">Homme</option>
            <option value="FEMME">Femme</option>
        </select>

        <label for="administrateur">Administrateur :</label>
        <input type="checkbox" name="administrateur" value="0" id="administrateurCheckbox"
            onchange="updateCheckboxValue(this)">

        <input type="submit" value="Ajouter">
    </form>

    <div class="message">
        <?php
        // // Votre code PHP de traitement ici
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     // Vérification des données et traitement
        
        //     // Affichage du message en fonction du résultat
        //     if (/* condition de réussite */) {
        //         echo "Enregistrement inséré avec succès.";
        //     } else {
        //         echo "Erreur : Le message d'erreur ici.";
        //     }
        // }
        ?>
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
                $sth->bindParam(":administrateur", $administrateur, PDO::PARAM_INT) or die(print_r($sth->errorInfo()));

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




    </div>

    <script>
        function updateCheckboxValue(checkbox) {
            checkbox.value = checkbox.checked ? "1" : "0";
        }
    </script>

</body>

</html>