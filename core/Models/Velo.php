<?php
namespace Models;

require_once "AbstractModel.php";

class Velo extends AbstractModel
{
    protected string $nomDeLaTable = "velos";

    private $id;

    /**
     * recupère la proprieté privée id et la retourne
     * @return int 
     */
    public function getId(){
        return $this->id;
    }
    
    private $name;
    /**
     * recupère la proprieté privée name et la retourne
     * @return string 
     */
    public function getName(){
        return $this->name;
    }
    public function setName($name){
         $this->name = $name;
    }

    private $description;
    /**
     * recupère la proprieté privée description et la retourne
     * @return string 
     */
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
         $this->description = $description;
    }

    private $image;
    /**
     * recupère la proprieté privée image et la retourne
     * @return string 
     */
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }
    
    private $price;
    /**
     * recupère la proprieté privée price et la retourne
     * @return int 
     */
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }

    /**
     * ajoute un nouveau velo dans la BDD
     * @param Velo $velo
     * @return void
     */
    public function save(Velo $velo):void
    {
            $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
             (name, image, description, price) VALUES (:name, :image, :description, :price)
            ");

            $sql->execute([
                'name'=>$velo->name,
                'image'=>$velo->image,
                'description'=>$velo->description,
                'price'=>$velo->price
            ]);
    }

    // /**
    //  * édite un velo via son ID
    //  * @param Velo $velo
    //  */
    // public function update(Velo $velo)
    // {

    //     $sql = $this->pdo->prepare(
    //         "UPDATE {$this->nomDeLaTable}
    //         SET name = :name , image = :image , description = :description, price = :price
    //         WHERE id = :id"
    //     );

    //     $sql->execute([
    //         "nom" => $velo->name,
    //         "image" => $velo->image,
    //         "description" => $velo->description,
    //         "price" => $velo->description,
    //         "id" => $velo->id
    //     ]);
    // }














}