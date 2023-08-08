<?php
require_once "../../database/database.php";
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ALUMNO') {

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




//----------------------------------------------
$sql = "SELECT nombre, apellido FROM usuarios WHERE user_id = '$user_id'";
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

$consulta_materias = "SELECT m.nombre AS nombre_materia, c.calificacion FROM materias_inscritas mi 
                     INNER JOIN calificaciones c ON mi.id_alumno = c.id_alumno AND mi.id_materia = c.id_materia
                     INNER JOIN materias m ON mi.id_materia = m.id_materia
                     WHERE mi.id_alumno = '$user_id'";

$resultado_materias = $conexion->query($consulta_materias);

$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />
    <link rel="icon" href="../../assets/logo.jpg">
    <link rel="stylesheet" href="../../styles.css">
    <title>University | Alumno Calificaciones</title>
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
                <span style="font-size: 20px;">Alumno</span>
                <!-- Nombre Dinamico -->
                <span><?php echo $nombre . " " . $apellido ?></span>
            </div>
            <div style="width: 100%; height: 1px; background-color: #4c5157; "></div>

            <div class="text-white flex flex-col gap-5 p-5">
                <p>Menu Alumno</p>


                <div>
                    <a href="alumno_calificaciones.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            task
                        </span>

                        <span>Ver Calificaciones</span>
                    </a>
                </div>

                <div>
                    <a href="alumno_clases.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            tv_gen
                        </span>

                        <span>Administra tus Clases</span>
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
                    <a href="alumno_dashboard.php">
                        <span class="text-zinc-800">
                            Home
                        </span>
                    </a>
                </div>

                <nav>
                    <li class="flex items-center gap-2 text-zinc-800 cursor-pointer" onclick="toggleLogoutMenu()">

                        <?php echo $nombre ?>
                        <ul class="flex flex-col">
                            <span class="material-symbols-outlined">
                                expand_more
                            </span>
                            <ul id="logout-menu" class="hidden absolute bg-white right-0 mt-6 py-2 px-4 rounded shadow">

                                <a href="alumno_profile.php" class="flex items-center gap-2 hover:bg-zinc-200">
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Calificaciones</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> /
                        Calificaciones
                    </p>
                </div>



                <div>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre de Clase
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Calificación
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                            if ($resultado_materias->num_rows > 0) {
                                $contador = 1;
                                while ($materia = $resultado_materias->fetch_assoc()) {
                                    echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">';
                                    echo '<td class="px-6 py-4">' . $contador . '</td>';
                                    echo '<td class="px-6 py-4">' . $materia['nombre_materia'] . '</td>';
                                    echo '<td class="px-6 py-4">' . $materia['calificacion'] . '</td>';
                                    echo '</tr>';

                                    $contador++;
                                }
                            } else {
                                echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">';
                                echo '<td colspan="2" class="px-6 py-4 text-center text-gray-600 dark:text-white">No tienes calificaciones registradas.</td>';
                                echo '</tr>';
                            }
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