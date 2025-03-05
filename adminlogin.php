<?php
session_start();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grip | Admin Login</title>
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KyZXEJxvJf+ua7Kw1TIq0U4DrVv/0/Z9g5J5aK7Umchq6TxN5RaLJ9fUG5/cv+qq"
            crossorigin="anonymous">
    </head>

    <body class="bg-gray-900 text-gray-200">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

            <h1 class="mt-10 text-center text-3xl font-bold tracking-tight text-gray-100 mb-10">Grip Technologies | Admin Login</h1>
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto" width="120px" src="Resorces/icon.ico"
                    alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold tracking-tight text-gray-100">Sign in to your account</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <div class="space-y-6">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email address</label>
                        <div class="mt-2">
                            <input type="email" placeholder="someone@gmail.com" id="email"
                                class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-base text-gray-300 outline outline-1 outline-gray-600 placeholder:text-gray-500 focus:outline-indigo-600">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-medium text-gray-300">Password</label>

                        </div>
                        <div class="mt-2">
                            <input type="password" id="pw" placeholder="************"
                                class="block w-full rounded-md bg-gray-800 px-3 py-1.5 text-base text-gray-300 outline outline-1 outline-gray-600 placeholder:text-gray-500 focus:outline-indigo-600">
                        </div>
                    </div>


                    <div id="msgDiv3" style="display: none;" class="block w-full rounded-md bg-red-800 px-3 py-4 text-base text-white-300 outline outline-1 outline-white-600 mb-4">
                        <div class="alert alert-danger" id="msg3" role="alert">

                        </div>
                    </div>


                    <div>
                        <button onclick="adminLogin();"
                            id="adminlogin" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-gray-100 shadow-sm hover:bg-indigo-500 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-indigo-600">
                            Sign in
                        </button>
                    </div>


                </div>
            </div>
        </div>

        <script>
            var pw = document.getElementById("pw");
            pw.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    document.getElementById("adminlogin").click();
                }
            });
        </script>



        <!-- footer -->

        <div class="fixed-bottom col-12">
            <p class="text-center">2025 GripTechnologies.lk || All Right Reserved &copy;</p>
        </div>
        <!-- footer -->


        <!-- JS -->
        <script src="script.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
            integrity="sha384-cn7l7gDp0eyg5tgybSzmKXrm0fu8z+z9vQIqZxF2yFSd5/z8ppl2WuvHg1g6Is6f"
            crossorigin="anonymous"></script>
    </body>

    </html>

