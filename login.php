<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>AuthentificationLecteur</title>
 </head>
 <body >
 <form method="POST" action="gestionLecteur.php">
 	<table align="center">
 		<h2 align="center">Authentification du lecteur</h2>
 		<tr>
			<td>Nom de lecteur</td>
			<td> : <input type="text" name="nom_lecteur"></td>
		</tr>
		<tr>
			<td>Mot de passe</td>
			<td> : <input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="login" value="login"></td>
		</tr>
		<tr>
        <td> 
        	<p><b>Vous êtes nouveau !</b></p><a href="lecteurForm.php"><b>Veuillez vous enregistrer ici!</b></a></td>
      	</tr>
 	</table>
 </form>
 </body>
 </html>