<?php
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ALUMNO') {

    header("Location: ../../index.php");
    exit();
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
    <title>University | Alumno Dashboard</title>
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
                <span>Joao Silva</span>
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
                    <span class="text-zinc-800">
                        Home
                    </span>
                </div>

                <nav>
                    <li class="flex items-center gap-2 text-zinc-800 cursor-pointer" onclick="toggleLogoutMenu()">
                        <!-- Nombre Dinamico -->
                        Joao Silva
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

                                <a href="../../index.php" class="flex items-center gap-2 hover:bg-zinc-200" style="color: #Dc2f19;">
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Dashboard</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Dashboard
                    </p>
                </div>

                <div class="w-200 rounded-sm p-3 bg-white shadow-md">
                    <span class="font-semibold text-zinc-700">Bienvenido</span>
                    <p class="text-zinc-700">Seleciona la accion que quieras realizar en las pestañas del menu de la
                        izquierda</p>
                </div>
            </div>
        </div>

    </div>

    <script src="../../resources/index.js"></script>
</body>

</html>