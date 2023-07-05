<?php
require_once 'CompteBancaire.php';
class Titulaire
{
    private string $_nom;
    private string $_prenom;
    private DateTime $_naissance;
    private string $_ville;
    private array $_comptes = [];

    // CONSTRUCT -----------------------------------

    public function __construct(string $nom, string $prenom, string $naissance, string $ville)
    {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_naissance = new DateTime($naissance);
        $this->_ville = $ville;
    }

    //GETTERS && SETTERS -------------------------------------

    public function getNom()
    {
        return $this->_nom;
    }
    public function setNom(string $nom)
    {
        $this->_nom = $nom;
    }
    public function getPrenom()
    {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom)
    {
        $this->_prenom = $prenom;
    }
    public function getNaissance()
    {
        return $this->_naissance;
    }
    public function setNaissance(string $naissance)
    {
        $this->_naissance = new DateTime($naissance);
    }
    public function getVille()
    {
        return $this->_ville;
    }
    public function setVille(string $ville)
    {
        $this->_ville = $ville;
    }
    public function getComptes()
    {
        return $this->_comptes;
    }
    public function setComptes(CompteBancaire $compte)
    {
        array_push($this->_comptes, $compte);
    }
    public function Afficher_Titulaire()
    {
        $date_actuelle = date_create();
        $age = $this->_naissance->diff($date_actuelle)->y;
        echo "<h3>Informations du client </h3><br>" . "Nom : " . $this->_nom . "<br>" . "Prenom : " . $this->_prenom . "<br>" . "Date de naissance : " . $this->_naissance->format('Y-m-d') . "<br>" . "Age : " . $age . "<br>" . "Ville : " . $this->_ville . "<br>" . "<br>" . "<h3>" . "Comptes du client : " . "</h3>";

        foreach ($this->_comptes as $comptes) {
            echo "<br>" . $comptes . "<br>";
        }
    }
    public function __toString()
    {
        return $this->_nom . ", " . $this->_prenom;
    }
}