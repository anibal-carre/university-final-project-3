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
    <link rel="icon" href="../../assets/logo.jpg">
    <link rel="stylesheet" href="../../styles.css">
    <title>University | Alumno Clases</title>
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
                    <a href="alumno_dashboard.php"><span class="text-zinc-800 ">
                            Home
                        </span></a>
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Esquema de Clases</h1>
                    <p class="font-semibold text-sm text-zinc-700"><span class="text-myblue">Home</span> /
                        Clases
                    </p>
                </div>



                <div class="flex gap-5">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Materia
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Darse de baja
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    Matematica
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">

                                    <a href="delete_clase.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            logout
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    Fisica
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">

                                    <a href="delete_clase.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            logout
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    Biologia
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">

                                    <a href="delete_clase.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            logout
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    4
                                </td>
                                <td class="px-6 py-4">
                                    Informatica
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">

                                    <a href="delete_clase.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            logout
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    5
                                </td>
                                <td class="px-6 py-4">
                                    Quimica
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">

                                    <a href="delete_clase.php" class="font-medium">
                                        <span class="material-symbols-outlined" style="color: #Dc2f19;">
                                            logout
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="w-80 h-full bg-white rounded-sm sm:w-96">

                        <form action="alumno_clases.php" class="flex flex-col p-5 gap-5 text-center relative z-20">


                            <span class="font-bold text-zinc-700 self-start">Materias para inscribir</span>


                            <div style="height: 1px; background-color: #e5e7eb; width: 100% ; "></div>
                            <div class="flex flex-col">
                                <span class="font-bold text-zinc-700 self-start">Selecciona la(s) Clase(s)</span>
                                <select name="clases" id="clases" multiple class="h-20 border border-zinc-300 bg-white rounded-sm px-3 mb-2">
                                    <option onclick="agregarSeleccionadas()" value="math101">Math 101</option>
                                    <option onclick="agregarSeleccionadas()" value=" science201">Science 201</option>
                                    <option onclick="agregarSeleccionadas()" value=" history301">History 301</option>
                                    <option onclick="agregarSeleccionadas()" value=" english401">English 401</option>
                                    <option onclick="agregarSeleccionadas()" value=" physics501">Physics 501</option>
                                </select>

                            </div>
                            <ul id="clasesSeleccionadas" class="self-start"></ul>

                            <div style="height: 1px; background-color: #e5e7eb; width: 100% ; "></div>
                            <input type="submit" value="Inscribir" class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
                        </form>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function agregarSeleccionadas() {
            const selectElement = document.getElementById("clases");
            const clasesSeleccionadasElement = document.getElementById("clasesSeleccionadas");
            const selectedOptions = Array.from(selectElement.selectedOptions);

            selectedOptions.forEach(option => {
                const li = document.createElement("li");
                li.textContent = option.text;
                clasesSeleccionadasElement.appendChild(li);

                option.style.display = "none";
                option.selected = false;
            });
        }
    </script>
    <script src="../../resources/index.js"></script>
</body>

</html>