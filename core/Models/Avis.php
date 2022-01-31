<?php

namespace Models;

require_once "AbstractModel.php";

class Avis extends AbstractModel
{

        protected string $nomDeLaTable = "avis";


        private $id;
        /**
         * recupère la proprieté privée id et la retourne
         * @return string 
         */
        public function getId(){
            return $this->id;
        }
        
        private $author;
        /**
         * recupère la proprieté author name et la retourne
         * @return string 
         */
        public function getAuthor(){
            return $this->author;
        }
        public function setAuthor($author){
            $this->author = $author;
        }

        private $content;
        /**
         * recupère la proprieté privée content et la retourne
         * @return string 
         */
        public function getContent(){
            return $this->content;
        }
        public function setContent($content){
            $this->content = $content;
        }


        protected $veloId;
        /**
         * recupère la proprieté privée velo_id et la retourne
         * @return string 
         */
        public function getveloId()
        {
        return $this->veloId;
        }

        public function setveloId($veloId)
        {
        $this->veloId = $veloId;
        }
    

    /**
         * trouve tous les avis associés à un velo par son ID
         * 
         * @param int $velo_id
         * @return array|bool 
         * 
         */
        public function findAllAvisByVelo(int $velo_id)
        {  
                $maRequetePourDesAvis = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable} 

                        WHERE velo_id = :velo_id");

                $maRequetePourDesAvis->execute([
                        "velo_id" => $velo_id
                ]);

                $commentaires = $maRequetePourDesAvis->fetchAll(\PDO::FETCH_CLASS, get_class($this));

                return $commentaires;
        }

    
        /**
         * Enregistre un avis dans la base de données
         * 
         * @param string $author 
         * @param string $content  
         * @param int $veloId
         * 
         */
        public function save(Avis $avis):void
        {
                $maRequeteCreationAvis = $this->pdo->prepare("INSERT INTO avis
                (author, content, velo_id ) 
                VALUES(:author, :content, :velo_id)");

                $maRequeteCreationAvis->execute([
                        "author" => $avis->author,
                        "content" => $avis->content,
                        "velo_id" => $avis->veloId
                ]);         
        }

}

?>