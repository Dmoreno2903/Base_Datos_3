<?php
include "../includes/header.php";
?>
<main style="margin-top:106px;padding-left: 8px">
    <!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
    <h1 class="mt-3">Consulta 1</h1>
    
    <p class="mt-3">
    El primer botón debe mostrar el nit  y el nombre de cada proveedor cuyo patrimonio sea mayor o igual a la suma de los valores correspondiente a los pedidos que el proveedor posee.
    </p>
    
    <?php
    // Crear conexión con la BD
    require('../config/conexion.php');
    
    // Query SQL a la BD -> Crearla acá (No está completada, cambiarla a su contexto y a su analogía)
    $query = "SELECT nit, nombre
    FROM proveedor
    WHERE patrimonio >= (
        SELECT SUM(valor)
        FROM pedido
        WHERE pedido.proveedor_nit = proveedor.nit
    );";
    
    // Ejecutar la consulta
    $resultadoC1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    mysqli_close($conn);
    ?>
    
    <?php
    // Verificar si llegan datos
    if($resultadoC1 and $resultadoC1->num_rows > 0):
    ?>
    
    <!-- MOSTRAR LA TABLA. Cambiar las cabeceras -->
    <div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">
    
        <table class="table table-striped table-bordered">
    
            <!-- Títulos de la tabla, cambiarlos -->
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">nit</th>
                    <th scope="col" class="text-center">Nombre</th>
                </tr>
            </thead>
    
            <tbody>
    
                <?php
                // Iterar sobre los registros que llegaron
                foreach ($resultadoC1 as $fila):
                ?>
    
                <!-- Fila que se generará -->
                <tr>
                    <!-- Cada una de las columnas, con su valor correspondiente -->
                    <td class="text-center"><?= $fila["nit"]; ?></td>
                    <td class="text-center"><?= $fila["nombre"]; ?></td>
                </tr>
    
                <?php
                // Cerrar los estructuras de control
                endforeach;
                ?>
    
            </tbody>
    
        </table>
    </div>
    
    <!-- Mensaje de error si no hay resultados -->
    <?php
    else:
    ?>
    
    <div class="alert alert-danger text-center mt-5">
        No se encontraron resultados para esta consulta
    </div>
</main>

<?php
endif;

include "../includes/footer.php";
?>