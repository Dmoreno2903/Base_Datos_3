<?php
include "../includes/header.php";
?>
<main style="margin-top:106px;padding-left: 8px">

    <!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
    <h1 class="mt-3">Búsqueda 2</h1>
    
    <p class="mt-3">
        Dos fechas f1 y f2 (cada fecha con día, mes y año), f2 >= f1 y un estado. 
        Se debe mostrar todos los datos de los pedidos que tienen fecha de
        compra entre f1 (inclusive) y f2 (inclusive), que su estado sea el ingresado, que
        tienen proveedor y que están siendo verificados por proveedor.
    </p>
    
    <!-- FORMULARIO. Cambiar los campos de acuerdo a su trabajo -->
    <div class="formulario p-4 m-3 border rounded-3">
    
        <!-- En esta caso, el Action va a esta mismo archivo -->
        <form action="busqueda2.php" method="post" class="form-group">
    
            <div class="mb-3">
                <label for="fecha_1" class="form-label">Fecha 1</label>
                <input type="date" class="form-control" id="fecha_1" name="fecha_1" required>
            </div>
    
            <div class="mb-3">
                <label for="fecha_2" class="form-label">Fecha 2</label>
                <input type="date" class="form-control" id="fecha_2" name="fecha_2" required>
            </div>
    
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="Entregado">Entregado</option>
                    <option value="En proceso">En proceso</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Buscar</button>
    
        </form>
        
    </div>
    
    <?php
    // Dado que el action apunta a este mismo archivo, hay que hacer eata verificación antes
    if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    
        // Crear conexión con la BD
        require('../config/conexion.php');
    
        $fecha_1 = $_POST["fecha_1"];
        $fecha_2 = $_POST["fecha_2"];
        $estado = $_POST["estado"];
    
        // Query SQL a la BD -> Crearla acá (No está completada, cambiarla a su contexto y a su analogía)
        $query = "SELECT * FROM pedido WHERE fecha_compra BETWEEN '$fecha_1' AND '$fecha_2' AND estado = '$estado';";
    
        // Ejecutar la consulta
        $resultadoB2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
        mysqli_close($conn);
    
        // Verificar si llegan datos
        if($resultadoB2 and $resultadoB2->num_rows > 0):
    ?>
    
    <!-- MOSTRAR LA TABLA. Cambiar las cabeceras -->
    <div class="tabla mt-5 mx-3 rounded-3 overflow-hidden">
    
        <table class="table table-striped table-bordered">
    
            <!-- Títulos de la tabla, cambiarlos -->
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Código</th>
                    <th scope="col" class="text-center">Valor</th>
                    <th scope="col" class="text-center">Fecha de compra</th>
                    <th scope="col" class="text-center">Fecha de entrega</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">NIT del proveedor</th>
                    <th scope="col" class="text-center">NIT del verificador</th>
                </tr>
            </thead>
    
            <tbody>
    
                <?php
                // Iterar sobre los registros que llegaron
                foreach ($resultadoB2 as $fila):
                ?>
    
                <!-- Fila que se generará -->
                <tr>
                    <!-- Cada una de las columnas, con su valor correspondiente -->
                    <td class="text-center"><?= $fila["codigo"]; ?></td>
                    <td class="text-center"><?= $fila["valor"]; ?></td>
                    <td class="text-center"><?= $fila["fecha_compra"]; ?></td>
                    <td class="text-center"><?= $fila["fecha_entrega"]; ?></td>
                    <td class="text-center"><?= $fila["estado"]; ?></td>
                    <td class="text-center"><?= $fila["proveedor_nit"]; ?></td>
                    <td class="text-center"><?= $fila["verificador_nit"]; ?></td>
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