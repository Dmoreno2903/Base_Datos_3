<?php
include "../includes/header.php";
?>

<!-- TÍTULO. Cambiarlo, pero dejar especificada la analogía -->
<h1 class="mt-3">Entidad análoga a CLIENTE (PEDIDO)</h1>

<!-- FORMULARIO. Cambiar los campos de acuerdo a su trabajo -->
<div class="formulario p-4 m-3 border rounded-3">

    <form action="pedido_insert.php" method="post" class="form-group">

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" class="form-control" id="valor" name="valor" required>
        </div>

        <div class="mb-3">
            <label for="fecha_compra" class="form-label">Fecha de compra</label>
            <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" required>
        </div>
        
        <div class="mb-3">
            <label for="fecha_entrega" class="form-label">Fecha de entrega (Mayor o igual a la fecha de compra)</label>
            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="Entregado">Entregado</option>
                <option value="En proceso">En proceso</option>
            </select>
        </div>

        <?php
        // Importar el código del otro archivo
        require("../proveedor/proveedor_select.php");

        // Verificar si llegan datos
        if($resultadoProveedor and $resultadoProveedor->num_rows > 0):
        ?>

        <div class="mb-3">
            <label for="proveedor_nit" class="form-label">Proveedor</label>
            <select class="form-control" id="proveedor_nit" name="proveedor_nit">
                <option value="">Seleccione un proveedor</option>
                <?php foreach ($resultadoProveedor as $proveedor) : ?>
                    <option value="<?= $proveedor["nit"]; ?>"> <?= $proveedor["nombre"]; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="verificador_nit" class="form-label">Verificador (Distinto del proveedor)</label>
            <select class="form-control" id="verificador_nit" name="verificador_nit">
                <option value="">Seleccione un proveedor</option>
                <?php foreach ($resultadoProveedor as $proveedor) : ?>
                    <option value="<?= $proveedor["nit"]; ?>"> <?= $proveedor["nombre"]; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <?php
        endif;
        ?>

        <button type="submit" class="btn btn-primary">Agregar</button>

    </form>
    
</div>

<?php
// Importar el código del otro archivo
require("pedido_select.php");

// Verificar si llegan datos
if($resultadoProveedor and $resultadoProveedor->num_rows > 0):
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
                <th scope="col" class="text-center">Proveedor</th>
                <th scope="col" class="text-center">Verificador</th>
            </tr>
        </thead>

        <tbody>

            <?php
            // Iterar sobre los registros que llegaron
            foreach ($resultadoProveedor as $fila):
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
                
                <!-- Botón de eliminar. Debe de incluir la CP de la entidad para identificarla -->
                <td class="text-center">
                    <form action="pedido_delete.php" method="post">
                        <input hidden type="text" name="codigoEliminar" value="<?= $fila["codigo"]; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>

            </tr>

            <?php
            // Cerrar los estructuras de control
            endforeach;
            ?>

        </tbody>

    </table>
</div>

<?php
endif;

include "../includes/footer.php";
?>