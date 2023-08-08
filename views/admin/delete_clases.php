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
        // Desasignar la materia al profesor
        $consulta_desasignar = "UPDATE usuarios SET materia_asignada = NULL WHERE materia_asignada = $id_materia AND rol = 'MAESTRO'";
        if (!$conexion->query($consulta_desasignar)) {
            echo "Error al desasignar la materia del profesor";
            exit();
        }
    }

    $consulta_alumnos_asignados = "SELECT COUNT(*) as total FROM materias_inscritas WHERE id_materia = $id_materia";
    $resultado_alumnos_asignados = $conexion->query($consulta_alumnos_asignados);
    $row = $resultado_alumnos_asignados->fetch_assoc();
    $total_alumnos = $row['total'];

    if ($total_alumnos > 0) {
        echo "No se puede eliminar la materia. Tiene alumnos asignados.";
        header("Location: admin_clases.php");
        exit();
    }

    // Verificar si la materia tiene profesor asignado
    $consulta_profesor_asignado = "SELECT materia_asignada FROM usuarios WHERE materia_asignada = $id_materia AND rol = 'MAESTRO'";
    $resultado_profesor_asignado = $conexion->query($consulta_profesor_asignado);

    if ($resultado_profesor_asignado->num_rows > 0) {
        echo "No se puede eliminar la materia. Tiene un profesor asignado.";
        header("Location: admin_clases.php");
        exit();
    }

    // Eliminar la materia
    $consulta_eliminar = "DELETE FROM materias WHERE id_materia = $id_materia";

    if ($conexion->query($consulta_eliminar) === TRUE) {
        echo "Materia eliminada exitosamente.";
        header("Location: admin_clases.php");
    } else {
        echo "Error al eliminar la materia: ";
        header("Location: admin_clases.php");
    }
}
