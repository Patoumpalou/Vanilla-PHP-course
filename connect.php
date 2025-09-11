<?php


    $host = "localhost";      // Hôte (serveur MySQL)
    $dbname = "ecommerce"; // Nom de ta base de données
    $username = "root";       // Nom d'utilisateur (par défaut sous WAMP)
    $password = "";           // Mot de passe (vide par défaut)

    try {
        // Connexion à MySQL avec PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        
        // Activer les erreurs PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "❌ Erreur de connexion : " . $e->getMessage();
        exit;
    }


    $tab = [
        'name' => 'John',
        'age' => 30,
        'city' => 'New York'
    ];

    foreach ($tab as $key => $value) {
        echo "Key: $key, Value: $value\n";
    }
    
    foreach ($tab as $value) {
        echo " Value: $value\n";
    }


    exit;



?>