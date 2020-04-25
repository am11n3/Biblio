<?php
session_start();
	try {
	$conn = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');	

	$vide = 0;
	$done = 0;
 
	if(!isset($_SESSION['numL']))
	{
		$nom = $_POST['nom_lecteur'];
		$mot_de_passe = $_POST['password'];

		echo '<h1>Gestion du lecteur</h1>';

		if($nom && $mot_de_passe)
		{
			$req = $conn->prepare("SELECT * FROM lecteurs WHERE lecnom = ? AND lecmotdepasse = ?"); 
			$req->execute(array($nom,$mot_de_passe));
			$userexist = $req->rowCount();
			if ($userexist == 1) 
			{
				$userinfo = $req->fetch();
				$_SESSION['numL']= $userinfo['lecnum'];
				$done=1;
			}
			else
			{
				echo "Le lecteur n'est pas reconnu" .'<br>Cliquez <a href="login.php">ici</a> pour tenter une nouvelle identification';
				$vide = 1;
			}
		}
		else
		{
			echo '<h3 style="color:red;"> Veuillez remplir tous les champs </h3>'.
			'<a href="login.php">Retourner a la page d\'authentification </a>';
		}
		if( $valide==1)
  	     {include'LectReconnu.php';} 
	}
	else
	{
		echo '<h1>Gestion du lecteur</h1>';

	  	 $tab_code=explode("/",$_SESSION['livreCode']);
	  	 for($i=1;$i<count($tab_code);$i++)
	  	 {
	  	 	$sql3="SELECT * from  livres where livcode ='$tab_code[$i]'";
	  	 	$result=$conn->query($sql3);
	  	 	$Tab=$result->fetch();
	        echo"<tr>
	        		<td>$Tab[0]</td>
	        		<td>$Tab[1]</td>
	        		<td>$Tab[2]</td>
	        		<td>$Tab[3]</td>
	        		<td>$Tab[4]</td>
	        		<td>$Tab[5]</td>
	        	</tr>";
	        $result->closeCursor();

	  	 }
	  	 echo"</table>";

	}

	}
	catch (PDOException $e) 
	{
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}