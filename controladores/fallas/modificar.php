<?php
require '../../modelos/fallas.php';


if ($_POST != '') {
    try {
    
        $fechaPost = $_POST['fal_fecha'];
        $fechaObjeto = date_create($fechaPost);
        $fechaFormateada = date_format($fechaObjeto, 'm/d/Y'); 
        $datosfallas = $_POST;
        $datosfallas['fal_fecha'] = $fechaFormateada;
        $Fallas = new Fallas($datosfallas);


        $resultado = $Fallas->modificar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2) {
        $error = $e2->getMessage();
    }
} else {
    $error = "Debe llenar todos los datos";
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
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Modificado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/rac_recuperacion/controladores/fallas/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>
