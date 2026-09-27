<?php

session_start();

include("db.php");

if(isset($_GET['delete'])) {
    unset($_SESSION['panier'][$_GET['delete']]);
}

$total = 0;

if(!empty($_SESSION['panier'])) {

    foreach($_SESSION['panier'] as $id => $qte) {

        $req = $pdo->prepare("SELECT * FROM produits WHERE id=?");
        $req->execute([$id]);
        $p = $req->fetch();

        $total += $p['prix'] * $qte;
    }
}

if(isset($_POST['confirmer'])) {

    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];

    $sql = "INSERT INTO commandes
    (nom_client,telephone,ville,adresse,total)
    VALUES(?,?,?,?,?)";

    $pdo->prepare($sql)->execute([
        $nom,
        $telephone,
        $ville,
        $adresse,
        $total
    ]);

    $success = "✅ Commande confirmée avec succès";

    unset($_SESSION['panier']);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Panier</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="panier-header">

<div>🛒 Panier</div>

<a href="index.php">⬅ Retour</a>

</header>

<div class="panier">

<?php if(isset($success)) { ?>

<h2 class="success"><?= $success ?></h2>

<?php } ?>

<?php

if(!empty($_SESSION['panier'])) {

foreach($_SESSION['panier'] as $id => $qte) {

    $req = $pdo->prepare("SELECT * FROM produits WHERE id=?");
    $req->execute([$id]);
    $p = $req->fetch();

    $sousTotal = $p['prix'] * $qte;
?>

<div class="panier-item">

    <img src="<?= $p['image'] ?>">

    <div class="panier-info">

        <h2><?= $p['nom'] ?></h2>

        <p><?= $p['categorie'] ?></p>

        <p>Quantité: <?= $qte ?></p>

        <p class="price"><?= $sousTotal ?> DH</p>

        <a class="remove-btn"
        href="?delete=<?= $id ?>">
            ❌ Supprimer
        </a>

    </div>

</div>

<?php } ?>

<h1 class="total">
    Total: <?= $total ?> DH
</h1>

<form method="POST" class="checkout-form">

<input type="text"
name="nom"
placeholder="Votre nom"
required>

<input type="text"
name="telephone"
placeholder="Téléphone"
required>

<input type="text"
name="ville"
placeholder="Ville"
required>

<textarea
name="adresse"
placeholder="Adresse complète"
required></textarea>

<button class="confirm-btn"
name="confirmer">

✔ Confirmer commande

</button>

</form>

<?php } else { ?>

<h2>Panier Vide</h2>

<?php } ?>

</div>

</body>
</html>