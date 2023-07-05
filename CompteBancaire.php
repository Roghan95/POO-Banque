<?php
require_once 'Titulaire.php';
class CompteBancaire
{
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire;
    // CONSTRUCT --------------------------------------------

    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire)
    {
        $this->_libelle = $libelle;
        $this->_solde = $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $titulaire->setComptes($this);
    }
    // GETTERS &&& SETTERS -------------------------------------

    public function getLibelle()
    {
        return $this->_libelle;
    }
    public function setLibelle(string $libelle)
    {
        $this->_libelle = $libelle;
    }
    public function getSolde()
    {
        return $this->_solde;
    }
    public function setSolde(float $solde)
    {
        $this->_solde = $solde;
    }
    public function getDevise()
    {
        return $this->_devise;
    }
    public function setDevise(string $devise)
    {
        $this->_devise = $devise;
    }
    public function getTitulaire()
    {
        return $this->_devise;
    }
    public function setTitulaire(Titulaire $titulaire)
    {
        $this->_titulaire = $titulaire;
    }

    // FIN GETTERS && SETTERS --------------------------------


    // Ajoute un montant au solde du compte
    public function Crediter(float $credit)
    {
        if ($credit > 0) {
            $this->_solde += $credit;
        }
    }

    // Enleve un montant au solde du compte
    public function Debiter(float $debit)
    {
        if ($debit > 0) {
            $this->_solde -= $debit;
        }
    }

    // Transfer des fonds d'un compte a l'autre
    public function Virement(CompteBancaire $compte, float $montant)
    {
        if ($montant > 0 && $montant <= $this->_solde) {
            $this->_solde -= $montant;
            $compte->_solde += $montant;
        }
    }
    public function Afficher_compte()
    {
        echo "Libellé " . $this->_libelle . "<br>" . "Solde : " . $this->_solde . " " . $this->_devise . "<br>" . "Titulaire : ";
        echo $this->_titulaire . "<br>";
    }
    public function __toString()
    {
        return "Libellé " . $this->_libelle . "<br>" . "Solde : " . $this->_solde . " " . $this->_devise . "<br>" . "Titulaire : " . "$this->_titulaire<br>";
    }
}














?>