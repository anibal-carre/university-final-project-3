<?php
require_once "../../database/database.php";
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'MAESTRO') {

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


$consulta_maestro = "SELECT u.nombre, u.apellido, m.nombre AS materia_asignada 
                     FROM usuarios u 
                     INNER JOIN materias m ON u.materia_asignada = m.id_materia 
                     WHERE u.user_id = '$user_id'";

$resultado_maestro = $conexion->query($consulta_maestro);

if (!$resultado_maestro) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$maestro = mysqli_fetch_assoc($resultado_maestro);

$materia_asignada_nombre = $maestro['materia_asignada'];

$materia_asignada_id = 0;

$consulta_materia = "SELECT id_materia FROM materias WHERE nombre = '$materia_asignada_nombre'";
$resultado_materia = $conexion->query($consulta_materia);

if ($resultado_materia->num_rows == 1) {
    $row = $resultado_materia->fetch_assoc();
    $materia_asignada_id = $row['id_materia'];
}

$consulta_alumnos = "SELECT u.user_id AS id_alumno, u.nombre, u.apellido, c.calificacion FROM usuarios u 
                     INNER JOIN materias_inscritas mi ON u.user_id = mi.id_alumno 
                     INNER JOIN calificaciones c ON u.user_id = c.id_alumno AND mi.id_materia = c.id_materia 
                     WHERE mi.id_materia = '$materia_asignada_id'";
$resultado_alumnos = $conexion->query($consulta_alumnos);

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
    <title>University | Maestro Alumnos</title>
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
                <span style="font-size: 20px;">Maestro</span>
                <span><?php echo $nombre . " " . $apellido ?></span>
            </div>
            <div style="width: 100%; height: 1px; background-color: #4c5157; "></div>

            <div class="text-white flex flex-col gap-5 p-5">
                <p>Menu Maestros</p>


                <div>
                    <a href="maestro_alumnos.php" class="flex items-center gap-3 ">
                        <span class="material-symbols-outlined">
                            school
                        </span>

                        <span>Alumnos</span>
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
                    <a href="maestro_dashboard.php">
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

                                <a href="maestro_profile.php" class="flex items-center gap-2 hover:bg-zinc-200">
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Información de la Clase de
                        <?php echo $materia_asignada_nombre; ?></h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Alumnos
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
                                    Nombre de Alumno
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Calificación
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultado_alumnos->num_rows > 0) {
                                $contador = 1;
                                while ($alumno = $resultado_alumnos->fetch_assoc()) {
                                    echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">';
                                    echo '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $contador . '</td>';
                                    echo '<td class="px-6 py-4">' . $alumno['nombre'] . ' ' . $alumno['apellido'] . '</td>';
                                    echo '<td class="px-6 py-4">' . $alumno['calificacion'] . '</td>';
                                    echo '<td class="px-6 py-4 flex gap-5 items-center">';
                                    echo '<a href="maestro_edit.php?alumno_id=' . $alumno["id_alumno"] . '&amp;materia_id=' . $materia_asignada_id . '"
                                    class="font-medium text-blue-600 dark:text-blue-500">';
                                    echo '<span class="material-symbols-outlined">edit_square</span>';
                                    echo '</a>';
                                    echo '</td>';
                                    echo '</tr>';
                                    $contador++;
                                }
                            } else {
                                echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">';
                                echo '<td colspan="4" class="px-6 py-4 text-center text-gray-600 dark:text-white">No hay
                                    alumnos inscritos en esta materia.</td>';
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