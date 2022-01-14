<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start(); //démarrage d'une session

$nom = $_POST["nom"];
$password = $_POST["password"];

try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$db_server = new PDO('mysql:host=localhost; dbname=bdd_shop','root','' ,$pdo_options);
	
	$reponse = $db_server->query("SELECT nom, password, Type_cpt FROM tb_users WHERE nom = '$nom' AND password = SHA1('$password')");
        
        $result = $reponse->fetchAll();
        if (count($result) == 0){ 
           
           //$fo = fopen("index.html", "w");
           //fwrite($fo, "Les informations entrées sont incorrectes. Veillez rééssayer !!!!!");
           //fclose($fo);
           include 'index.html';
           //include 'Connection.html';
           echo '<p align = "center" style="color:red;">Les informations entrees sont incorrectes veillez reessayer!!!!!</p>'; 
          
           //header('Location: index.html'); exit();
        
        }else{
            $_SESSION['nom'] = $nom; //Variable de session pour le nom
            $_SESSION['password'] = $password; //Variable de session pour le mot de passe
            $_SESSION['Type_cpt'] = $result['Type_cpt']; //Variable de session pour le type de compte
            
            header('Location: userList.php');
            exit();
        }
        $reponse->closeCursor(); //termine le traitement de la requète
}catch(Exception $e){
	die("Connection impossible a MYSQL : " .  mysqli_errno($db_server));
        session_destroy();
}	