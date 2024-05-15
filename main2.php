<?php
session_start();

// Include the connexion file to establish a database connection
require_once 'connexion2.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input validation
    $nom = trim($_POST['nom2']);
    $email = trim($_POST['email2']);
    $password = trim($_POST['password2']);
    $confirmPassword = $_POST['confirmPassword'];

    if(empty($nom) || empty($email) || empty($password) || empty($confirmPassword)){
        echo "<script>alert('Please fill up all the required fields!')</script>";
        header('location:login.php');
        exit;

    }

    // Password confirmation
    if($password !== $confirmPassword){
        echo "<script>alert('Passwords do not match!')</script>";
        exit;
    }

    // Secure password handling
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
    // Prepared statement to prevent SQL injection
    try{
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `utilisateur2` (nom, email, password) VALUES (:nom, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");  
     
        // header('location:login.php');
        exit;
    }
    
    catch(PDOException $e){
        echo "<script>alert('An error occurred while creating the user. Please try again later.')</script>";
        exit;

    }
    

    
}



?>




