<?php

session_start();

include("db.php");

if(isset($_GET['add'])) {

    $id = $_GET['add'];

    if(!isset($_SESSION['panier'][$id])) {

        $_SESSION['panier'][$id] = 1;

    } else {

        $_SESSION['panier'][$id]++;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Fashion Store</title>

<link rel="stylesheet"
href="css/style.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap"
rel="stylesheet">

</head>

<body>

<!-- HEADER -->

<header>

<div class="logo">

<img src="images/logo.webp"
alt="logo">

</div>

<nav>

<a href="index.php">Accueil</a>

<a href="panier.php">🛒 Panier</a>

<a href="contact.php">📞 Contact</a>

<?php if(isset($_SESSION['user'])) { ?>

<span class="welcome">

Bienvenue
<?php echo $_SESSION['user']['nom']; ?>

</span>

<a href="logout.php">Logout</a>

<?php } else { ?>

<a href="auth.php">Connexion</a>

<?php } ?>

</nav>

</header>

<!-- HERO -->

<section class="hero">

<div class="hero-overlay">

<h1>
Fashion Store 2026
</h1>

<p>

Mode Femme • Homme • Hijab • Luxe

</p>

<a href="#products"
class="hero-btn">

Découvrir Collection

</a>

</div>

</section>

<!-- PROMO -->

<div class="promo">

<p>

✨ Livraison Rapide • Promotions Exclusives • Nouvelle Collection • Fashion Luxe ✨

</p>

</div>

<!-- PRODUCTS -->

<section class="products"
id="products">

<?php

$req = $pdo->query(
"SELECT * FROM produits"
);

while($p = $req->fetch()) {

?>

<div class="card">

<img src="<?php echo $p['image']; ?>"
alt="produit">

<div class="content">

<h2>

<?php echo $p['nom']; ?>

</h2>

<p class="cat">

<?php echo $p['categorie']; ?>

</p>

<p class="price">
<?php echo $p['prix']; ?> DH

</p>

<a class="btn" href="product.php?id=<?php echo $p['id']; ?>">
    Voir détails
</a>

</div>

</div>

<?php } ?>

</section>



<!-- GALLERY FROM DATABASE -->

<section class="gallery">

<?php

$gallery = $pdo->query("
SELECT image FROM produits
LIMIT 8
");

while($img = $gallery->fetch()) {

?>

<img src="<?php echo $img['image']; ?>">

<?php } ?>

</section>

<!-- FEATURES -->

<section class="features">

<div class="feature-box">

<h2>🚚 Livraison Rapide</h2>

<p>

Livraison partout au Maroc

</p>

</div>

<div class="feature-box">

<h2>💳 Paiement</h2>

<p>

Paiement à la livraison

</p>

</div>

<div class="feature-box">

<h2>✨ Qualité Premium</h2>

<p>

Produits haute qualité

</p>

</div>

</section>

<!-- FOOTER -->

<footer>

<p>

© 2026 Fashion Store —
Tous les droits réservés

</p>

</footer>

<script src="js/script.js"></script>

</body>
</html>