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


//----------------------------------------

$alumno_id = $_GET['alumno_id'];
$materia_asignada_id = $_GET['materia_id'];

$consulta_alumno = "SELECT u.matricula, u.nombre, u.apellido, c.calificacion FROM usuarios u 
                    INNER JOIN materias_inscritas mi ON u.user_id = mi.id_alumno 
                    INNER JOIN calificaciones c ON u.user_id = c.id_alumno AND mi.id_materia = c.id_materia 
                    WHERE u.user_id = '$alumno_id' AND mi.id_materia = '$materia_asignada_id'";
$resultado_alumno = $conexion->query($consulta_alumno);

if (!$resultado_alumno) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$alumno = mysqli_fetch_assoc($resultado_alumno);

if ($alumno) {
    $matricula_alumno = $alumno['matricula'];
    $nombre_alumno = $alumno['nombre'];
    $apellido_alumno = $alumno['apellido'];
    $calificacion_actual = $alumno['calificacion'];
} else {
    echo "No se encontraron datos para el alumno con el ID proporcionado.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nueva_calificacion = $_POST["nueva_calificacion"];

    $consulta_actualizar_calificacion = "UPDATE calificaciones SET calificacion = '$nueva_calificacion' 
                                         WHERE id_alumno = '$alumno_id' AND id_materia = '$materia_asignada_id'";

    if ($conexion->query($consulta_actualizar_calificacion) === TRUE) {
        header("Location: maestro_alumnos.php");
        exit;
    } else {
        echo "Error al actualizar la calificación: " . mysqli_error($conexion);
    }
}

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
    <title>University | Maestro Edit Alumnos</title>
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Editar Alumno</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Alumnos
                    </p>
                </div>

                <div class="w-full">
                    <a href="maestro_alumnos.php">
                        <span class="material-symbols-outlined">
                            arrow_back
                        </span>
                    </a>
                </div>

                <div class="w-full flex flex-row justify-center  mt-20">
                    <div class="w-80 h-auto bg-white rounded-sm sm:w-96">

                        <form method="post" class="flex flex-col p-5 gap-5 text-center relative z-20">

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Matrícula</span>
                                <input type="text" value="<?php echo $matricula_alumno; ?>" class="h-10 border border-zinc-300 bg-white rounded-sm px-3" disabled>
                            </div>


                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Calificación Actual</span>
                                <input type="text" value="<?php echo $calificacion_actual; ?>" class="h-10 border border-zinc-300 bg-white rounded-sm px-3" disabled>
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Nueva Calificación</span>
                                <input type="number" step="0.01" min="0" max="100" name="nueva_calificacion" class="h-10 border border-zinc-300 bg-white rounded-sm px-3" required>
                            </div>






                            <div style="height: 1px; background-color: #e5e7eb; width: 100% ; "></div>
                            <input type="submit" value="Guardar cambios" class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
                        </form>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <script src="../../resources/index.js"></script>
</body>

</html>