<?php

require_once "database/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];



        $sql = "SELECT user_id, rol, correo_electronico, nombre, apellido, direccion, fecha_nacimiento FROM usuarios WHERE correo_electronico = ? AND contrasena = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $stmt->store_result();


        if ($stmt->num_rows == 1) {

            $stmt->bind_result($id, $rol, $correo_electronico, $nombre, $apellido, $direccion, $fecha_nacimiento);
            $stmt->fetch();
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['rol'] = $rol;
            $_SESSION['correo_electronico'] = $correo_electronico;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['direccion'] = $direccion;
            $_SESSION['fecha_nacimiento'] = $fecha_nacimiento;



            switch ($rol) {
                case 'ADMIN':
                    header('Location: views/admin/admin_dashboard.php');
                    break;
                case 'MAESTRO':
                    header('Location: views/maestro/maestro_dashboard.php');
                    break;
                case 'ALUMNO':
                    header('Location: views/alumno/alumno_dashboard.php');
                    break;
                default:
                    echo "Rol inválido";
                    break;
            }
        } else {
            echo "Credenciales inválidas";
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.jpg">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 1,
                'wght' 400,
                'GRAD' 0,
                'opsz' 48
        }
    </style>


    <title>University | Final Project 3 | By David Carreño</title>

</head>

<body>
    <div class="w-screen h-screen flex flex-col items-center bg-light">
        <div>
            <img src="assets/logo.jpg" alt="university-logo" width="300px">
        </div>

        <div class="w-80 h-60 bg-white rounded-sm sm:w-96">
            <form action="index.php" method="post" class="flex flex-col p-5 gap-5 text-center relative z-20">

                <span class="text-zinc-600">Bienvenido Ingresa con tu cuenta</span>
                <input name="email" type="email" placeholder="Email" class="h-10 border border-zinc-300 bg-white rounded-sm px-3" required><span class="material-symbols-outlined absolute z-10 mt-13 self-end mr-5 text-zinc-500">
                    mail
                </span>
                <input name="password" type="password" placeholder="Password" class="h-10 border border-zinc-300 bg-white rounded-sm px-3" required><span class="material-symbols-outlined absolute z-10 mt-28 self-end mr-5 text-zinc-500">
                    lock
                </span>
                <input type="submit" value="Ingresar" class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
            </form>
        </div>
    </div>
</body>

</html>