<?php
abstract class Humain {
    // CANNOT CREATE OBJECT WITHIN ABSTRACT CLASS
    public $nom;
    public $prenom;
    protected $age;

    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }

    abstract public function travailler(); // ABSTRACT FUNCTION = ne pas dire ce qu'elle fait, pour laisser les classes qui héritent se définir elles memes

    # GETTER / SETTER
    public function setAge($age) {
        if (is_int($age) && $age > 1 && $age < 150) {
            $this->age = $age; 
        } else {
            throw new Exception("Age should be a number between 1 and 150");
        }
    }

    public function getAge() { 
        return $this->age;
    }
}

class Employe extends Humain
{

    public function travailler() // MUST HAVE : to give birth to abstract function, REQUIREMENT in PARENT CLASS : HUMAIN : it has meaning HERE
    {
        return "Je suis un employé et je travaille";
    }

    public function presentation(){
        var_dump("Salut, je suis $this->prenom $this->nom et j'ai $this->age");
    }
}

class Patron extends Employe { 
    public $voiture;

    public function __construct($prenom, $nom, $age, $voiture)
    {
        parent :: __construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    public function travailler() 
    {
        return "Je suis le patron et je bosse aussi !";
    }

    public function presentation(){
        var_dump("Bonjour, je suis $this->prenom $this->nom et j'ai $this->age ans, et j'ai une voiture !"); //print_r also works
    }

    public function ride(){
        var_dump("Bonjour, je roule avec ma $this->voiture!");
    }
}

# Nouvelle Classe ETUDIANT

class Etudiant extends Humain {
    public function travailler()
    {
        return "Je suis un étudiant et je révise";
    }
}

$etudiant = new Etudiant("Jon", "Connor", 25); // ==> ERROR IF NO ARGUMENTS. INHERITED FROM ABSTRACT CLASS

#
// $humain = new Humain("Bruce", "Banner", 46); ==> ERROR ABSTRACT CLASS

# EMPLOYEES

$employe1 = new Employe("Magma", "Phosio", 27); 
$employe2 = new Employe("Jason", "Todd", 26);

# BOSS

$patron = new Patron("Michael", "Scott", 30, "Hamborghini");

# FUNCTIONS

$employe1->presentation();
$patron->presentation(); // POLYMORPHISM : identical naming for functions, with nuances
$patron->ride();

# INTERFACES

function faireTravailler(Humain $objet) { // forces only TRAVAILLEUR INTERFACE to be taken into account
    var_dump("Travail en cours : {$objet -> travailler()}");
}

faireTravailler($employe1);
faireTravailler($patron); // BOSS also works here, even without defining it into PATRON class, since its an extension of EMPLOYE class.
faireTravailler($etudiant);

?>