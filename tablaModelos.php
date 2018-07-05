<!DOCTYPE html>
<?php
include("conexion_sql.php");
$consulta = "Select id_estado, nombre_estado from Estados order by nombre_estado asc";
$ejecutar = sqlsrv_query($con, $consulta);
?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">   
    </head>
<body>

	<div class="col-md-8 col-md-offset-2">
	<table class="table table-bordered table-responsive">
		<tr>
			<td>ID Modelo</td>
			<td>Descripcion Modelo</td>
		</tr>

		<?php
			$consulta = "SELECT * FROM modelos";

			$ejecutar = sqlsrv_query($con, $consulta);

			$i = 0;

			while($fila = sqlsrv_fetch_array($ejecutar)){
				$id = $fila['id_modelo'];
				$rfc = $fila['descripcion_modelo'];
				
				$i++;
		?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $rfc; ?></td>
			<td><a href="editarModelos.php?editar=<?php echo $id; ?>">Editar</a></td>
			<td><a href="tablaModelos.php?borrar=<?php echo $id; ?>">Borrar</a></td>
		</tr>
		<?php } ?>

	</table>
	</div>

	<?php	
	if(isset($_GET['borrar'])){

			$borrar_id = $_GET['borrar'];

			$borrar = "DELETE FROM Modelos WHERE id_modelo='$borrar_id'";
			
			echo $borrar_id;

			$ejecutar = sqlsrv_query($con, $borrar);

			if($ejecutar){
				echo "<script>alert('El modelo ha sido borrado')</script>";
				echo "<script>window.open('formularioModelos.php', '_self')</script>";
			}else{
			echo "<script>alert('El modelo esta enlazado, impocible borrar')</script>";
				
		}
		}
?>

</body>
</html>
