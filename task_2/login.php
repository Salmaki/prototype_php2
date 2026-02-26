<?php 
session_start();
$erreur="";
if ($_SERVER['REQUEST_METHOD']=== "POST") {
    if(isset($_POST['send'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['pass'];
    }
    if ($user_name === "user" && $password === "1234") {
        $_SESSION["auth"] = 'true';
        $_SESSION["user_name"] = $user_name;
       header("Location: profil.php");
       exit();
    }else {
        $erreur = "user name or password incorrect";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            color: tomato;
        }
    </style>
</head>
<body>
    <?php if (!empty($erreur)):?>

       <p><?= $erreur ?></p>
    <?php endif;?>
    <form action="#" method="POST">
    <label>User name</label>
    <input type="text" name="user_name" required>
    <br><br>
    <label>password</label>
    <input type="text" name="pass" required>
    <br><br>
    <button type="send" name="send">Send</button>
    </form>
</body>
</html>