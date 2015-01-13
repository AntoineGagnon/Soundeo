<?php require_once("./Vue/Header.php"); ?>


<div id="contenu" class="container">
	
	<div class="row">
		<div class="col-md-9">
            <form class="form-horizontal" method="post">
				<fieldset>
					<legend>Inscription</legend>
					<div class="form-group col-md-4">
						<label class=" control-label" for="email">Email</label>  
						<input id="email" name="email" type="text" placeholder="email@test.fr" class="form-control input-md">
						<label class=" control-label" for="password">Mot de passe</label>
						<input id="password" name="password" type="password" placeholder="Mot de passe" class="form-control input-md">
						<label class=" control-label" for="password">Mot de passe</label>
						<input id="password2" name="password2" type="password" placeholder="Mot de passe" class="form-control input-md">
						<label class="control-label" for="submit"></label><br/>
						<button id="submit" name="submit" class="btn btn-primary">Valider</button>
					</div>

                    <input type="hidden" name="action" value="inscription"> 
                    <input type="hidden" name="form" value="1"> 
				</fieldset>
			</form>

		</div> 



<?php 
require_once("./Vue/Sidebar.php");
require_once("./Vue/Footer.php"); 
?>		