<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Contact</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

    <div class="logo">
        <img src="images/logo.webp" alt="logo" width="120">
    </div>

    <nav>

        <a href="index.php">Accueil</a>

        <a href="panier.php">🛒 Panier</a>

        <a href="contact.php">📞 Contact</a>

    </nav>

</header>

<!-- CONTACT BOX -->

<div class="contact-box">

    <h1>Contactez-nous</h1>

    <p class="contact-text">
        Besoin d’aide ? Envoyez-nous votre message ✨
    </p>

    <form>

        <input 
        type="text"
        placeholder="Votre nom"
        required>

        <input 
        type="email"
        placeholder="Votre email"
        required>

        <textarea
        placeholder="Votre message"
        rows="6"
        required></textarea>

        <button>
            Envoyer
        </button>

    </form>

</div>

</body>
</html>