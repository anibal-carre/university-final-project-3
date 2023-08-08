<?php
require_once '../../database/database.php';
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ADMIN') {

    header("Location: ../../index.php");
    exit();
}

if (isset($_GET['id'])) {
    $maestro_id = $_GET['id'];

    $maestro_id = $conexion->real_escape_string($maestro_id);


    $eliminar = "DELETE FROM usuarios WHERE user_id = '$maestro_id' AND rol = 'MAESTRO'";
    if ($conexion->query($eliminar) === TRUE) {

        header("Location: admin_maestros.php");
        exit();
    } else {
        echo "Error al eliminar el alumno ";
    }


    $conexion->close();
}
