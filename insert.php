<?php 
	$title = 'Insertar';
	include_once 'conexion.php';
	include_once './layouts/header.php';
	
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$telefono=$_POST['telefono'];

		if(!empty($nombre) && !empty($apellido) && !empty($telefono) ){
			if(!is_numeric($telefono)){
				echo "<script> alert('Ingrese un telefono valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO clientes(nombre,apellido,telefono) VALUES(:nombre,:apellido,:telefono)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':telefono' =>$telefono
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}

	


?>


<body>
	<div class="contenedor">
		<h2>INSERTAR NUEVOS REGISTROS ➕</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre" class="input__text">
				<input type="text" name="apellido" placeholder="Apellido" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Teléfono" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
<br><br><br><br><br><br><br><br><br><br><br>

<?php include_once './layouts/footer.php'; ?>
