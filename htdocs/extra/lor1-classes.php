<?php

class Employe {
    public $nom;
    public$prenom;
    public $age;

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        // var_dump("Je suis construit");
    }

    public function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age"); // le this-> permet d'appeler les propriétés sans avoir à rappeler la fonction présentation plus bas
    }
}

// $nom = "Phosio";
// $prenom = "Magma";
// $age = "27";

// $nom2 = "Buri";
// $prenom2 = "Don";
// $age2 = "72";

// function presentation($nom, $prenom, $age) {
//     var_dump("Bonjour, je suis $prenom $nom et j'ai $age");
// }

# *** Nouvel Employe ***

$employe1 = new Employe("Magma", "Phosio", 27); // Nouvel objet issu de la classe employé : àpd de la représentation/idée/classe(de ce qu'est un employé). Un object est une INSTANCE de la CLASSE EMPLOYE ==> New EMPLOYE : nouvelle instance. 
// $employe1->prenom = "Magma"; These lines rendered useless by the constructor, defining the properties of the object and new employe for instance
// $employe1->nom = "Phosio";
// $employe1->age = 27;

$employe2 = new Employe("Jason", "Todd", 26);
// $employe2->prenom = "Jason";
// $employe2->nom = "Todd";
// $employe2->age = 26;

// presentation($nom, $prenom, $age); Plus besoin de ces lignes
// presentation($nom2, $prenom2, $age2);

$employe2->presentation();

?>