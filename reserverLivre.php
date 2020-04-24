<?php 
	session_start();

	if(! isset($_SESSION['livreCode'])) $_SESSION['livreCode']="";
		$code = $_GET['code'];
		$nom = $_GET['nom'];
		$prenom = $_GET['pre'];
		$titre = $_GET['titre'];
		$categorie = $_GET['categorie'];
		$isbn = $_GET['isbn'];
		$_SESSION['livreCode']=$_SESSION['livreCode']."/".$code;
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Reserver un livre</title>
</head>
<body>
	<h2>Reserver un livre</h2>
	Vous désirez réserver le livre suivant : <br><br>
	<table border="2">
		<tr>
			<td style="color: red;">Code du livre</td> <td><?php echo "$code"; ?></td>
		</tr>
		<tr>
			<td style="color: red;">Nom de l'auteur</td> <td><?php echo "$nom"; ?></td>
		</tr>
		<tr>
			<td style="color: red;">Prenom de l'auteur</td> <td><?php echo "$prenom"; ?></td>
		</tr>
		<tr>
			<td style="color: red;">Titre</td> <td><?php echo "$titre"; ?></td>
		</tr>
		<tr>
			<td style="color: red;">Categorie</td> <td><?php echo "$categorie"; ?></td>
		</tr>
		<tr>
			<td style="color: red;">ISBN</td> <td><?php echo "$isbn"; ?></td>
		</tr>
	</table>
	<form action="confirmation.php" method="post">
		<input type="submit"  name="Con" value="Confirmer" style="position:relative;top:30px;left:120px;">
	</form>
	<?php 
	try {
	$conn = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');
	} 
	catch (PDOException $e) 
	{
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}

	try {
          
         $sql = "UPDATE livres SET livdejareserve=1 WHERE livcode='$code'"; 
             $conn->query($sql);
         }catch( SQLException $e){  $e->getMessage();}	
	 ?>
</body>
</html>