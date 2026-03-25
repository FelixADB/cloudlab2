<?php
include("conexion.php");
$con = conexion();

$sql = "SELECT * FROM persona ORDER BY id ASC";
$resultado = pg_query($con, $sql);
?>
<!doctype html>
<html lang="es">
<head>
    <title>Listado de Personas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">
          <img src="index2.png" style="width: 30px; position: absolute;"> 
          <span style="position: relative; left: 35px;">Index</span>
      </h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Registrar</a>
        <a class="p-2 text-primary font-weight-bold" href="listar.php">Listar</a>
        <a class="p-2 text-dark" href="#">Actualizar</a>
        <a class="p-2 text-dark" href="#">Eliminar</a>
      </nav>
    </div>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h1 class="display-4">Personas Registradas</h1>
                <p class="lead">Datos obtenidos desde PostgreSQL en Render/Railway</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Documento</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Celular</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(pg_num_rows($resultado) > 0):
                            while($row = pg_fetch_assoc($resultado)): 
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['doc']; ?></td>
                                <td><?php echo $row['nom']; ?></td>
                                <td><?php echo $row['ape']; ?></td>
                                <td><?php echo $row['dir']; ?></td>
                                <td><?php echo $row['cel']; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-outline-warning">Editar</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                            <tr>
                                <td colspan="7" class="text-center">No hay registros disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                Total de registros: <strong><?php echo pg_num_rows($resultado); ?></strong>
            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top text-center">
            <small class="d-block mb-3 text-muted">&copy; 2026-1 - Reto Tokio</small>
        </footer>
    </div>

</body>
</html>
