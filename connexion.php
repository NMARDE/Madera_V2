<?php include('DAO.php');
connexionSite('lol','lul');?>
<html>
<img src="./image/connexion.png" usemap=#connexion>
<map name="connexion">
	<area href="accueil.html" shape="rect" coords="173,575,355,615"/>
</map>
<form method="post" action="index.php">
<input type="text" name="login" placeholder="Identifiant de connexion"/>
<input type="text" name="mdp" placeholder="Mot de passe"/>
<input type="submit" value="Connexion"/>
</form>
</html>
<?php
if(isset($_POST['login'] && isset($_POST['mdp']){
	if(connexionSite($_POST['login'],$_POST['mdp'])!=false){
		
	}else{
		
	}
}
?>