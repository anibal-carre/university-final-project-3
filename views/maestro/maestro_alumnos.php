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
                <span>maestro</span>
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
                    <a href="maestro_dashboard.php"><span class="text-zinc-800 ">
                            Home
                        </span></a>
                </div>

                <nav>
                    <li class="flex items-center gap-2 text-zinc-800 cursor-pointer" onclick="toggleLogoutMenu()">
                        Maestro
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
                    <h1 class="font-bold text-zinc-700 text-xl ">Información de la Clase de Quimica</h1>
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
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    John Doe
                                </td>
                                <td class="px-6 py-4">
                                    95
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="maestro_edit.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    Jane Smith
                                </td>
                                <td class="px-6 py-4">
                                    80
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="maestro_edit.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    Mike Wilson
                                </td>
                                <td class="px-6 py-4">
                                    75
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="maestro_edit.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    4
                                </td>
                                <td class="px-6 py-4">
                                    Sarah Johnson
                                </td>
                                <td class="px-6 py-4">
                                    88
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="maestro_edit.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    5
                                </td>
                                <td class="px-6 py-4">
                                    Alex Brown
                                </td>
                                <td class="px-6 py-4">
                                    92
                                </td>
                                <td class="px-6 py-4 flex gap-5 items-center">
                                    <a href="maestro_edit.php" class="font-medium text-blue-600 dark:text-blue-500 ">
                                        <span class="material-symbols-outlined">
                                            edit_square
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