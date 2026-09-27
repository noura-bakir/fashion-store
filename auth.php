<?php
session_start();

include("db.php");

if(isset($_POST['register'])) {

    $nom = $_POST['nom'];

    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql =
    "INSERT INTO users
    (nom,email,password)
    VALUES(?,?,?)";

    $pdo->prepare($sql)->execute([
        $nom,
        $email,
        $password
    ]);

    $success =
    "Compte créé avec succès";
}

if(isset($_POST['login'])) {

    $email = $_POST['email'];

    $password = $_POST['password'];

    $req = $pdo->prepare(
        "SELECT * FROM users
         WHERE email=?"
    );

    $req->execute([$email]);

    $user = $req->fetch();

    if(
        $user &&
        password_verify(
            $password,
            $user['password']
        )
    ) {

        $_SESSION['user'] = $user;

        header("Location:index.php");

    } else {

        $error =
        "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>Authentification</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div class="auth-container">

<form method="POST">

<h2>Connexion</h2>

<?php
if(isset($error)) {
echo "<p class='error'>$error</p>";
}
?>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="login">

Connexion

</button>

</form>



<form method="POST">

<h2>Inscription</h2>

<?php
if(isset($success)) {
echo "<p class='success'>$success</p>";
}
?>

<input type="text"
name="nom"
placeholder="Nom"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button name="register">

Créer Compte

</button>

</form>

</div>

</body>
</html>