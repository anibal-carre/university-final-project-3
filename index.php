<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.jpg">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
    .material-symbols-outlined {
        font-variation-settings:
            'FILL'1,
            'wght'400,
            'GRAD'0,
            'opsz'48
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
            <form action="views/admin/admin_dashboard.php" class="flex flex-col p-5 gap-5 text-center relative z-20">

                <span class="text-zinc-600">Bienvenido Ingresa con tu cuenta</span>
                <input type="email" placeholder="Email"
                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3"><span
                    class="material-symbols-outlined absolute z-10 mt-13 self-end mr-5 text-zinc-500">
                    mail
                </span>
                <input type="password" placeholder="Password"
                    class="h-10 border border-zinc-300 bg-white rounded-sm px-3"><span
                    class="material-symbols-outlined absolute z-10 mt-28 self-end mr-5 text-zinc-500">
                    lock
                </span>
                <input type="submit" value="Ingresar"
                    class="text-white font-semibold p-2 px-3 bg-blue-500 rounded-md self-end">
            </form>
        </div>
    </div>
</body>

</html>