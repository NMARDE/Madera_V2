<?php
include("DAO.php");
if(isset($_POST['nomClient'])){
	echo "coucou";
	nouveauClient($_POST['nomClient'],$_POST['prenomClient'],$_POST['emailClient'],$_POST['telephoneClient']);
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="CreationClient.php">
				<div class="form-group">
					 
					<label for="nomClient">
						Nom du client
					</label>
					<input type="text" class="form-control" id="nomClient" name="nomClient"/>
                </div>
                <label for="prenomClient">
						Prénom du client
					</label>
					<input type="text" class="form-control" id="prenomClient" name="prenomClient"/>
                </div>
                <label for="emailClient">
						Adresse mail
					</label>
					<input type="text" class="form-control" id="emailClient" name="emailClient"/>
				</div>
                <label for="telephoneClient">
						Telephone
					</label>
					<input type="text" class="form-control" id="telephoneClient" name="telephoneClient" />
				</div>					 
				</div> 
				<button type="submit" class="btn btn-primary">
					Créer
				</button>
			</form>
		</div>
	</div>
</div>
