<?php

include("db.php");

$req = $pdo->query("
SELECT * FROM commandes
ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>Admin</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="admin">

<h1>📦 Commandes Clients</h1>

<?php while($c = $req->fetch()) { ?>

<div class="commande-box">

<h2><?= $c['nom_client'] ?></h2>

<p>📞 <?= $c['telephone'] ?></p>

<p>🏙 <?= $c['ville'] ?></p>

<p>📍 <?= $c['adresse'] ?></p>

<p>💰 <?= $c['total'] ?> DH</p>

<p>🕒 <?= $c['date_commande'] ?></p>

</div>

<?php } ?>

</div>

</body>
</html>