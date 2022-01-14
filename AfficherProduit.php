 <?php
 include("connexion.php");
 /*selection des noms de categories de produits*/
      $requete="select * from produit";  
      $resultat=$connexion->query($requete);
 
 
 include("meta/meta.html");
 include("header/header.html");
 include("leftSide/left.html");
 ?>
 <div class="content">
 <div class="f9 upp"> 
		 
		  <caption> <h3>Informations Sur Les Produits</h3 > </caption >
		  <table border="2" width="60%">
		      <tr>
			      <td >N° </td >
			      <td >CATEGORIE </td >
				  <td >NOM </td >
				  <td >PRIX DE VENTE </td >
				  <td >PRIX MINIMAL DE VENTE </td >
				  <td >QUANTITE EN STOCK ACTUEL</td >
				  <td >QUANTITE MINIMAL EN STOCK </td >
				  <td > UOM</td >
				  <td >DESCRIPTION </td >
				   
				  
			  </tr ><br><br>
			  <?php
					while($donnees = mysqli_fetch_assoc($resultat)){?>

 
			  <tr > 
				  <td ><?php echo $donnees['idproduit'];?> </td >
				  <td ><?php echo $donnees['categorie'];?> </td >
				  <td ><?php echo $donnees['nomproduit'];?></td >
				  <td ><?php echo $donnees['prixvente'];?></td >
				  <td ><?php echo $donnees['prixventemin'];?> </td >
				  <td ><?php echo $donnees['quantite'];?> </td >
				  <td ><?php echo $donnees['uom'];?> </td >
				  <td ><?php echo $donnees['description'];?> </td >
				   
			  </tr >
			  <?php }?>
		
		  </table >
</div>
</div> 		 
 	 
<?php
 include("right/right.html"); 
  
?>
		