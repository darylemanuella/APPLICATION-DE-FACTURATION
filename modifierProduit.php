<?php
include("fonction.php");
 include("meta/meta.html");
 include("header/header.html");
 include("leftSide/left.html");
 ?>
         
		<div class="content">
		<div class="f9 upp"> 
		 <h4>MISE AJOUT DES PRODUITS</h4><br><br><br>
	     <form method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
	            categorie du produit <select>
		                        <option >  </option >
								<option > ordinateur</option >
		                      </select ><br><br>
		      nom du produit<input type="text" name="nomProduit"><br><br>
		     <input type="submit" name="rechercherProduit" value="RECHERCHER"> 
		    <input type="button" name="annuler" value="ANNULER"><br><br><br> <br>
		</form>
<fieldset>
		  <legend> informations sur les produit a modifier  </legend >
		  <table border="2">
		      <tr>
			      <td >N° </td >
			      <td >CATEGORIE </td >
				  <td >NOM </td >
				  <td >PRIX DE VENTE </td >
				  <td >PRIX MINIMAL DE VENTE </td >
				  <td >QUANTITE EN STOCK </td >
				  <td > QUANTITE SEUIL DU PRODUIT</td >
				  <td >DESCRIPTION </td >
				   <td >MODIFIER </td >
				   <td >SUPPRIMER </td >
				   
				  
			  </tr ><br><br>
			 <?php 
				  $i=1;
			      if(isset($_POST['rechercherProduit'])){
				    $i=1; $resultat=infosProduit($_POST['nomProduit']);
			 while(($donnees = mysqli_fetch_assoc($resultat))&& $i=1) { ?>
												
			            
			         
			  <tr > 
				  <td ><?php echo $i; ?> </td >
				   <td ><?php echo "Produit"; ?> </td >
				  <td ><?php echo $donnees['nomproduit'] ; ?> </td >
				  <td ><?php echo $donnees['prixvente'] ; ?> </td >
				  <td ><?php echo $donnees['prixventemin'] ; ?> </td >
				  <td ><?php echo $donnees['quantite'] ; ?> </td >
				  <td ><?php echo $donnees['quantiteseuil'] ; ?> </td >
				  <td ><?php echo $donnees['description'] ; ?> </td >
				  <td ><a href="#"><img src="img/modif.png" alt="Supprimer"> </a> </td >
				  <td ><a href="#"><img src="img/SUPP.PNG" alt="Supprimer"> </a></td >
				   
			  </tr > 
		     <?php $i++; }// fin de while ?>
			 <?php   }// fin de if ?>
			  
		  </table >
		 
		</fieldset >
		</fieldset >
	</div>
	</div>
<?php
 include("right/right.html");
 ?>	
 	