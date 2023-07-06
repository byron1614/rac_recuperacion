<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/Aplicacion.php';
    try {
      
        $app = new Aplicacion($_GET);
        
        $Aplicacion = $app->buscar();
      
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE fallas</h1>
  <div class="row justify-content-center mt-2">
    <form action="/rac_recuperacion/controladores/fallas/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="aplicacion">Seleccione una aplicación:</label>
        <select class="form-select" name="fal_apli" id="fal_apli" required>
          <option value="">Seleccionar aplicación</option>
          <?php foreach ($Aplicacion as $apps) { ?>
            <option value="<?php echo $apps['APLI_ID']; ?>"><?php echo $apps['APLI_NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>
 
      <div class="form-group">
        <label for="descripcion">Descripción de la falla:</label>
        <textarea class="form-control" name="fal_descripcion" id="fal_descripcion" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="fecha">Fecha de asignacion</label>
        <input type="date" class="form-control" name="fal_fecha" id="fal_fecha" required>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../../includes/footer.php'?>