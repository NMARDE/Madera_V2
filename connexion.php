<?php session_start();
include('DAO.php');?>
<html>
<img src="./image/connexion.png" usemap=#connexion>
<map name="connexion">
	<area href="accueil.html" shape="rect" coords="173,575,355,615"/>
</map>
<form method="post" action="connexion.php">
<input type="text" name="login" placeholder="Identifiant de connexion"/>
<input type="text" name="mdp" placeholder="Mot de passe"/>
<input type="submit" value="Connexion"/>
</form>
</html>
<?php
if(isset($_POST['login']) && isset($_POST['mdp'])){
	if(connexionSite($_POST['login'],$_POST['mdp'])!=false){
		$_SESSION['login']=$_POST['login'];
		?>
		<script>
		document.location.href="accueil.php";
		</script>
		<?php
	}else{
		echo "connexion échoué";
	}
}
?>