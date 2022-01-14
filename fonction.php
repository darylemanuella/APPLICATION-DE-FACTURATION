 <?php
 function  PanierVide(){
        if (!isset($_SESSION['panier'])){
          return true;
		}else return false;
	}
 $prix=0;
 $id=0;
 include("connexion.php");
//******************** LECTURE DES DONNEES DE LA BASE DE DONNEES**********************************************					 
		function presenceUser($nom ,$password){
		// cette fonction permet de verifier si un user existe dans la bd
		   
		      
			 $connexion=new mysqli("localhost","root","","gestionstock");
             $requete ="SELECT nom, password, Type_cpt FROM employe WHERE nom = '".$nom."' AND password = '".$password."'";
	         $resultat =$connexion->query($requete); 
			 return $resultat;
		}// fin de function presenceUser
		function rechercherType_cpt($nom ,$password){
		// cette fonction retourne la valeur de Type_cpt d'une personne
		   
		     $valeur="";
			 $connexion=new mysqli("localhost","root","","gestionstock");
             $requete ="SELECT nom, password, Type_cpt FROM employe WHERE nom = '".$nom."' AND password = '".$password."'";
	         $resultat =$connexion->query($requete); 
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $valeur=$donnees['Type_cpt']; 
			         
		    return $valeur;
		}// fin de function rechercherType_cpt
		function infosProduit($nomProduit){
		$connexion=new mysqli("localhost","root","","gestionstock");
		// cette fonction retourne les information d'un produit de la BD
		  /*selection des noms de  produits*/
            $requete="select  * from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			return $resultat;
		}// fin de function infosProduit
		
		
		
		function rechercherIdProduit($nomProduit){
		// cette fonction retourne le Prix de vente Unitaire d'un produit de la BD
		  /*selection des noms de  produits*/
            $requete="select  idproduit  from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $prix=$donnees['idproduit']; 
			         
		    return $prix;
		}// fin de function rechercherIdProduit
		
		function prixVente($nomProduit){
		// cette fonction retourne le Prix de vente Unitaire d'un produit de la BD
		  /*selection des noms de  produits*/
            $requete="select  prixvente  from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $prix=$donnees['prixvente']; 
			         
		    return $prix;
		}// fin de function prixVente($nomProduit)			 

		function prixVenteMin($nomProduit){
		// cette fonction retourne le Prix de vente Unitaire Minimal d'un produit de la BD
		  /*selection des noms de  produits*/
		     $prix=0;
			 $connexion=new mysqli("localhost","root","","gestionstock");
            $requete="select  prixventemin  from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $prix=$donnees['prixventemin']; 
			         
		    return $prix;
		}// fin de function prixVenteMin($nomProduit)
		
		function quantite($nomProduit){
		      $prix=0;
			 $connexion=new mysqli("localhost","root","","gestionstock");
		// cette fonction retourne quantité d'un produit de la BD ou en stock
		  /*selection des noms de  produits*/
            $requete="select  quantite  from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $prix=$donnees['quantite']; 
			         
		    return $prix;
		}// fin de function quantite($nomProduit)
		
		function quantiteSeuil($nomProduit){
		// cette fonction retourne quantité d'un produit de la BD ou en stock
		  /*selection des noms de  produits*/
            $requete="select  quantitemin  from produit where nomProduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			 
					while($donnees = mysqli_fetch_assoc($resultat)) 
			           $prix=$donnees['quantitemin']; 
			         
		    return $prix;
		}// fin de function quantiteSeuil($nomProduit)
