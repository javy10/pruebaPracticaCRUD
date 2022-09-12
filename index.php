<?php

  session_start();

  if($_POST) {

    $mensaje = "Datos incorrectos...";

    if($_POST['email'] == 'javier@gmail.com' && $_POST['password'] == '1234') {
      $_SESSION['email'] = $_POST['email'];
      header('location: secciones/index.php');
    }
  }
?>

<!doctype html>
<html lang="en">

<head>
  <title>Prueba Practica</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <br>
        <form action="" method="post">
          <div class="card">
            <div class="card-header">
              Inicio de sesion
            </div>
            <div class="card-body">

              <?php if(isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                  <strong><?php echo $mensaje; ?></strong>
                </div>
              <?php } ?>
              
              <div class="mb-3">
                <label for="" class="form-label">Correo Electrónico</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
                <small id="helpId" class="form-text text-muted">Escriba su email</small>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">
                <small id="helpId" class="form-text text-muted">Escriba su Password</small>
              </div>
              <button type="submit" class="btn btn-primary">Iniciar sesion</button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
</body>

</html>