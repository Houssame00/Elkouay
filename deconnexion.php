 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout </title>
    <style>
        
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        
        .navbar {
            background-color: #512da8;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .logout-button {
            float: right;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            background-color: #5c6bc0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #e03030;
        }

        
        .container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
        }

        
        .left-column {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        
        .right-column {
            flex: 1;
            background-color: #fff;
            padding: 20px;
            margin-left: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .right-column {
                margin-left: 0;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="#">Home</a>
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Contact</a>
    <form method="post" action="deconnexion.php">
        <button class="logout-button" name="logout">Logout</button>
    </form>
</div>

<div class="container">
    <div class="left-column">
        <h2>Left Column</h2>
        <p>This is the left column of the page. It can contain any content you want.</p>
    </div>

    <div class="right-column">
        <h2>Right Column</h2>
        <p>This is the right column of the page. It can contain any content you want.</p>
    </div>
</div>

</body>
</html>
  



<?php
 // Vérifier si le bouton de déconnexion est cliqué
if(isset($_POST['logout'])) {
    // Effectuer les actions de déconnexion ici (par exemple, détruire la session, redirection vers une autre page)
    
    // Démarrer la session
    session_start();

    // Supprimer toutes les variables de session
    $_SESSION = array();

    // Détruire la session
    session_destroy();

    // Rediriger vers une autre page
    header("Location: login.php");
    exit; // Assurez-vous de sortir après la redirection
}
 
?>






