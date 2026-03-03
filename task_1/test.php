<?php
if ($_SERVER['REQUEST_METHOD']==="POST") {
    $name = $_POST["name"] ?? "";
    $color = $_POST["color"] ?? "";
    $lang = $_POST["lang"] ?? "";
    $last_update = date ("Y-m-d H:i:s");
     
    setcookie("name" , $name , time() + 3600 * 24 * 30);
    setcookie("color" , $color , time() + 3600 * 24 * 30);
    setcookie("lang" , $lang , time() + 3600 * 24 * 30);
    setcookie("last_update" , $last_update , time() + 3600 * 24 * 30);
    header("Location: test.php");
    exit();
} 
   $name = $_COOKIE["name"] ?? "Guest";
   $color = $_COOKIE["color"] ?? "#ffff";
   $lang = $_COOKIE["lang"] ?? "en";
   $last_update = $_COOKIE["last_update"] ?? "never";

if ($lang === "en") {

    $welcome = "Welcome";
    $l_name = "name";
    $l_color = "background color";
    $l_lang = "language";
    $l_lastupdate = "last update : ";
    $btn = "send";
    $reset = "reset"; 
}else {
    $welcome = "Bienvenue";
    $l_name = "nom ";
    $l_color = "couleur de fond";
    $l_lang = "langue";
    $l_lastupdate = "Dernier mis a jour : ";
    $btn = "Envoyer";
    $reset = "Réinitialiser"; 
    
}
if (isset($GET["action"]) && $GET["action"] == "reset") {
   
    setcookie("name" , "" , time() - 3600 );
    setcookie("color" , "" , time() - 3600 );
    setcookie("lang" , "" , time() - 3600 );
    setcookie("last_update" , "" , time() - 3600 );
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=for, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?= $color ?>;
        }
    </style>
</head>
<body>
    <h1><?= $welcome . ", " . $name ?></h1>
    <h3><?= $l_lastupdate . $last_update ?></h3>

    <form action="#" method="POST">
        <label><?= $l_name ?></label>
        <input type="text" name="name">
        <br><br>

        <label><?= $l_color ?></label>
        <input type="color" name="color" value="<?= $color ?>">
        <br><br>

        <label><?= $l_lang ?></label>
        <select name="lang">
            <option value="en" <?= $lang === "en" ? "selected" : "" ?>>English</option>
            <option value="fr" <?= $lang === "fr" ? "selected" : "" ?>>Française</option>
        </select>
        <br><br>
         <button type="submit"><?= $btn ?></button>
    </form>

    <br>
    <a href="?action=reset"><?= $reset ?></a>

</body>
</html>