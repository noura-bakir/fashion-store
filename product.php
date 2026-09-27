<?php
session_start();
include("db.php");

if(!isset($_GET['id'])){
    header("Location:index.php");
    exit;
}

$id = $_GET['id'];

$req = $pdo->prepare("SELECT * FROM produits WHERE id=?");
$req->execute([$id]);
$product = $req->fetch();

if(!$product){
    echo "Produit introuvable";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title><?php echo $product['nom']; ?></title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- HEADER -->
<header>
    <div class="logo">
        <img src="images/logo.webp" width="120">
    </div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="panier.php">🛒 Panier</a>
    </nav>
</header>

<!-- PRODUCT DETAILS -->
<div class="product-page">

    <div class="product-image">
        <img src="<?php echo $product['image']; ?>" alt="">
    </div>

    <div class="product-info">

        <h1><?php echo $product['nom']; ?></h1>

        <p class="category">
            Catégorie: <?php echo $product['categorie']; ?>
        </p>

        <p class="price">
            <?php echo $product['prix']; ?> DH
        </p>

        <p class="desc">
            Produit de qualité premium ✨ livraison rapide 🚚
        </p>

        <a class="btn"
           href="index.php?add=<?php echo $product['id']; ?>">
            Ajouter au panier
        </a>

        <!-- WhatsApp Button -->
        <a class="whatsapp"
           target="_blank"
           href="https://wa.me/212600000000?text=Je%20veux%20acheter%20:<?php echo $product['nom']; ?>">
            Commander sur WhatsApp 💬
        </a>

    </div>

</div>

</body>
</html>