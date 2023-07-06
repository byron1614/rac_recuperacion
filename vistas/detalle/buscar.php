<?php
include_once '../../includes/header.php';
include_once '../../includes/navbar.php';

require '../../modelos/Aplicacion.php';
require '../../modelos/Asignar.php';
require '../../modelos/fallas.php';

// Obtener el nombre de la aplicación
//var_dump($_REQUEST);
try {
    $apli_id = $_REQUEST['id'] ?? null;
    $app = new Aplicacion(['apli_id' => $apli_id]);
    
    $apps = $app->buscarapp();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener el nombre del programador
try {
    $asi_apli = $_REQUEST['id'] ?? null;
    $nombre = new Asignar(['asi_apli' => $asi_apli]);
   
    $nombres = $nombre->buscarnom();
  
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener las fallas y calcular el porcentaje de trabajo realizado
try {
    $fal_apli = $_REQUEST['id'] ?? null;
    $falla = new Fallas(['fal_apli' => $fal_apli]);
  
    $tare = $falla->buscarfal(); 

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>
<body>
<div class="container border bg-light py-4 mt-4">
    <div class="row mt-4 justify-content-center">
        <div class="col">
            <h5>APLICACION</h5>
        </div>
        <div class="col">
            <input type="text" class="form-control" value="<?= $apps[0]['APLI_NOMBRE'] ?>" readonly>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col">
            <h5>OFICIAL ENCARGADO</h5>
        </div>
        <div class="col">
            <input type="text" class="form-control" value="<?= $nombres[0]['NOMBRE'] ?>" readonly>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <h3>PROBLEMAS REPORTADOS</h3>
            <table class="table table-bordered custom-table mt-2">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col" class="text-center">NO.</th>
                        <th scope="col" class="text-center">PROBLEMA REPORTADO</th>
                        <th scope="col" class="text-center">FECHA DE REPORTE</th>
                        <th scope="col" class="text-center">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($tare) > 0) : ?>
                        <?php foreach ($tare as $key => $tar) : ?>
                            <tr>
                                <td class="text-center"><?= $key + 1 ?></td>
                                <td class="text-center"><?= $tar['FAL_DESCRIPCION'] ?></td>
                                <td class="text-center"><?= $tar['FAL_FECHA'] ?></td>
                                <td class="text-center">
                                    <?php
                                    $estado = "";
                                    $estadoClass = "";
                                    switch ($tar['FAL_ESTADO']) {
                                        case 1:
                                            $estado = "NO ABIERTO";
                                            $estadoClass = "bg-danger";
                                            break;
                                       
                                        case 3:
                                            $estado = "CERRADO";
                                            $estadoClass = "bg-success";
                                            break;
                                    }
                                    ?>
                                    <span class="badge <?= $estadoClass ?>"><?= $estado ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay fallas disponibles</td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-right"><strong>Cantidad de problemas reportados:</strong></td>
                        <td><?= count($tare) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


    


    <?php include_once '../../includes/footer.php' ?>
</body>
