<!DOCTYPE html>
<html>
<head>
	<title>Livre Form</title>
</head>
<body>
	<h2 align="center">Enregistrement d'un livre</h2>

	<form action="valideLivre.php" method="POST">
		<table align="center">
			<tr>
				<td>Nom de l'auteur</td>
				<td> : <input type="text" name="nom_auteur" minlength="3"></td>
			</tr>
			<tr>
				<td>Prénom de l'auteur</td>
				<td> : <input type="text" name="prenom_auteur" minlength="3"></td>
			</tr>
			<tr>
				<td>Titre du livre</td>
				<td> : <input type="text" name="titre" minlength="3"></td>
			</tr>
			<tr>
				<td>Catégorie </td>
				<td> : 
					<select name="categorie">
						<option value="roman">Roman</option>
						<option value="science_fiction">Science-fiction</option>
						<option value="policier">Policier</option>
						<option value="documentaire">documentaire</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Numéro ISBN</td>
				<td> : <input type="text" name="isbn" minlength="3"></td>
			</tr>
			<tr>
				<td><input type="submit" name="enregistrer" value="Enregistrer"></td>
			</tr>
		</table>
	</form>
</body>
</html>