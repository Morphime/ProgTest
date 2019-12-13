<?php
include 'functions.php';


//On fait une petite fonction pour aller chercher les parametre en get car ils ont des charatere réservé
$arr_parsed_param = ParseGetParameters();

//Ici on valide les paramètres
ValidateAPIParams($arr_parsed_param);

//Ici on génère tout les resultat et on retourne ca encodé en json
echo GenerateResults($arr_parsed_param);


