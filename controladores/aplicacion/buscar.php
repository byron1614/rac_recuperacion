<?php
require '../../modelos/Aplicacion.php';
try {
  
    $Aplicacion = new Aplicacion($_GET);
    // var_dump($grado);
    // exit;
    
    $Aplicaciones = $Aplicacion->buscar();
 
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($Aplicaciones) > 0):?>
                        <?php foreach($Aplicaciones as $key => $app) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $app['APLI_NOMBRE'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/rac_recuperacion/vistas/aplicaciones/modificar.php?apli_id=<?= $app['APLI_ID']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/rac_recuperacion/controladores/aplicacion/eliminar.php?apli_id=<?= $app['APLI_ID']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/rac_recuperacion/vistas/aplicaciones/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>