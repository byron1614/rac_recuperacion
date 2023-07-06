<?php
require '../../modelos/fallas.php';
require '../../modelos/Aplicacion.php';

try {
    $falla = new fallas($_GET);
    $fallas = $falla->buscar1();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


try {
      
    $app = new Aplicacion($_GET);
    
    $Aplicacion = $app->buscar();

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
            <input type="hidden" name="fal_id" id="fal_id" value="<?= $fallas[0]['FAL_ID'] ?>">
            <div class="row mb-3">
                <div class="col">
                    <label for="aplicacion">Aplicación</label>
                    <select name="fal_apli" id="fal_apli" class="form-select" required>
                        <?php foreach ($Aplicacion as $app) : ?>
                            <option value="<?= $app['APLI_ID'] ?>" <?= ($app['APLI_NOMBRE'] === $fallas[0]['APLI_NOMBRE']) ? 'selected' : '' ?>><?= $app['APLI_NOMBRE'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="falla">falla</label>
                    <textarea name="fal_descripcion" id="fal_descripcion" class="form-control" rows="4" required><?= $fallas[0]['FAL_DESCRIPCION'] ?></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="fecha_asignacion">Fecha de Asignación</label>
                    <input type="date" name="fal_fecha" id="fal_fecha" value="<?= $fallas[0]['FAL_FECHA'] ?>" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
            <div class="col">
    <label for="aplicacion">Aplicación</label>
    <select name="fal_estado" id="fal_estado" class="form-select" required>
        <option value="1" <?= ($app['APLI_ESTADO'] == 1) ? 'selected' : '' ?>>NO ABIERTO</option>
        <option value="3" <?= ($app['APLI_ESTADO'] == 3) ? 'selected' : '' ?>>CERRADO</option>
    </select>
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