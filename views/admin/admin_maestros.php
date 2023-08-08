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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="stylesheet" href="../../styles.css">
    <link rel="icon" href="../../assets/logo.jpg">

    <title>University | Admin Maestros</title>
</head>

<body>
    <div class="w-screen h-screen flex bg-lightgray">
        <aside class="w-80 h-full bg-dark">
            <div class="flex items-center gap-3 p-5">
                <img class="rounded-full" src="../../assets/logo-aside.jpg" alt="university-logo" width="50px" height="60px">
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
                        <!-- Nombre Dinamico -->
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

                                <a href="../logout.php" class="flex items-center gap-2 hover:bg-zinc-200" style="color: #Dc2f19;">
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Lista de Maestros</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Maestros
                    </p>
                </div>

                <div class="w-full flex items-center justify-between mb-3 pr-3">
                    <span class="font-semibold text-zinc-700">Información de Maestros</span>
                    <a href="create_maestros.php"><button class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
                            Agregar Maestro
                        </button></a>


                </div>

                <div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Dirección
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fec. de Nacimiento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Clase Asignada
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php



                            $consulta = "SELECT u.user_id, u.nombre, u.apellido, u.correo_electronico, u.direccion, u.fecha_nacimiento, m.nombre AS materia_asignada 
                            FROM usuarios u 
                            LEFT JOIN materias m ON u.materia_asignada = m.id_materia 
                            WHERE u.rol = 'MAESTRO'";

                            $resultado = $conexion->query($consulta);


                            if ($resultado->num_rows > 0) {

                                $contador = 1;

                                while ($profesor = $resultado->fetch_assoc()) {
                                    echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   ' . $contador . '
                                    </th> 
                                    <td class="px-6 py-4"> 
                                    ' . $profesor['nombre'] . ' ' . $profesor['apellido'] . '
                                     </td>
                                     <td class="px-6 py-4">
                                     ' . $profesor['correo_electronico'] . '
                                     </td>
                                     <td class="px-6 py-4" >
                                     ' . $profesor['direccion'] . '
                                     </td>
                                     <td class="px-6 py-4">
                                     ' . $profesor['fecha_nacimiento'] . '
                                     </td>
                                     <td class="px-6 py-4">
                                     ' . $profesor['materia_asignada'] . '
                                     </td>
                                     <td class="px-6 py-4 flex gap-5 items-center">
                                     <a href="edit_maestros.php?id=' . $profesor['user_id'] . ' " class="font-medium text-blue-600 dark:text-blue-500 ">
                                     <span class="material-symbols-outlined">
                                     edit_square
                                     </span>
                                     </a>
                                     <a href="delete_maestros.php?id=' . $profesor['user_id'] . ' " class="font-medium">
                                     <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                     delete
                                     </span>
                                     </a>

                                     </td>

                                     </tr>';

                                    $contador++;
                                }

                                echo '</table>';
                            } else {
                                echo "No hay profesores registrados.";
                            }


                            $conexion->close();
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="../../resources/index.js"></script>
</body>

</html>