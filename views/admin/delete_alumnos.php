<?php
require_once '../../database/database.php';
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ADMIN') {

    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $alumno_id = $_GET['id'];




    $alumno_id = $conexion->real_escape_string($alumno_id);


    $eliminar = "DELETE FROM usuarios WHERE user_id = '$alumno_id' AND rol = 'ALUMNO'";
    if ($conexion->query($eliminar) === TRUE) {

        header("Location: admin_alumnos.php");
        exit();
    } else {
        echo "Error al eliminar el alumno ";
    }


    $conexion->close();
}
