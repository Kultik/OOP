<?php

class Employe {
    public $nom;
    public$prenom;
    private $age; // public --> private : propriété qui ne devient dispo que dans les fonctions déclarées dans cette classe 

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }

    public function setAge($age) { // but de recevoir un age 
        if (is_int($age) && $age > 1 && $age < 150) {
            $this->age = $age; // l'age de cet object est l'age qu'on m'a envoyé
        } else {
            throw new Exception("Age should be a number between 1 and 150");
        }
    }

    public function getAge() { // but : quand on l'appelle, nous délivre l'age que possède l'employé : 
        return $this->age;
    }

    public function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age"); 
    }
}

$employe1 = new Employe("Magma", "Phosio", "Donburi"); 

// $employe2 = new Employe("Jason", "Todd", 26);

// 500 lignes de code

// $employe1 -> age= 50; // this line won't work because can't access PRIVATE PROPERTY
// $employe1->setAge(50); // now, any value outside of "if" scope will be replaced by default 27 value (EXCEPT IF ELSE)

$employe1->presentation();

?>