<?php
require_once "../../database/database.php";
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ADMIN') {

    header("Location: ../../index.php");
    exit();
}

$user_id = $_SESSION['id'];

$sql = "SELECT  nombre, apellido FROM usuarios WHERE user_id = '$user_id'";


$result = mysqli_query($conexion, $sql);


if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}


$row = mysqli_fetch_assoc($result);


if ($row) {


    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
} else {
    echo "No se encontraron datos para el usuario con el ID proporcionado.";
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombre = $_POST["nombre"];
    $apellido = $_POST['apellido'];
    $email = $_POST["email"];
    $password = $_POST['password'];
    $direccion = $_POST["direccion"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $materia = $_POST['materia'];
    $rol = "MAESTRO";


    $insertar = "INSERT INTO usuarios ( nombre, apellido, correo_electronico, contrasena, direccion, fecha_nacimiento, rol, materia_asignada) VALUES ( '$nombre', '$apellido', '$email', '$password', '$direccion', '$fecha_nacimiento', '$rol', '$materia')";
    if ($conexion->query($insertar) === TRUE) {

        
        header("Location: admin_maestros.php");
    }


    $conexion->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="../../styles.css">
    <link rel="icon" href="../../assets/logo.jpg">
    <title>University | Admin Create Maestros</title>
</head>

<body>
    <div class="w-screen h-screen flex bg-lightgray">
        <aside class="w-80 h-full bg-dark">
            <div class="flex items-center gap-3 p-5">
                <img class="rounded-full" src="../../assets/logo-aside.jpg" alt="university-logo" width="50px"
                    height="60px">
                <span class="text-white font-medium">Universidad</span>
            </div>

            <div style="width: 100%; height: 1px; background-color: #4c5157; "></div>

            <div class="text-white flex flex-col p-5 gap-3">
                <span style="font-size: 20px;"><?php echo $nombre . ' ' . $apellido; ?></span>
                <span>Administrador</span>
            </div>
            <div style="width: 100%; height: 1px; background-color: #4c5157; "></div>

            <div class="text-white flex flex-col gap-5 p-5">
                <p>Menu Administración</p>

                <div>
                    <a href="admin_permisos.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined ">
                            folder_supervised
                        </span>
                        <span>Permisos</span>
                    </a>
                </div>

                <div>
                    <a href="admin_maestros.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            interactive_space
                        </span>
                        <span>Maestros</span>
                    </a>
                </div>

                <div>
                    <a href="admin_alumnos.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            school
                        </span>

                        <span>Alumnos</span>
                    </a>
                </div>

                <div>
                    <a href="admin_clases.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            tv_gen
                        </span>
                        <span>Clases</span>
                    </a>
                </div>
            </div>
        </aside>
        <div class="w-full flex flex-col">
            <header class="w-full flex items-center justify-between h-10 p-5 bg-white shadow-sm">

                <div class="flex items-center gap-5">
                    <span class="material-symbols-outlined text-zinc-800">
                        menu
                    </span>
                    <a href="admin_dashboard.php"><span class="text-zinc-800 ">
                            Home
                        </span></a>
                </div>

                <nav>
                    <li class="flex items-center gap-2 text-zinc-800 cursor-pointer" onclick="toggleLogoutMenu()">

                        <?php echo $nombre ?>
                        <ul class="flex flex-col">
                            <span class="material-symbols-outlined">
                                expand_more
                            </span>
                            <ul id="logout-menu" class="hidden absolute bg-white right-0 mt-6 py-2 px-4 rounded shadow">

                                <a href="admin_profile.php" class="flex items-center gap-2 hover:bg-zinc-200">
                                    <span class="material-symbols-outlined">
                                        account_circle
                                    </span>
                                    <li class="px-2 py-2 text-zinc-700 cursor-pointer ">Profile</li>
                                </a>

                                <a href="../logout.php" class="flex items-center gap-2 hover:bg-zinc-200"
                                    style="color: #Dc2f19;">
                                    <span class="material-symbols-outlined">
                                        logout
                                    </span>
                                    <li class="px-2 py-2 text-zinc-700 cursor-pointer " style="color: #Dc2f19;">Logout
                                    </li>

                                </a>


                            </ul>
                    </li>
                    </ul>
                </nav>
            </header>

            <div class="h-full pl-3">
                <div class="w-full flex items-center justify-between pr-3 mt-4 mb-5">
                    <h1 class="font-bold text-zinc-700 text-xl ">Agregar Maestro</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Maestros
                    </p>
                </div>

                <div class="w-full">
                    <a href="admin_maestros.php">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                    </a>
                </div>

                <div class="w-full flex flex-row justify-center  mt-20">
                    <div class="w-80 h-auto bg-white rounded-sm sm:w-96">

                        <form action="" method="post" class="flex flex-col p-5 gap-5 text-center relative z-20">

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Correo Electronico</span>
                                <input name="email" type="email" placeholder="Ingresa email"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Contraseña</span>
                                <input name="password" type="password" placeholder="Ingresa email"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Nombre(s)</span>
                                <input name="nombre" type="text" placeholder="Ingresa nombre"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Apellido(s)</span>
                                <input name="apellido" type="text" placeholder="Ingresa apellido"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Dirección</span>
                                <input name="direccion" type="text" placeholder="Ingresa dirección"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Fecha de nacimiento</span>
                                <input name="fecha_nacimiento" type="date"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3">
                            </div>
                            <div class="flex flex-col">


                                <span class="font-bold text-zinc-700 self-start">Clase Asignada</span>

                                <select name="materia" id="materias"
                                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3 mb-5">

                                    <?php
                                    $consulta = "SELECT m.id_materia, m.nombre AS materia
                            FROM materias m
                            LEFT JOIN usuarios u ON m.id_materia = u.materia_asignada
                            WHERE u.materia_asignada IS NULL";
                                    $resultado = $conexion->query($consulta);


                                    if ($resultado->num_rows > 0) {

                                        while ($row = $resultado->fetch_assoc()) {
                                            echo '<option value="' . $row['id_materia'] . '">' . $row['materia'] . '</option>';
                                        }
                                        echo '<option value="0" >Ninguna</option>';
                                    } else {
                                        echo "No hay materias sin profesores asignados.";
                                    }


                                    $conexion->close();
                                    ?>

                                </select>
                            </div>

                            <div style="height: 1px; background-color: #e5e7eb; width: 100% ; "></div>
                            <input type="submit" value="Crear Maestro"
                                class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <script src="../../resources/index.js"></script>
</body>

</html>