<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = $_POST["message"];

    $to = "tigerhead28@hotmail.com"; // Remplacez par votre adresse e-mail
    $subject = "Nouveau message du formulaire de contact";

    $headers = "From: $email";
    $headers .= "Reply-To: $email";
    $headers .= "MIME-Version: 1.0";
    $headers .= "Content-type: text/html; charset=UTF-8";

    $message = "Message du formulaire de contact :<br><br>" . $message;

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Désolé, une erreur s'est produite lors de l'envoi de votre message.";
    }
}
?>