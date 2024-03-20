<?php
// Définition des variables et initialisation avec des valeurs vides
$nameErr = $emailErr = $messageErr = "";
$name = $email = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation du nom
    if (empty($_POST["name"])) {
        $nameErr = "Le nom est requis";
    } else {
        $name = test_input($_POST["name"]);
        // Vérifier si le nom contient uniquement des lettres et des espaces
        if (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $name)) {
            $nameErr = "Seules les lettres et les espaces sont autorisés";
        }
    }
    
    // Validation de l'e-mail
    if (empty($_POST["email"])) {
        $emailErr = "L'e-mail est requis";
    } else {
        $email = test_input($_POST["email"]);
        // Vérifier si l'e-mail est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format d'e-mail invalide";
        }
    }
    
    // Validation du message
    if (empty($_POST["message"])) {
        $messageErr = "Le message est requis";
    } else {
        $message = test_input($_POST["message"]);
    }

    // Si toutes les validations sont réussies, envoyer l'e-mail
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $to = "tigerhead28@hotmail.com"; // Remplacez par votre adresse e-mail
        $subject = "Formulaire de contact";
        $headers = "From: $email \r\n";
        // Envoyer l'e-mail
        mail($to, $subject, $message, $headers);
        echo "<p style='color:green;'>Votre message a été envoyé avec succès. Nous vous contacterons bientôt.</p>";
    }
}

// Fonction de validation des données
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>