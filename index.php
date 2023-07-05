<?php

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$titulaire1 = new Titulaire("Baisangour", "ALIEV", "1997-07-29", "Strasbourg");
$compte1 = new CompteBancaire("Courant : ", 1000, "€", $titulaire1);
$compte2 = new CompteBancaire("Livret A : ", 5000, "€", $titulaire1);

// Afficher les informations du titulaire
$titulaire1->Afficher_Titulaire();

// Afficher les informations du compte 1
echo $compte1->Afficher_compte();

// Créditer le compte 1
$compte1->Crediter(0);

// Débiter le compte 1
$compte1->Debiter(0);

// Virement du compte 1 au compte 2
$compte1->Virement($compte2, 0);

// Afficher les nouvelles informations du compte 1
echo $compte1->Afficher_compte();