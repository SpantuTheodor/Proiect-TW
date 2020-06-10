<?php

unset($_COOKIE['user']);
setcookie('user',null, 1, "/");
unset($_COOKIE['id']);
setcookie('id',null, 1, "/");

header("Location: index.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=yes" />
    <meta name="description" content="Pagina de profil a utilizatorului.">
    <title>Document</title>
</head>
<body>
    
</body>
</html>