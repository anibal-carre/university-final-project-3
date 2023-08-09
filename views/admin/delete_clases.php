<?php
require_once '../../database/database.php';
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ADMIN') {

    header("Location: ../../index.php");
    exit();
}


if (isset($_GET['id'])) {
    $id_materia = $_GET['id'];

    $consulta_profesor = "SELECT materia_asignada FROM usuarios WHERE materia_asignada = $id_materia AND rol = 'MAESTRO'";
    $resultado_profesor = $conexion->query($consulta_profesor);

    if ($resultado_profesor->num_rows > 0) {

        $consulta_desasignar = "UPDATE usuarios SET materia_asignada = NULL WHERE materia_asignada = $id_materia AND rol = 'MAESTRO'";
        if (!$conexion->query($consulta_desasignar)) {

            exit();
        }
    }

    $consulta_alumnos_asignados = "SELECT COUNT(*) as total FROM materias_inscritas WHERE id_materia = $id_materia";
    $resultado_alumnos_asignados = $conexion->query($consulta_alumnos_asignados);
    $row = $resultado_alumnos_asignados->fetch_assoc();
    $total_alumnos = $row['total'];

    if ($total_alumnos > 0) {

        header("Location: admin_clases.php");
        exit();
    }


    $consulta_profesor_asignado = "SELECT materia_asignada FROM usuarios WHERE materia_asignada = $id_materia AND rol = 'MAESTRO'";
    $resultado_profesor_asignado = $conexion->query($consulta_profesor_asignado);

    if ($resultado_profesor_asignado->num_rows > 0) {

        header("Location: admin_clases.php");
        exit();
    }


    $consulta_eliminar = "DELETE FROM materias WHERE id_materia = $id_materia";

    if ($conexion->query($consulta_eliminar) === TRUE) {

        header("Location: admin_clases.php");
    } else {

        header("Location: admin_clases.php");
    }
}
