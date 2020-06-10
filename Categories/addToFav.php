<?php
session_start();
class DB
{
    private static $db = NULL;
    public static function get_connnection()
    {
        if (is_null(self::$db)) {
            self::$db = new PDO('mysql:host=localhost;dbname=forg_database', 'root', '');
        }
        return self::$db;
    }
}
//print_r($_COOKIE);
$id_user = $_COOKIE['id'];
$id = $_GET['i'];

$sql = "INSERT INTO mancare_preferata(id_utilizator,id_mancare) VALUES (:indexuser,:index)";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'indexuser' => "$id_user",
    'index' => "$id"
]);

$query = "UPDATE mancare SET numar_aprecieri = numar_aprecieri + 1 WHERE id = :index";
$request =  DB::get_connnection()->prepare($query);
$request->execute([
    'index' => "$id"
]);

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