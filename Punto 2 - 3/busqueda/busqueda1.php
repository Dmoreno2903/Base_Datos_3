<?php
include "../includes/header.php";
?>

<!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
<main style="margin-top:106px;padding-left: 10px">

    <h1 class="mt-3" >Búsqueda 1</h1>
    
    <p class="mt-3">
        NIT de un proveedor. Se debe mostrar el código y la fecha de compra de
        todos los pedidos que el proveedor posea, pero siempre y cuando estos pedidos
        no estén siendo verificados por algún proveedor.
    </p>
    
    <!-- FORMULARIO. Cambiar los campos de acuerdo a su trabajo -->
    <div class="formulario p-4 m-3 border rounded-3">
    
        <!-- En esta caso, el Action va a esta mismo archivo -->
        <form action="busqueda1.php" method="post" class="form-group">
    
            <div class="mb-3">
                <label for="nit_proveedor" class="form-label">NIT del proveedor</label>
                <input type="text" class="form-control" id="nit_proveedor" name="nit_proveedor" required>
            </div>
    
            <button type="submit" class="btn btn-primary">Buscar</button>
    
        </form>
        
    </div>
    
    <?php
    // Dado que el action apunta a este mismo archivo, hay que hacer eata verificación antes
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    
        // Crear conexión con la BD
        require('../config/conexion.php');
    
        $nit_proveedor = $_POST["nit_proveedor"];
    
        // Query SQL a la BD -> Crearla acá (No está completada, cambiarla a su contexto y a su analogía)
        $query = "SELECT codigo, fecha_compra FROM pedido WHERE proveedor_nit = $nit_proveedor AND verificador_nit = ''";
    
        // Ejecutar la consulta
        $resultadoB1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        mysqli_close($conn);
    
        // Verificar si llegan datos
        if($resultadoB1 and $resultadoB1->num_rows > 0):
    ?>
    
    <!-- MOSTRAR LA TABLA. Cambiar las cabeceras -->
    <div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">
    
        <table class="table table-striped table-bordered">
    
            <!-- Títulos de la tabla, cambiarlos -->
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Código</th>
                    <th scope="col" class="text-center">Fecha de compra</th>
                </tr>
            </thead>
    
            <tbody>
    
                <?php
                // Iterar sobre los registros que llegaron
                foreach ($resultadoB1 as $fila):
                ?>
    
                <!-- Fila que se generará -->
                <tr>
                    <!-- Cada una de las columnas, con su valor correspondiente -->
                    <td class="text-center"><?= $fila["codigo"]; ?></td>
                    <td class="text-center"><?= $fila["fecha_compra"]; ?></td>
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
endif;

include "../includes/footer.php";
?>