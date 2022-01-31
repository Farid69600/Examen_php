<?php

namespace Database;


//c'est ici que l'on indique le "nom de BD", le nom "utilisateur", et le "mot de passe"
class PdoMySQL
{
    /**
     * Retourne un objet PDO pour intéragir avec la base de données
     * 
     * @return PDO
     * 
     */
    public static function getPdo():\PDO{
        $pdo = new \PDO("mysql:host=localhost;dbname=magasinvelo;charset=utf8", "magasinVelo_admin","farid", [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ]);

        return $pdo;
    }
}
 
?>

