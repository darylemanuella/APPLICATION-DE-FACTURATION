<?php
include("connexion.php");
include("fonction.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 session_start(); //démarrage d'une session

$nom = $_POST["nom"];
$password = $_POST["password"];

try{
		 
		
        if (count(presenceUser($nom ,$password)) == 0){ 
           
           //$fo = fopen("index.html", "w");
           //fwrite($fo, "Les informations entrées sont incorrectes. Veillez rééssayer !!!!!");
           //fclose($fo);
           header('Location: index.php');
           //include 'Connection.html';
           echo '<p align = "center" style="color:red;">Les informations entrees sont incorrectes veillez reessayer!!!!!</p>'; 
          
           //header('Location: index.html'); exit();
        
        }else{
		    
            $_SESSION['nom'] = $nom; //Variable de session pour le nom
            $_SESSION['password'] = $password; //Variable de session pour le mot de passe
            $_SESSION['cpt'] =rechercherType_cpt($nom ,$password); //Variable de session pour le type de compte
            if (rechercherType_cpt($nom ,$password)==1){
               header('Location: acceuil.php');
			   }else{
			     header('Location: vendors.php'); exit();
              }
        }
         //termine le traitement de la requète
}catch(Exception $e){
	die("Connection impossible a MYSQL : " );
         
}	