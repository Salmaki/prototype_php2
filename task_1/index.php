<?php

$name = $_COOKIE['name'] ?? "Guest";
$color = $_COOKIE['color'] ?? "#ffffff";
$lang = $_COOKIE['lang'] ?? "fr";
$last_update = $_COOKIE['last_update'] ?? date("Y-m-d H:i:s");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!empty($_POST["name"])) {
        $name = $_POST["name"]; 
        setcookie("name", $name, time() + 3600 * 24 * 30);
    }

    if (!empty($_POST["color"])) {
        $color = $_POST["color"]; 
        setcookie("color", $color, time() + 3600 * 24 * 30);
    }

    if (!empty($_POST["lang"])) {
        $lang = $_POST["lang"]; 
        setcookie("lang", $lang, time() + 3600 * 24 * 30);
    }

   
    $last_update = date("Y-m-d H:i:s");
    setcookie("last_update", $last_update, time() + 3600 * 24 * 30);
}


if (isset($_GET["action"]) && $_GET["action"] == "reset") {
    setcookie("name", "", time() - 3600);
    setcookie("color", "", time() - 3600);
    setcookie("lang", "", time() - 3600);
    setcookie("last_update", "", time() - 3600);


}

if ($lang == "fr") {
    $welcome = "Bienvenue";
    $update = "dernier mis a jour: ";
    $label_name = "Nom";
    $label_color = "Couleur de fond";
    $label_lang = "Langue";
    $btn = "Enregistrer";
    $reset = "Réinitialiser";
} else {
    $welcome = "Welcome";
    $update = "last update: ";
    $label_name = "Name";
    $label_color = "Background color";
    $label_lang = "Language";
    $btn = "Save";
    $reset = "Reset";
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Cookies Project</title>
    <style>
        body{
            background-color: <?= $color ?>;
        }
    </style>
</head>
<body>
<h1><?= $welcome . ", " . $name ?></h1>
<h3><?= $update . $last_update ?></h3>

<form method="POST">

    <label><?= $label_name ?> :</label>
    <input type="text" name="name">
    <br><br>

    <label><?= $label_color ?></label>
    <input type="color" name="color" value="<?= $color ?>">
    <br><br>
    
    <label><?= $label_lang ?> :</label>
    <select name="lang">
        <option value="fr" <?= $lang == "fr" ? "selected" : "" ?>>Français</option>
        <option value="en" <?= $lang == "en" ? "selected" : "" ?>>English</option>
    </select>
    <br><br>

    <input type="submit" value="<?= $btn ?>">

</form>

<br>
<a href="?action=reset"><?= $reset ?></a>

</body>
</html>































