<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adresse email où vous voulez recevoir les messages
    $to = 'teissier.thomas@laposte.net';

    // Sujet de l'email
    $subject = 'Nouveau message depuis le formulaire de contact';

    // Corps de l'email
    $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

    // Entêtes de l'email
    $headers = "From: $name <$email>\r\nReply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo '<div class="alert alert-success">Votre message a été envoyé avec succès.</div>';
    } else {
        echo '<div class="alert alert-danger">Une erreur s\'est produite lors de l\'envoi du message.</div>';
    }
} else {
    // Redirection vers le formulaire si la méthode de requête n'est pas POST
    header("Location: form_contact.html");
}
?>