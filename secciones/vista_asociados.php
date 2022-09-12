<?php include('header.php'); ?>
<?php include('asociados.php'); ?>


<h1>Control de Asociados</h1>

<div class="col-md-3">
    <!-- <div id="liveAlertPlaceholder"></div>
    <button type="button" class="btn btn-primary" id="liveAlertBtn">Mostrar alerta en vivo</button> -->
    <form action="" method="post" class="needs-validation" novalidate>

        <div class="card">
            <div class="card-header">
                Asociados
            </div>
            <div class="card-body">
                <div class="mb-3 d-none">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo $id ?>" aria-describedby="helpId">
                </div>
                <div class="mb-5 position-relative">
                    <input type='hidden' name='label_nombre' value='Nombres' />
                    <label for="" class="form-label">Nombres</label>
                    <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $nombres ?>" aria-describedby="helpId" placeholder="Nombre del asociado" required pattern="[A-Za-z ]+">
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner el nombre y solo letras
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <input type='hidden' name='label_apellido' value='Apellidos' />
                    <label for="" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" aria-describedby="helpId" placeholder="Apellidos del asociado" required pattern="[A-Za-z ]+">
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner el apellido y solo letras
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <input type='hidden' name='label_direccion' value='Direccion' />
                    <label for="" class="form-label">Dirección</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $direccion ?>" aria-describedby="helpId" placeholder="Dirección del asociado" required>
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner la direccion
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <input type='hidden' name='label_fecha' value='Fecha de nacimiento' />
                    <label for="" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac ?>" aria-describedby="helpId" required>
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner la fecha de nacimiento
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <label for="" class="form-label">DUI</label>
                    <input type="text" class="form-control" name="dui" id="dui" value="<?php echo $dui ?>" aria-describedby="helpId" placeholder="Dui del asociado" required pattern="[0-9-]{10,10}">
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner el dui
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <label for="" class="form-label">NIT</label>
                    <input type="text" class="form-control" name="nit" id="nit" value="<?php echo $nit ?>" aria-describedby="helpId" placeholder="Nit del asociado" required pattern="[0-9-]{17,17}">
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner el nit
                    </div>
                </div>
                <div class="mb-5 position-relative">
                    <input type='hidden' name='label_telefono' value='Telefono' />
                    <label for="" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono ?>" aria-describedby="helpId" placeholder="Teléfono del asociado" required pattern="[0-9-]{9,9}">
                    <div class="valid-tooltip">
                        Todo correcto
                    </div>
                    <div class="invalid-tooltip">
                        Es necesario poner el telefono
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Profesión</label>

                    <select class="form-control" name="profesiones" id="listaProfesiones">

                        <?php foreach ($profesiones as $profesion) { ?>
                            <option <?php
                                    if (!empty($arregloProfesiones)) :
                                        if (in_array($profesion['id'], $arregloProfesiones)) :
                                            echo 'selected';
                                        endif;
                                    endif;
                                    ?> value="<?php echo $profesion['id']; ?>">
                                <?php echo $profesion['id']; ?> - <?php echo $profesion['nombre']; ?>
                            </option>
                        <?php } ?>

                    </select>

                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Agencia</label>

                    <select class="form-control" name="agencias" id="listaAgencias">

                        <?php foreach ($agencias as $agencia) { ?>
                            <option <?php
                                    if (!empty($arregloAgencias)) :
                                        if (in_array($agencia['id'], $arregloAgencias)) :
                                            echo 'selected';
                                        endif;
                                    endif;
                                    ?> value="<?php echo $agencia['id']; ?>">
                                <?php echo $agencia['id']; ?> - <?php echo $agencia['nombre']; ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" name="accion" value="agregar" class="btn btn-success" onclick="guardar()">Agregar</button>
                    <!-- <button type="submit" class="btn btn-info" id="edit" onclick="edicion()">Edicion</button> -->
                    <button type="submit" name="accion" value="editar" class="btn btn-warning" onclick="editar()">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-md-9">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Fecha Nacimiento</th>
                    <th scope="col">DUI</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Fecha Registro</th>
                    <th scope="col">Profesion</th>
                    <th scope="col">Agencia</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($asociadosListado as $asociado) : ?>
                    <tr>
                        <td><?php echo $asociado['id']; ?></td>
                        <td>
                            <?php echo $asociado['nombres']; ?> <?php echo $asociado['apellidos']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['direccion']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['fechaNac']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['dui']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['nit']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['telefono']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['fechaReg']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['Profesiones']; ?>
                        </td>
                        <td>
                            <?php echo $asociado['Agencias']; ?>
                        </td>
                        <td>

                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $asociado['id'] ?>" />

                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info" onclick="ocultar()" />
                                <input type="submit" value="eliminar" name="accion" id="liveAlertBtn" class="btn btn-danger" onclick="eliminar()" />

                                <!-- <a class="btn btn-sm btn-danger" id="delete_registro" data-id="<?php echo $asociado['id'] ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash"></i>Eliminar</a> -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#listaProfesiones');
    new TomSelect('#listaAgencias');
</script>

<script>
    (function() {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

    function ocultar() {
        document.getElementById('guardar').style.display = 'none';
    }

    // sweet alert
    function eliminar() {
        swal("Exito!", "Registro Eliminad!", "info");
    }

    function guardar() {
        swal("Exito!", "Registro Guardado!", "success");
    }

    function editar() {
        swal("Exito!", "Registro Aztualizado!", "info");
    }

    // eliminar con sweet alert
    // $(document).ready(function() {
    //     $(document).on('click', '#delete_registro', function(e) {
    //         var id = $(this).data('id');
    //         Delete(id);
    //         e.preventDefault();
    //     });
    // });

    // function Delete(id) {

    //     swal({
    //         title: 'Estas seguro?',
    //         text: "Se borrará de forma permanente!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Si, bórralo!',
    //         showLoaderOnConfirm: true,

    //         preConfirm: function() {
    //             return new Promise(function(resolve) {

    //                 $.ajax({
    //                         url: 'eliminar.php',
    //                         type: 'POST',
    //                         data: 'delete=' + id,
    //                         dataType: 'json'
    //                     })
    //                     .done(function(response) {
    //                         swal('Eliminado!', response.message, response.status);

    //                     })
    //                     .fail(function() {
    //                         swal('Oops...', 'Algo salió mal con ajax !', 'error');
    //                     });
    //             });
    //         },
    //         allowOutsideClick: false
    //     });
    // }
</script>

<?php include('footer.php'); ?>