<?php include('header.php'); ?>
<?php include('asociados.php'); ?>

<div class="col-md-12">
    <a class="btn btn-primary" href="vista_asociados.php">Agregar Asociado</a>
    <!-- <a type="submit" name="accion" value="agregar" class="btn btn-success">Agregar Asociado</a> -->
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
                            <!-- <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $asociado['id'] ?>" />
                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info" />
                            </form> -->
                            <div class="text-center">
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $asociado['id'] ?>" />
                                    <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-pen-to-square" style="color: blue"></i></a>
                                    <a href="" type="submit" name="accion" value="eliminar"><i class="fa-solid fa-trash" style="color: red"></i></a>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title center" id="exampleModalLabel">Edicion de Asociados</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="card">
                        <!-- <div class="card-header">
                            Asociados
                        </div> -->
                        <div class="card-body">
                            <div class="mb-3 d-none">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $id ?>" aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $nombres ?>" aria-describedby="helpId" placeholder="Nombre del asociado">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" aria-describedby="helpId" placeholder="Apellidos del asociado">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $direccion ?>" aria-describedby="helpId" placeholder="Dirección del asociado">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="<?php echo $fechaNac ?>" aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">DUI</label>
                                <input type="text" class="form-control" name="dui" id="dui" value="<?php echo $dui ?>" aria-describedby="helpId" placeholder="Dui del asociado">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">NIT</label>
                                <input type="text" class="form-control" name="nit" id="nit" value="<?php echo $nit ?>" aria-describedby="helpId" placeholder="Nit del asociado">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $telefono ?>" aria-describedby="helpId" placeholder="Teléfono del asociado">
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

                            <!-- <div class="text-center">
                                <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
                                <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
                                <button type="submit" name="accion" value="eliminar" class="btn btn-danger">Eliminar</button>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Editar registro</button>
            </div>
        </div>
    </div>
</div>

<!-- Fin Modal -->






<?php include('footer.php'); ?>