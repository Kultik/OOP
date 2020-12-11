<?php

class Employe {
    public $nom;
    public $prenom;
    protected $age;

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }

    # GETTER / SETTER
    public function setAge($age) { // we HAVE to go through here to modify AGE PROPERTY
        if (is_int($age) && $age > 1 && $age < 150) {
            $this->age = $age; 
        } else {
            throw new Exception("Age should be a number between 1 and 150");
        }
    }

    public function getAge() { 
        return $this->age;
    }

    public function presentation(){
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age"); //print_r also works
    }
}

class Patron extends Employe { // DRY comes into play
    // public $nom; taken off since these properties were defined in the Employe CLASS
    // public$prenom;
    // private $age;
    public $voiture;

    public function __construct($prenom, $nom, $age, $voiture)
    {
        // $this->nom = $nom;
        // $this->prenom = $prenom;
        // $this->setAge($age); No need for these lines, PARENT CONSTRUCTOR can be called
        parent :: __construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    public function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans, et j'ai une voiture !"); //print_r also works
    }
    # AGE : boss cannot access AGE PROPERTY here (because PRIVATE : can only be called in EMPLOYE CLASS) : one way is to call getAge (public after setter) or set property to PROTECTED

    # DRY --> Employe Class HERITAGE
    // public function setAge($age) { // we HAVE to go through here to modify AGE PROPERTY
    //     if (is_int($age) && $age > 1 && $age < 150) {
    //         $this->age = $age; 
    //     } else {
    //         throw new Exception("Age should be a number between 1 and 150");
    //     }
    // }

    // public function getAge() { 
    //     return $this->age;
    // }

    // public function presentation(){
    //     var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age"); 
    // }

    # New Ride Function
    public function ride(){
        var_dump("Bonjour, je roule avec ma $this->voiture!");
    }
}

# EMPLOYEES

$employe1 = new Employe("Magma", "Phosio", 27); 
$employe2 = new Employe("Jason", "Todd", 26);

# BOSS

$patron = new Patron("Michael", "Scott", 30, "Hamborghini");

# FUNCTIONS

$employe1->presentation();
$patron->presentation(); // POLYMORPHISM : identical naming for functions, with nuances
$patron->ride();

?>