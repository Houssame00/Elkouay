<?php


// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "compte2";

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$basededonnees", $utilisateur, $motdepasse );
    // Configuration pour lever une exception en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

    // Vérification de l'envoi du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
        $nom_utilisateur = $_POST["nom"];
        $email = $_POST["email"]; // Corrected to match the form field name
        $mot_de_passe = $_POST["password"];
        
        // Requête préparée pour sélectionner l'utilisateur
        $requete = $connexion->prepare("SELECT * FROM utilisateur2 WHERE nom = :nom AND email = :email AND password = :password");
        $requete->bindParam(':nom', $nom_utilisateur);
        $requete->bindParam(':email', $email); // Corrected to match the SQL query parameter name
        $requete->bindParam(':password', $mot_de_passe);
        $requete->execute();
        
        // Vérification du résultat de la requête
        if ($requete->rowCount() == 1) {
            $newWebsite = "http://localhost/PROJET2/deconnexion.php"; 
            header("Location: $newWebsite");
            exit; // Make sure to exit to prevent further execution
    
        } else {
            // L'utilisateur n'existe pas dans la base de données ou les informations sont incorrectes
            echo "Nom d'utilisateur ou Email ou mot de passe incorrect.";
        }
    }
} catch(PDOException $e) {
    // En cas d'erreur de connexion à la base de données
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
        <form method="post" action="main2.php">
                <h1>Create Account</h1>
                <span>entrez vous informations</span>
                <input type="text" placeholder="Username" name="nom2">
                <input type="email" placeholder="Email" name="email2">
                <input type="password" placeholder="Password" name="password2">
                <input type="password" placeholder="password" name="confirmPassword">
                <button>Create</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <h1>Login</h1>

                <span>entrez vous informations</span>
                <input type="text" placeholder="Username" name="nom">
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="password">

                <button type="submit" name="submit">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Se connecter!</h1>

                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>je n'ai pas de compte!</h1>

                    <button class="hidden" id="register" name="registre">create</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>