//************************************* MODIFICATION DES DONNEES DE LA BASE DE DONNEES**********************************************
        	
			
			function updatePrixVente($prixvente,$nomProduit){
		// cette fonction modifie le Prix de vente Unitaire d'un produit de la BD
		   
            $requete="update produit set prixvente=".$prixvente." where nomproduit='".$nomProduit."'" ;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updatePrixVente 	
		
		function updatePrixVenteMin($prixventemin,$nomProduit){
		// cette fonction modifie le Prix de vente Unitaire minimale d'un produit de la BD
		   
            $requete="update produit set prixventemin=".$prixventemin." where nomproduit='".$nomProduit."'" ;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updatePrixVenteMin 
		
		function updateQuantite($quantite,$nomProduit){
		// cette fonction modifie la quantite d'un produit de la BD
			$connexion=new mysqli("localhost","root","","gestionstock");
            $requete="update produit set quantite=".$quantite." where nomproduit='".$nomProduit."'" ;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updateQuantite
		
		function updateQuantiteMin($quantitemin,$nomProduit){
		// cette fonction modifie la valeur de la quantité minimale d'un produit de la BD
		   
            $requete="update produit set quantitemin=".$quantitemin." where nomproduit='".$nomProduit."'" ;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updateQuantiteMin
		
		/*function updateQuantiteMin($quantitemin,$nomProduit){
		// cette fonction modifie la valeur de la quantité minimale d'un produit de la BD
		   
            $requete="update produit set quantitemin=".$quantitemin." where nomproduit='".$nomProduit."'" ;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updateQuantiteMin
		*/
//************************************* INFORMATIONS SUR LES FACTURES**********************************************
		
		function insererListeFacture($idfacture,$nomproduit,$quantite,$prixvente){
		// cette fonction insere tous les element d'une facture  
			$connexion=new mysqli("localhost","root","","gestionstock");
            $requete="insert into listefacture values(NULL,".$idfacture.",'".$nomproduit."',".$quantite.",".$prixvente.")"; 
				 
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function insererFacture
		function insererFacture($nomclient,$idemploye){
		// cette fonction insere tous les element d'une facture  
			$connexion=new mysqli("localhost","root","","gestionstock");
            $requete="insert into facture values(NULL,'".$nomclient."','".date("Y-m-d H:i:s")."',".$idemploye.")"; 
				 
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function insererFacture
		function rechercherIdFacture($nomclient){
		 $id=0;
		// cette fonction permet de rechercher l'id de la  facture
		   $connexion=new mysqli("localhost","root","","gestionstock");
            $requete="select  idfacture  from  facture    where  datefacture='".date("Y-m-d H:i:s")."' and nomclient='".$nomclient."'";  
            $resultat=$connexion->query($requete);
			while($donnees = mysqli_fetch_assoc($resultat)) 
			           $id=$donnees['idfacture']; 
			return $id;
		}// fin de function rechercherIdFacture
		
		
		function rechercherFacture($reference){
		// cette fonction de rechercher tous les element d'une facture par sa reference ou numero de facture
		   $connexion=new mysqli("localhost","root","","gestionstock");
            $requete="select  *  from  facture F, listefacture L   where F.idfacture=".$reference." and L.idfacture=".$reference;  
            $resultat=$connexion->query($requete);
			return $resultat;
		}// fin de function rechercherFacture
		
		function updateQuantiteFacture($reference,$quantite,$nomproduit){
		// cette fonction modifie la valeur de la quantité  d'un produit  d'une facture deja enregistrer dans la BD
		   
            $requete="update listefacture set quantite =".$quantite." where idfacture=".$reference." and   nomproduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updateQuantiteFacture
		
		function updatePrixVenteFacture($reference,$prixvente,$nomproduit){
		// cette fonction modifie la valeur du prix de vente  d'un produit  d'une facture deja enregistrer dans la BD
		   
            $requete="update listefacture set prixvente =".$prixvente." where idfacture=".$reference." and   nomproduit='".$nomProduit."'";  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updatePrixVenteFacture
		function updateNomClient($reference,$nomclient ){
		// cette fonction modifie la valeur le nom du client  d'une facture deja enregistrer dans la BD
		   
            $requete="update  facture set nomclient =".$nomclient." where idfacture=".$reference;  
            $resultat=$connexion->query($requete);
			return true;
		}// fin de function updateNomClient
		//************************************* INFORMATIONS SUR LES EMPLOYES**********************************************
		function rechercherIdEmploye($pseudo,$password){
			$id=0;
		// cette fonction permet de rechercher l'id de l'employé
		   $connexion=new mysqli("localhost","root","","gestionstock");
            $requete="select  idemploye from  employe    where  nom='".$pseudo."' and password='".$password."'";  
            $resultat=$connexion->query($requete);
			while($donnees = mysqli_fetch_assoc($resultat)) 
			           $id=$donnees['idemploye']; 
			return $id;
		}// fin de function rechercherIdEmploye
		
?> 