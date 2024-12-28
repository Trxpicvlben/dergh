<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et validation des données
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email-address-55'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone-number-24']);
    $message = htmlspecialchars($_POST['message-12']);

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format d'email invalide.";
        exit;
    }

    // Configuration de l'email
    $to = "rubenkagbanon@gmail.com"; // Remplacez par votre adresse email
    $subject = "Nouveau message depuis le formulaire de contact";
    $body = "Nom : $name\n";
    $body .= "Email : $email\n";
    $body .= "Téléphone : $phone\n";
    $body .= "Message :\n$message";

    $headers = "From: $email";

    // Envoi de l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a été envoyé avec succès !";
    } else {
        echo "Une erreur s'est produite. Veuillez réessayer plus tard.";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
