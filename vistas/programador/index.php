<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<?php


?>
<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario del Registro de Programadores</h1>
    <div class="row justify-content-center mt-2">
        <form action="/rac_recuperacion/controladores/programadores/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="prog_nombre" class="fs-5">Nombres:</label>
                <input type="text" class="form-control" name="proga_nombres" id="proga_nombres" required>
            </div>
            <div class="form-group mb-3">
                <label for="proga_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="proga_apellidos" id="proga_apellidos" required>
            </div>
        
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
