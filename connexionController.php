<?php
include ("./model/DAO.php");
function $connexion = if(isset($_POST['login']) && isset($_POST['mdp'])){
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