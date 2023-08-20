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
include("bdd_class_exe.php") ; // nom de la fonction a ajouter 
include("Select_datas.php") ; // nom de la fonction a ajouter 
include("connexion.php") ; 
include("Insertion_Bdd.php") ; // nom de la fonction a ajouter 
/*
// Pour factorise le code on utilise une classe creer sur le meme dossier bdd_class_exe.php
// Puis bdd_class_exe.php 
*/
 

// $_POST variable envoyé depuis le fichier javascript
// model/class/js/bdd_exe_config.js 
/*
  //********************************************
  //*informations envoye a l'aide du formulaire*
  //*si le fichier connexion.php n'existe pas  *
  //******************************************** 
*/ 
// information ajouter dans le fichier de connexion avec son parametre 
 
 
// nom du fichier courant
$ip = $_SERVER['SERVER_NAME'] ;   
 
$filename_config = "config_folder_verif.php";
// creation de table 
$execution_formulaire_php = new Bdd_class(
  $servername,
  $username,
  $password,
  $dbname);
  
  //echo $execution_formulaire_php->exe(); 
// Si tout va bien on crée ces tables 

$execution_formulaire_php->set_action ("CREATE TABLE ip (
  ip_id	 INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ip_nom VARCHAR(200) NOT NULL,
 
  ip_reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )");
 


 $apple = new Insertion_Bdd(
    $servername,
    $username,
    $password,
    $dbname
    
    );
        
   
    $apple->set_msg_valudation("") ;  
    $apple->set_sql("INSERT INTO ip (ip_nom)
    VALUES ('$ip')") ; 
    $apple->execution() ;
 
 
        

    // CODE exeMPLe 
 
 

 


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