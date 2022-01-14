<?php
	 function creationPanier(){
        if (!isset($_SESSION['panier'])){
           $_SESSION['panier']=array();
           $_SESSION['panier']['nomProduit'] = array();
           $_SESSION['panier']['prixvente'] = array();
           $_SESSION['panier']['quantite'] = array();
            
        }
       return true;
     }// fin de la fonction  creationPanier
	 
	  function ajouterPanier(){
        if (isset($_POST['ajouter']) && creationPanier())
	        // ajout d'un produit dans le panier
			if(!array_search($_POST['nomProduit'], $_SESSION['panier']['nomProduit'])){
				
					array_push( $_SESSION['panier']['nomProduit'],$_POST['nomProduit']);
					array_push( $_SESSION['panier']['prixvente'],$_POST['prixvente']);
					array_push( $_SESSION['panier']['quantite'],$_POST['quantite']);
					return true;
				}
              return true;
		
      }// fin de la fonction  ajouterPanier(){
 ?>