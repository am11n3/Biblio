
 <!DOCTYPE html>
<html>
<head>
	<title>Interface de saisie d'un lecteur</title>
</head>
<body>
	<h2 align="center">Enregistrement d'un lecteur</h2>
	<p align="center">Si vous etes un nouveau lecteur, veuillez enregistrer en remplissant le formulaire ci-dessous:</p>
	<br><br>
	<form action="valideLecteur.php" method="POST">
		<table align="center">
			<tr>
				<td>Num</td>
				<td> : <input type="text" name="num" maxlength="3" ></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td> : <input type="text" name="nom" minlength="3" ></td>
			</tr>
			<tr>
				<td>Prenom</td>
				<td> : <input type="text" name="prenom" minlength="3" ></td>
			</tr>
			<tr>
				<td>Adresse</td>
				<td> : <input type="text" name="adresse" minlength="3" ></td>
			</tr>
			<tr>
				<td>Ville</td>
				<td> : <input type="text" name="ville" minlength="3"  ></td>
			</tr>
			<tr>
				<td>Code Postal</td>
				<td> : <input type="text" name="code_postal" minlength="3" v></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td> : <input type="password" name="password" minlength="8"></td>
			</tr>
			<tr>
				<td><input type="submit" name="enregistrer" value="Enregistrer"></td>
			</tr>
		</table>
	</form>
</body>
</html>