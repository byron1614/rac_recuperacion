<?php
require '../../modelos/fallas.php';
require '../../modelos/Aplicacion.php';

try {
    $falla = new fallas($_GET);
    $fallas = $falla->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


try {
      
    $app = new Aplicacion($_GET);
    
    $Aplicacion = $app->buscar();
   //var_dump($Aplicacion);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php' ?>
<div class="container">
    <h1 class="text-center">Modificar fallas</h1>
    <div class="row justify-content-center">
        <form action="/rac_recuperacion/controladores/fallas/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="tar_id" id="tar_id" value="<?= $fallas[0]['TAR_ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="aplicacion">Aplicación</label>
                    <select name="tar_app" id="tar_app" class="form-select" required>
                        <?php foreach ($Aplicacion as $app) : ?>
                            <option value="<?= $app['apli_id'] ?>" <?= ($app['apli_nombre'] === $fallas[0]['apli_nombre']) ? 'selected' : '' ?>><?= $app['apli_nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="falla">falla</label>
                    <texfalla name="tar_descripcion" id="tar_descripcion" class="form-control" rows="4" required><?= $fallas[0]['TAR_DESCRIPCION'] ?></texfalla>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="fecha_asignacion">Fecha de Asignación</label>
                    <input type="date" name="tar_fecha" id="tar_fecha" value="<?= $fallas[0]['TAR_FECHA'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Modificar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
