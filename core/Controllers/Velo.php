<?php

namespace Controllers;

    

class Velo extends AbstractController
{
    protected $defaultModelName = \Models\Velo::class;


    /**
     * affiche l'accueil des velos avec tous les velos
     * 
     */
    public function index()
    {
        $velos = $this->defaultModel->findAll();

        $pageTitle = "Accueil de tous les vélos";

        return $this->render("velos/index", compact('velos', 'pageTitle'));
    }

    /**
     * afficher la page d'un velo et ses commentaires à partir de son id
     * 
     * 
     */
    public function show()
    {  
        $id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (!$id) {
            return $this->redirect(); 
        }

        $velo = $this->defaultModel->findById($id);

        if (!$velo)
        {
            return $this->redirect(); 
        }

        $modelAvis = new \Models\Avis();
        $avis = $modelAvis->findAllAvisByVelo($id);

        $pageTitle = $velo->getName();

        return $this->render("velos/show", compact('velo', 'avis','pageTitle'));

    }




    /**
     * creation d'un nouveau cocktail
     * @return void
     */
    public function new(){

        $name = null;
        $image = null;
        $description = null;
        $price = null;

       if(!empty($_POST['name'])){ $name = htmlspecialchars($_POST['name']) ; }

       if(!empty($_POST['image'])){ $image = htmlspecialchars($_POST['image']) ; }

       if(!empty($_POST['description'])){ $description = htmlspecialchars($_POST['description']) ; }

       if(!empty($_POST['price'])){ $price = htmlspecialchars($_POST['price']) ; }

       
        if( $name && $image && $description && $price ){

            $velo = new \Models\Velo();
                $velo->setName($name);
                $velo->setImage($image);
                $velo->setDescription($description);
                $velo->setPrice($price);


            $this->defaultModel->save($velo);

            return $this->redirect([
                                    'type'=>'velo',
                                    'action'=>'index'
                                    ]); 
        }


        return $this->render('velos/create', ["pageTitle"=> "nouveau velo"]);
    }

    /**
     * supprimer un VELO de la BDD et redirige vers les VELOS restants
     * 
     */
    public function delete()
    {

        $id=null;
        if( !empty($_POST['id']) && ctype_digit($_POST['id'])){  $id = $_POST['id']; }

        if(!$id){ return $this->redirect([
            'action'=>'index',
            'type'=>'velo',
            'info'=>'noId'
        ]);  }


        if( !$this->defaultModel->findById($id) ){return $this->redirect([
            'action'=>'index',
            'type'=>'velo',
            'info'=>'deleted
            '
        ]); }

        $this->defaultModel->remove($id);

        return $this->redirect([
            'action'=>'index',
            'type'=>'velo'
        ]);  

    }


}





