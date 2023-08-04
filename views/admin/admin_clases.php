<?php
session_start();


if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'ADMIN') {

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
    <link rel="icon" href="../../assets/logo.jpg">
    <link rel="stylesheet" href="../../styles.css">
    <title>University | Admin Clases</title>
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
                <span style="font-size: 20px;">admin</span>
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
                        Administrador
                        <ul class="flex flex-col">
                            <span class="material-symbols-outlined">
                                expand_more
                            </span>
                            <ul id="logout-menu" class="hidden absolute bg-white right-0 mt-6 py-2 rounded shadow">
                                <a href="../../index.php">
                                    <li class="px-4 py-2 text-zinc-700 cursor-pointer hover:bg-zinc-200">Logout</li>
                                </a>
                            </ul>
                    </li>
                    </ul>
                </nav>
            </header>

            <div class="h-full pl-3">
                <div class="w-full flex items-center justify-between pr-3 mt-4 mb-5">
                    <h1 class="font-bold text-zinc-700 text-xl ">Lista de Clases</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> / Clases
                    </p>
                </div>

                <div class="w-full flex items-center justify-between mb-3 pr-3">
                    <span class="font-semibold text-zinc-700">Información de Clases</span>
                    <a href="create_clases.php"><button class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
                            Agregar Clase
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
                                    Clase
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Maestro
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alumnos Inscritos
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="px-6 py-4">
                                    Math 101
                                </td>
                                <td class="px-6 py-4">
                                    John Doe
                                </td>
                                <td class="px-6 py-4">
                                    30
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="edit_clases.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                    <a href="delete_clases.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    2
                                </th>
                                <td class="px-6 py-4">
                                    Science 201
                                </td>
                                <td class="px-6 py-4">
                                    Jane Smith
                                </td>
                                <td class="px-6 py-4">
                                    25
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="edit_clases.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                    <a href="delete_clases.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    3
                                </th>
                                <td class="px-6 py-4">
                                    History 301
                                </td>
                                <td class="px-6 py-4">
                                    Mike Wilson
                                </td>
                                <td class="px-6 py-4">
                                    20
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="edit_clases.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                    <a href="delete_clases.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    4
                                </th>
                                <td class="px-6 py-4">
                                    English 401
                                </td>
                                <td class="px-6 py-4">
                                    Sarah Johnson
                                </td>
                                <td class="px-6 py-4">
                                    15
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="edit_clases.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                    <a href="delete_clases.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    5
                                </th>
                                <td class="px-6 py-4">
                                    Physics 501
                                </td>
                                <td class="px-6 py-4">
                                    Alex Brown
                                </td>
                                <td class="px-6 py-4">
                                    18
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="edit_clases.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                    <a href="delete_clases.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            delete
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="../../resources/index.js"></script>
</body>

</html>