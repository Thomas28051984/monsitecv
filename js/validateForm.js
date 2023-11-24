function validerFormulaire() {
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var messageErreur = document.getElementById("messageErreur");

    messageErreur.innerHTML = ""; // Effacer les messages d'erreur précédents

    // Vérification de l'adresse email
    var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (!email.match(emailRegex)) {
        messageErreur.innerHTML += "L'adresse email n'est pas valide.<br>";
    }

    // Vérification du champ de message
    if (message.trim() === "") {
        messageErreur.innerHTML += "Le champ du message ne peut pas être vide.<br>";
    }

    // Si le message d'erreur est vide, le formulaire est valide
    if (messageErreur.innerHTML === "") {
        alert("Votre message a bien été envoyé !");
        // Vous pouvez également envoyer le formulaire à un serveur à ce stade.
    }
}