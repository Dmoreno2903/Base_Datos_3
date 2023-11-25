<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabajo final BD1</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body{
            margin-top:106px;
        }
    </style>
</head>

<body style="margin-top:106px;">


<?php include './includes/header.php'; ?>
<main style="margin-top:106px;padding-left: 8px">

    <div class="informacion">
            <ul>
                <li><b class="text-primary">Materia:</b> Bases de Datos I</li>
                <li><b class="text-primary">Profesor:</b> Francisco Javier Moreno Arboleda</li>
                <li><b class="text-primary">Institución:</b> Universidad Nacional de Colombia sede Medellín</li>
                <li><b class="text-primary">Semestre:</b> 2023-2</li>
            </ul>
        </div>

        <div class="integrantes">
            <h2 class="text-primary">Integrantes</h2>
            <ul>
                <li>Samuel Meza Tabares</li>
                <li>Angel David Brand Londoño</li>
                <li>Juan Diego Aguirre Moreno</li>
            </ul>
        </div>

        <div class="modelo">
            <h2 class="text-primary">Modelo E-R</h2>
            <img src="Modelo_E-R.png" class="img-fluid rounded">
        </div>
        <div class="btn-group">
            <a href="proveedor/proveedor.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Entidad análoga a CLIENTE (PROVEEDOR)</a>
            <a href="pedido/pedido.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Entidad análoga a CASILLERO (PEDIDO)</a>
            <a href="consultas/consulta1.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Consulta 1</a>
            <a href="consultas/consulta2.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Consulta 2</a>
            <a href="busqueda/busqueda1.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Búsqueda 1</a>
            <a href="busqueda/busqueda2.php" style="margin-right:1px;margin-left:1px" class="btn btn-primary col-md-4">Búsqueda 2</a>
        </div>
</main>
<?php include './includes/footer.php'; ?>
</body>

</html>