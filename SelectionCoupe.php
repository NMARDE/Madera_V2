<html>
<img src="./image/SelectionCoupe.png" usemap=#SelectionCoupe>
<map name="SelectionCoupe">
	<area href="NommerProjet.html" shape="rect" coords="10,15,65,60"/>
	<area href="DetailsMaison.html" shape="rect" coords="135,655,390,695"/>
</map>
<?php echo $_POST['NomProjet']; ?>
<?php echo $_GET['plan']; ?>
<form method="post" action="DetailsMaison.php">
 <select id="Coupe" name="Coupe" id="Coupe">
  <option value="Principe1" selected>Coupe de Principe 1</option>
  <option value="Principe2">Coupe de Principe 2</option>
  <option value="Principe3">Coupe de Principe 3</option>
  <option value="Principe4">Coupe de Principe 4</option>
</select>
<input type="hidden" name="plan" value="<?php echo $_GET['plan']?>">
<input type="hidden" name="NomProjet" value="<?php echo $_POST['NomProjet']?>">
	<input type="submit" value="ok"/>
 </form>
</html>