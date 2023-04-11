<?php
class Conseil{
    private $id;
    private $titre;
    private $article;
    private $image;

    public function __construct($id,$titre,$article,$image){
        $this->id = $id;
        $this->titre = $titre;
        $this->article = $article;
        $this->image = $image;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}

    public function getTitre(){return $this->titre;}
    public function setTitre($titre){$this->titre = $titre;}

    public function getArticle(){return $this->article;}
    public function setArticle($article){$this->article = $article;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image = $image;}
}