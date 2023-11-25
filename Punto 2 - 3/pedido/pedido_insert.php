<?php
 
// Crear conexión con la BD
require('../config/conexion.php');

// Sacar los datos del formulario. Cada input se identifica con su "name"
$valor = $_POST["valor"];
$fecha_compra = $_POST["fecha_compra"];
$fecha_entrega = $_POST["fecha_entrega"];
$estado = $_POST["estado"];
$proveedor_nit = $_POST["proveedor_nit"];
$verificador_nit = $_POST["verificador_nit"];

// Query SQL a la BD. Si tienen que hacer comprobaciones, hacerlas acá (Generar una query diferente para casos especiales)
$query = "INSERT INTO `pedido`(`valor`, `fecha_compra`, `fecha_entrega`, `estado`, `proveedor_nit`, `verificador_nit`) VALUES ('$valor', '$fecha_compra', '$fecha_entrega', '$estado', '$proveedor_nit', '$verificador_nit')";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
    // Si fue exitosa, redirigirse de nuevo a la página de la entidad
	header("Location: pedido.php");
else:
	echo "Ha ocurrido un error al crear un pedido";
endif;

mysqli_close($conn);