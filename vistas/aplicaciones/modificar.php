<?php
require '../../modelos/Aplicacion.php';
    try {
      
        $aplicacion = new Aplicacion($_GET);
        
        $app = $aplicacion->buscar();
        //var_dump($app);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar aplicacion</h1>
        <div class="row justify-content-center">
            <form action="/rac_recuperacion/controladores/aplicacion/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="apli_id" value="<?= $app[0]['APLI_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Nombre de la aplicacion</label>
                        <input type="text" name="apli_nombre" id="apli_nombre" value="<?= $app[0]['APLI_NOMBRE'] ?>" class="form-control" required>
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
<?php include_once '../../includes/footer.php'?>