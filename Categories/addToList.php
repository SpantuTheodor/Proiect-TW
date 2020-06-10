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

$id_user = $_COOKIE['id'];
$id = $_GET['i'];

$sql = "INSERT INTO lista_cumparaturi(id_utilizator,id_mancare) VALUES (:indexuser,:index)";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'indexuser' => "$id_user",
    'index' => "$id"
]);

?>
