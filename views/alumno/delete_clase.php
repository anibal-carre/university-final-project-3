<?php
require_once "../../database/database.php";
session_start();

if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ALUMNO') {
    header("Location: ../../index.php");
    exit();
}

$user_id = $_SESSION['id'];

if (isset($_GET['id'])) {
    $materia_id = $_GET['id'];

    $conexion->query("DELETE FROM materias_inscritas WHERE id_alumno = '$user_id' AND id_materia = '$materia_id'");
    $conexion->query("DELETE FROM calificaciones WHERE id_alumno = '$user_id' AND id_materia = '$materia_id'");


    $consulta_materias_inscritas = "SELECT id_materia FROM materias_inscritas WHERE id_alumno = '$user_id'";
    $resultado_materias_inscritas = $conexion->query($consulta_materias_inscritas);
    $materias_inscritas = [];
    while ($row = $resultado_materias_inscritas->fetch_assoc()) {
        $materias_inscritas[] = $row['id_materia'];
    }
    $nuevas_materias_inscritas = implode(",", $materias_inscritas);
    $conexion->query("UPDATE usuarios SET materias_inscritas = '$nuevas_materias_inscritas' WHERE user_id = '$user_id'");

    header("Location: alumno_clases.php");
}

$conexion->close();
