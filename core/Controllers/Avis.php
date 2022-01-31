<?php
namespace Controllers;

use App\Response;

class Avis extends AbstractController
{
    protected $defaultModelName = \Models\Avis::class;

    /**
     * supprime un commentaire par son ID
     * @return Response
     * 
     */
    public function delete()
    {
        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){
            $id = $_POST['id'];
        }

        if(!$id){
            die("Erreur sur l'ID. Pars .");
        }
        //verifier que l'avis existe

        
        // instancier
        $avis = $this->defaultModel->findById($id);

        if (!$avis) {
            return $this->redirect([
            'action'=>'show',
            'type'=>'avis',
            'info'=>'noID'
        ]);
        }

        $this->defaultModel->remove($id);

        return $this->redirect([
            'action'=>'show',
            'type'=>'avis',
            "id" =>$avis->velo_id
        ]);           
    }


    /**
     * crée un nouvel avis
     * @return Response
     * 
     */
    public function new()
    {
        $avisId = null;
        $author = null;
        $content = null;

        if(!empty($_POST['avisId']) && ctype_digit($_POST['avisId'])){
            $avisId = $_POST['avisId'];
        }

        if(!empty($_POST['author'])){
            $author = htmlspecialchars($_POST['author']);
        }

        if(!empty($_POST['content'])){
            $content = htmlspecialchars($_POST['content']);
        }

        if(!$avisId || !$content || !$author){
            return $this->redirect([
            'action'=>'show',
            'type'=>'velo',
            "id" =>$avisId
        ]);
        }


        // on vérifie si le velo existe bien avant de donner son avis

        $modelAvis = new \Models\Avis();
        $avis = $modelAvis->findById($avisId);

        if(!$avis){
            return $this->redirect([
            'action'=>'index',
            'type'=>'avis',
            'info'=>'noId'
        ]);
        }
        

        // ici on crée un nouvel "model avis" de la classe avis et on utilise la methode "set"
        // pour pouvoir accéder aux propriètés privées du "model avis"
        $avis = new \Models\Avis();
        $avis->setAuthor($author);
        $avis->setContent($content);
        $avis->setveloId($avisId);

        $this->defaultModel->save($avis);

       return $this->redirect([
            'action'=>'show',
            'type'=>'avis',
            "id" =>$avisId
        ]);
    }
}

?>