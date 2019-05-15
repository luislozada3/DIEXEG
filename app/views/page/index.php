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
		<div class="col-md-8 card" style="padding: 5px">
			<a href="<?php echo URL."login/registrar"; ?>" class="btn btn-primary"> Registrar</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Usuarios</th>
						<th scope="col">Rol</th>
						<th scope="col">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($data as $usuario):
					?>
						<tr>
							<td> <?php echo $usuario->usuario; ?> </td>
							<td> <?php echo $usuario->nivel; ?> </td>
							<td> 
								<a href="<?php echo URL."login/editar/".$usuario->id; ?>"> Editar </a>
								<a href="<?php echo URL."login/borrar/".$usuario->id; ?>"> Eliminar </a>

							</td>
						</tr>
					<?php
						endforeach;
					?>
				</tbody>
			</table>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-3 card" style="padding: 5px">
			<h2>otra cosa</h2>
		</div>
	</div>
	
</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
