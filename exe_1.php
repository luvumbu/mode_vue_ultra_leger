<?php
session_start() ; 
/*
commande envoyé depuis le fichier javascript
// model/class/js/bdd_exe_config.js 
*/
/*
Fichier de configuration appartir du renvoi de requette lorsque le fichier Connexion n'existe pas
*/
header("Access-Control-Allow-Origin: *");
include("Select_datas.php") ; // nom de la fonction a ajouter 
include("connexion.php") ; 
 
 
 
 

 


$apple = new Select_datas($servername,$username,$password,$dbname);

  array_push(
    $apple->row,
    'ip_id',
    'ip_nom' 

    );
 
   
    $apple->sql='SELECT * FROM `ip` WHERE 1';
    $apple->execution();
    $myJSON = json_encode($apple->list_row); 

    // echo   $myJSON ; 
 
    $apple->all_data_json() ; 
 
?>