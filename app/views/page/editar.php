<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo NAME_APP; ?> </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12 card" style="padding: 5px">
			<form method="POST" action="<?php echo URL."login/guardar"; ?>">
				
				<div class="form-group">
					<label for="usuario">Usuario: </label>
					<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $data['usuario']; ?>">
				</div>
				
				<div class="form-group">
					<label for="Password">Contraseña:</label>
					<input type="password" class="form-control" id="Password" name="clave" placeholder="Contraseña" value="<?php echo $data['clave']; ?>">
				</div>

				<div class="form-group">
					<label for="role">Nivel de usuario:</label>
					<input type="text" class="form-control" id="role" name="nivel" placeholder="nivel del usuario" value="<?php echo $data['nivel']; ?>">
				</div>

				<button type="submit" class="btn btn-primary"> Editar </button>
				<a  href="<?php echo URL."login/"; ?>" class="btn btn-danger"> Atras </a>

			</form>
		</div>
	</div>
</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
