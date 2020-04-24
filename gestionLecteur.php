<?php
session_start();
$vide = 0;	$done = 0;
	try {
	$conn = new PDO('mysql:host=localhost;dbname=librairie', 'root', '');
	} 
	catch (PDOException $e) 
	{
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}


 if(!isset($_SESSION['numL']))// Si lecteur authentifier 
     {
     	if(	isset($_POST['login']))
		{
			$nom = $_POST['nom_lecteur'];
			$mot_de_passe = $_POST['password'];
     	
		if($nom && $mot_de_passe)
		{
			$req = $conn->prepare("SELECT * FROM lecteurs WHERE lecnom = ? AND lecmotdepasse = ?"); 
			$req->execute(array($nom,$mot_de_passe));
			$userexist = $req->rowCount();
			if ($userexist == 1) 
			{
				 echo '<h1>Gestion du lecteur</h1>';
				$userinfo = $req->fetch();
				$_SESSION['numL']= $userinfo['lecnum'];
				$done=1;
			}
			else
			{
				$erreur = "Le lecteur n'est pas reconnu" .'<br>Cliquez <a href="login.php">ici</a> pour tenter une nouvelle identification';
				$vide = 1;
			}
		}
		else
		{
			$erreur = '<h3 style="color:red;"> Veuillez remplir tous les champs </h3>'.
			'<a href="login.php">Retourner a la page d\'authentification </a>';
		}}
		if(isset($erreur))
		{	echo $erreur;	}


			if($vide==1) require 'LecReconnu.php';
  	         
  	  }
  	  else
      {             
      	echo '<h1>Gestion du lecteur</h1>';
  	   	$tab_code=explode("/",$_SESSION['livreCode']);
  	     	include 'LectReconnu.php';
  	        for($i=1;$i<count($tab_code);$i++)
  	     	 {     
 	     	     $sql3="SELECT * from  livres where livcode ='$tab_code[$i]'";
                     $result=$conn->query($sql3);

                     $T1=$result->fetch();
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
   
?>
</body>
</html>