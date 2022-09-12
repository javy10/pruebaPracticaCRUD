<?php

include_once '../configuraciones/db.php';
$conexionBD = BD::crearInstancia();

// para asociados
$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : '';
$fechaNac = isset($_POST['fechaNac']) ? $_POST['fechaNac'] : '';
$dui = isset($_POST['dui']) ? $_POST['dui'] : '';
$nit = isset($_POST['nit']) ? $_POST['nit'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$profesion_id = isset($_POST['profesiones']) ? $_POST['profesiones'] : '';
$agencia_id = isset($_POST['agencias']) ? $_POST['agencias'] : '';

// para el historial
$label_nombre = isset($_POST['label_nombre']) ? $_POST['label_nombre'] : '';
$label_apellido = isset($_POST['label_apellido']) ? $_POST['label_apellido'] : '';
$label_direccion = isset($_POST['label_direccion']) ? $_POST['label_direccion'] : '';
$label_fecha = isset($_POST['label_fecha']) ? $_POST['label_fecha'] : '';
$label_telefono = isset($_POST['label_telefono']) ? $_POST['label_telefono'] : '';

$profesiones = isset($_POST['profesiones']) ? $_POST['profesiones'] : '';
$agencias = isset($_POST['agencias']) ? $_POST['agencias'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

$fechaReg = date('d/m/Y');




if ($accion != '') {

    switch ($accion) {
        case 'agregar':

            $query = "SELECT dui, nit from asociados WHERE dui=:dui and nit = :nit";
            $consulta = $conexionBD->prepare($query);
            $consulta->bindParam(':dui', $dui);
            $consulta->bindParam(':nit', $nit);
            $consulta->execute();
            $datosAnteriores = $consulta->fetch(PDO::FETCH_ASSOC);
            $Antdui = $datosAnteriores['dui'];
            $Antnit = $datosAnteriores['nit'];

            if ($Antdui == $dui || $antnit == $nit) {
                echo "El dui o nit ya estan registrados";
            } else {

                $sql = "INSERT INTO asociados (nombres, apellidos, direccion, fechaNac, dui, nit, telefono, fechaReg, profesion_id, agencia_id) 
                    VALUES (:nombres, :apellidos, :direccion, :fechaNac, :dui, :nit, :telefono, :fechaReg, :profesion_id, :agencia_id)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':nombres', $nombres);
                $consulta->bindParam(':apellidos', $apellidos);
                $consulta->bindParam(':direccion', $direccion);
                $consulta->bindParam(':fechaNac', $fechaNac);
                $consulta->bindParam(':dui', $dui);
                $consulta->bindParam(':nit', $nit);
                $consulta->bindParam(':telefono', $telefono);
                $consulta->bindParam(':fechaReg', $fechaReg);
                $consulta->bindParam(':profesion_id', $profesion_id);
                $consulta->bindParam(':agencia_id', $agencia_id);
                $consulta->execute();
                // header("Location: vista_asociados.php");
                break;
            }

        case 'Seleccionar':
            $sql = "SELECT * FROM asociados WHERE id = :id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $asociados = $consulta->fetch(PDO::FETCH_ASSOC);

            $nombres = $asociados['nombres'];
            $apellidos = $asociados['apellidos'];
            $direccion = $asociados['direccion'];
            $fechaNac = $asociados['fechaNac'];
            $dui = $asociados['dui'];
            $nit = $asociados['nit'];
            $telefono = $asociados['telefono'];

            $profesion_id = $asociados['profesion_id'];
            $agencia_id = $asociados['agencia_id'];

            //seleccionar la profesion del asociado
            $sql = "select p.id from profesiones as p inner join asociados as a on p.id=a.profesion_id where a.id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $asociadosProfesion = $consulta->fetchAll(PDO::FETCH_ASSOC);

            //seleccionar la agencia del asociado
            $sql = "select ag.id from agencias as ag inner join asociados as a on ag.id=a.agencia_id where a.id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $asociadosAgencia = $consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach ($asociadosProfesion as $profesion) {
                $arregloProfesiones[] = $profesion['id'];
            }
            foreach ($asociadosAgencia as $agencia) {
                $arregloAgencias[] = $agencia['id'];
            }
            break;

        case 'eliminar':

            $sql = "DELETE FROM asociados WHERE id = :id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;

        case 'editar':
            $sql = "UPDATE asociados SET nombres = :nombres, apellidos = :apellidos, direccion = :direccion, fechaNac = :fechaNac, telefono = :telefono, profesion_id = :profesion_id, agencia_id = :agencia_id WHERE id = :id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombres', $nombres);
            $consulta->bindParam(':apellidos', $apellidos);
            $consulta->bindParam(':direccion', $direccion);
            $consulta->bindParam(':fechaNac', $fechaNac);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':profesion_id', $profesion_id);
            $consulta->bindParam(':agencia_id', $agencia_id);
            $consulta->execute();
            header("Location: vista_asociados.php");

            // insertando en la tabla de historial
            // $sql = "INSERT INTO historialasociados (campoModificado, asociado_id, nuevoValor, usuario_id, fecha) 
            //         VALUES (:label_nombre,)";
            // $consulta = $conexionBD->prepare($sql);
            // $consulta->bindParam(':nombres', $nombres);
            // $consulta->bindParam(':apellidos', $apellidos);
            // $consulta->bindParam(':direccion', $direccion);
            // $consulta->bindParam(':fechaNac', $fechaNac);
            // $consulta->bindParam(':dui', $dui);
            // $consulta->bindParam(':nit', $nit);
            // $consulta->bindParam(':telefono', $telefono);
            // $consulta->bindParam(':fechaReg', $fechaReg);
            // $consulta->bindParam(':profesion_id', $profesion_id);
            // $consulta->bindParam(':agencia_id', $agencia_id);
            // $consulta->execute();
            // header("Location: lista_asociados.php");

            break;
    }
}



// metodo select para obtener los datos
$sql = "SELECT * FROM asociados";
$listaAsociados = $conexionBD->query($sql);
$asociados = $listaAsociados->fetchAll();

//$sql = "CALL listadoAsociados()";
$sql = "select a.id, a.nombres, a.apellidos, a.direccion, a.fechaNac, a.dui, a.nit, a.telefono, a.fechaReg, p.nombre as Profesiones, ag.nombre as Agencias from asociados as a inner join profesiones as p on a.profesion_id=p.id inner join agencias as ag on a.agencia_id=ag.id";
$listadoAsociados = $conexionBD->query($sql);
$asociadosListado = $listadoAsociados->fetchAll();
//$asociadosListado = $listadoAsociados->setFetchMode(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM profesiones";
$listaProfesiones = $conexionBD->query($sql);
$profesiones = $listaProfesiones->fetchAll();

$sql = "SELECT * FROM agencias";
$listaAgencias = $conexionBD->query($sql);
$agencias = $listaAgencias->fetchAll();
