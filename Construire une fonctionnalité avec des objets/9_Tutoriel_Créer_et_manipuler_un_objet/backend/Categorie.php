<?php
class Categorie
{
    public $id ;
    public $nom ;
    public $couleur ;
    public $icone ;

    public function __construct($id ,$nom ,$couleur ,$icone )
    {
        $this->id = $id ;
        $this->nom = $nom ;
        $this->couleur = $couleur ;
        $this->icone = $icone ;   
    }
    public function showing()
    {
        echo "the id =>" . $this->id . "the name =>" . $this->nom . "the color =>" . $this->couleur . "the icon =>" . $this->icone . "<br><br>" ;
    }
}


?>