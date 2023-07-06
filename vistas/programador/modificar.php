<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>

<?php
require '../../modelos/Programadores.php';


try {
    $falla = new Programadores($_GET);
 
    $Programadores = $falla->buscar2();
   

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


?>


<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario para modificar el Programador</h1>
    <div class="row justify-content-center mt-2">
        <form action="/rac_recuperacion/controladores/programadores/modificar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="prog_nombre" class="fs-5">Nombres:</label>
                <input type="hidden" class="form-control" name="proga_id" id="proga_id" value="<?= $Programadores[0]['PROGA_ID'] ?? '' ?>" required>
                <input type="text" class="form-control" name="proga_nombres" id="proga_nombres" value="<?= $Programadores[0]['PROGA_NOMBRES'] ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="proga_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="proga_apellidos" id="proga_apellidos" value="<?= $Programadores[0]['PROGA_APELLIDOS']  ?? '' ?>" required>
            </div>
           
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php' ?>
