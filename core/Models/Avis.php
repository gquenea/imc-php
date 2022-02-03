<?php
namespace Models;

class Avis extends AbstractModel
{

    protected string $nomDeLaTable = "avis";

    private $id;
    private $author;
    private $content;
    private $velo_id;

    public function getId()
    {
        return $this->id;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author ;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content ;
    }
    
    public function getVeloId()
    {
        return $this->velo_id;
    }
    public function setVeloId($velo_id)
    {
        $this->velo_id = $velo_id ;
    }

    public function findAllByVelo(Velo $velo)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->nomDeLaTable}
            WHERE velo_id = :velo_id
        ");

        $sql->execute([
            "velo_id"=>$velo->getId()
        ]);

        $avis = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $avis;
    }

    public function save(Avis $avis)
    {
        $sql = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable}
                (author, content, velo_id) VALUES (:author, :content, :velo_id)
        ");
        $sql->execute([
            "author"=>$avis->author ,
            "content"=>$avis->content ,
            "velo_id"=>$avis->velo_id ,
        ]);


    }

    public function update(Avis $avis){

        $sql = $this->pdo->prepare("UPDATE {$this->nomDeLaTable}
            SET author = :author , content = :content
            WHERE id = :id
        ");

        $sql->execute([
            "author"=>$avis->author,
            "content"=>$avis->content,
            "id"=>$avis->id
        ]);

    }
    
    
}