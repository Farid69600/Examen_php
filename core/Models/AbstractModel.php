<?php

namespace Models;

abstract class AbstractModel
{
        protected string $nomDeLaTable;

        // propriete
        protected $pdo;

        public function __construct()
        {
                $this->pdo = \Database\PdoMySQL::getPdo();
        }


    /**
     * 
     * retourne un tableau contenant TOUS les elements 
     * tous les champs de la table SQL en question
     * 
     * @param string $option
     * @return array $elements
     * 
     * 
     */
    public function findAll(?string $option = null): array
    {
        $requete = "SELECT * FROM {$this->nomDeLaTable}";

        if ($option) {
            $requete .= " ORDER BY id " . $option;
        }

        $requete = $this->pdo->query($requete);

        $elements = $requete->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $elements;
    }


    /**
     * 
     * trouver un element par son id
     * renvoie un tableau contenant un element
     * 
     * @param integer $id
     * @return array|bool
     * 
     */
    public function findById(int $id)
    {
        $maRequete = $this->pdo->prepare("SELECT * 
                        FROM {$this->nomDeLaTable} WHERE id = :id");

        $maRequete->execute(
            [
                "id" => $id
            ]

        );

        $maRequete->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

        $element = $maRequete->fetch();

        return $element;
    }


    /**
     * 
     * supprimer un element de la BDD par le biais de son id
     * 
     * @param integer $id
     * @return void
     * 
     * 
     */
    public function remove(int $id): void
    {
        $requeteSuppression = $this->pdo->prepare("DELETE FROM {$this->nomDeLaTable} WHERE id = :id");

        $requeteSuppression->execute([
            "id" => $id
        ]);
    }

}
?>