<?php
namespace Controllers;


class Avis extends AbstractController
{

    protected $defaultModelName = \Models\Avis::class ;

    public function new()
    {
        $veloId = null;
        $author = null;
        $content = null;

        if(!empty($_POST['veloId']) && ctype_digit($_POST['veloId'])){$veloId = $_POST['veloId'];}
        if(!empty($_POST['author'])){$author = htmlspecialchars($_POST['author']);}
        if(!empty($_POST['content'])){$content = htmlspecialchars($_POST['content']);}
       
        $modelVelo = new \Models\Velo();

            if($veloId && $author && $content && $modelVelo->findById($veloId))
            {
                    $nouvelAvis = new \Models\Avis();
                    $nouvelAvis->setAuthor($author);
                    $nouvelAvis->setContent($content);
                    $nouvelAvis->setVeloId($veloId);

                    $this->defaultModel->save($nouvelAvis);

                    return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$veloId
                            ]);
            }

        return $this->redirect(["type"=>"velo",
                                "action"=>"index"
                            ]);

    }


    public function delete()
    {
        $id=null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$id = $_POST['id'];}

        if(!$id){ return $this->redirect(["type"=>"velo","action"=>"index"]); }

        $avis = $this->defaultModel->findById($id);

        if(!$avis){ return $this->redirect(["type"=>"velo","action"=>"index"]); }

        
        $this->defaultModel->remove($avis);

        return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$avis->getVeloId()        
                            ]);


    }

    public function change()
    {

        $avisId = null;
        $author = null;
        $content = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){$avisId = $_POST['id'];}
        if(!empty($_POST['author'])){$author = htmlspecialchars($_POST['author']);}
        if(!empty($_POST['content'])){$content = htmlspecialchars($_POST['content']);}
       
              if($avisId){   $avis = $this->defaultModel->findById($avisId);}
            if($avisId && $author && $content && $avis)
            {
                 
                    $avis->setAuthor($author);
                    $avis->setContent($content);
                    

                    $this->defaultModel->update($avis);

                    return $this->redirect(["type"=>"velo",
                                "action"=>"show",
                                "id"=>$avis->getVeloId()
                            ]);
            }








        $id=null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if(!$id){return $this->redirect(["type"=>"velo",
                                            "action"=>"index"
        ]);}

        $avis = $this->defaultModel->findById($id);
        if(!$avis){return $this->redirect(["type"=>"velo",
            "action"=>"index"
            ]);}


        return $this->render("avis/update", ["pageTitle"=> "Modifier",
                                              "avis"=>$avis
        ]);

    }

}