<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db_hostname = 'localhost';
$db_database = 'bdd_shop';
$db_username = 'root';
$db_password = '';
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$db_server = new PDO('mysql:host=localhost; dbname=bdd_shop','root','' ,$pdo_options);
	
	$reponse = $db_server->query('SELECT id_user, nom, prenom, sexe, date_Naissance, Lieu_Naissance, CNI, Type_cpt FROM tb_users ORDER BY id_user');
	?>
		<table border = "1" align = "center">
                    <CAPTION><h1>LISTE DU PERSONNEL</h1></CAPTION>
			<tr>
				<th>Numero</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Sexe</th>
				<th>Date de Naissance</th>
				<th>Lieu de Naissance</th>
				<th>CNI</th>
				<th>Type de Compte</th>
			</tr>
        <?php
	while ($donnees = $reponse->fetch())
	{
		?>
			<tr>
				<td><?php echo $donnees['id_user']; ?></td>
				<td><?php echo $donnees['nom']; ?></td>
				<td><?php echo $donnees['prenom']; ?></td>
				<td><?php echo $donnees['sexe']; ?></td>
				<td><?php echo $donnees['date_Naissance']; ?></td>
				<td><?php echo $donnees['Lieu_Naissance']; ?></td>
				<td><?php echo $donnees['CNI']; ?></td>
				<td><?php echo $donnees['Type_cpt']; ?></td>
			</tr>
	<?php
	}
	$reponse->closeCursor(); //termine le traitement de la requète
	?>
            </table>
        <?php
}catch(Exception $e){
	die("Connection impossible a MYSQL : " .mysql_error());
}

	
	