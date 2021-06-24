<?php
	$title = 'Inicio';
	include_once 'conexion.php';
	include_once './layouts/header.php';
	
	

	$sentencia_select=$con->prepare('SELECT * FROM clientes ORDER BY id ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	// busca por nombre o apellido
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM clientes WHERE nombre LIKE :campo OR apellido LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
	}
	
	

?>



<body>
	<div class="contenedor">
		<h2>REGISTRO DE PARTICIPANTES 📝</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellido" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?> " class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar" >
				<a href="insert.php" class="btn btn__nuevo">Nuevo <i class="bi bi-plus-circle"></i></a>
			</form>
		</div>
		<div style="overflow-x:auto;">
			<table>
				<tr class="head">
					<td>#ID</td>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Teléfono</td>
					<td colspan="2">Acción</td>
				</tr>
				<?php foreach($resultado as $fila):?>
					<tr >
						<td><?php echo $fila['id']; ?></td>
						<td><?php echo $fila['nombre']; ?></td>
						<td><?php echo $fila['apellido']; ?></td>
						<td><?php echo $fila['telefono']; ?></td>
						<td style="text-align: center;"><a href="update.php?id=<?php echo $fila['id']; ?>"  class="btn__update" >Editar <i class="bi bi-pencil-square"></i></a></td>
						<td style="text-align: center;"><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar <i class="bi bi-trash2"></i></a></td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</body>
<br><br><br><br><br><br><br>

<?php include_once './layouts/footer.php'; ?>