<?php
	$title = 'Actualizar';
	include_once 'conexion.php';
	include_once './layouts/header.php';
	

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM clientes WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$telefono=$_POST['telefono'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($apellido) && !empty($telefono)){
			if(!is_numeric($telefono)){
				echo "<script> alert('Ingrese un telefono valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE clientes SET  
					nombre=:nombre,
					apellido=:apellido,
					telefono=:telefono
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':telefono' =>$telefono,
					':id' =>$id
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
		<h2>ACTUALIZACIÓN INFORMACIÓN ✏️</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
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
