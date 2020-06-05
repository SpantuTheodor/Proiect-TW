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

$sql = "DELETE FROM mancare_preferata WHERE id_utilizator = :indexuser AND id_mancare = :index";
$cerere = DB::get_connnection()->prepare($sql);
$cerere->execute([
    'indexuser' => "$id_user",
    'index' => "$id"
])

?>