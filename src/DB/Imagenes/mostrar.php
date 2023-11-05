<!DOCTYPE html>
<html>
<head>
	<title>Mostrar Imagenes</title>
</head>
<body>
	<center>
		<table border="2">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Imagen</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include("conexion.php");
					$query = "SELECT * FROM imagenes";
					$resultado = $conexion->query($query);
					while($row = $resultado->fetch_assoc()){
				?>
					<tr>
						<td><?php echo $row ['id']; ?></td>
						<td><?php echo $row ['nombre']; ?></td>
						<td><img height="150px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
					</tr>

				<?php
					}
				?>

			</tbody>
		</table>
	</center>
</body>
</html>