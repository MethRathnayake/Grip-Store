<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./Resorces/icon.ico" type="image/x-icon">


</head>

<body>

    <!-- sign-in part -->

   

    <div id="signin_box" class="bg-gray-100 flex justify-center items-center h-screen">

        <div class="w-1/2 h-screen hidden lg:block">
            <img src="./Resorces/bg.jpeg">
        </div>

       

        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <img class="icon-size mx-auto" id="logo" src="./Resorces/icon.ico" alt="Your Company">

            

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>
            <br><br><br>

                <?php

                $um = "";
                $pw = "";

                    //if have cookies  username set varibale
                if(isset($_COOKIE["username"])){
                    $um = $_COOKIE["username"];

                }
                    //if have cookies password set variable
                if(isset($_COOKIE["password"])){
                    $pw = $_COOKIE["password"];
                }


                    ?>


            <div class="space-y-6">
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Username:</label>
                    <div class="mt-2">
                        <input type="text"  id="username" value="<?php echo($um)?>" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-blue-600 hover:text-blue-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input type="password" id="password" value="<?php echo($pw)?>" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input mt-2" id="rm">
                        <label class="form-check-label mt-1" for="exampleCheck1">Remember me</label>
                    </div>
                </div>
                
                <div class="mt-3 d-none" id="msgDiv">
                    <div class="alert alert-danger" id="msg" role="alert"></div>
                </div>
                <div>
                    <button onclick="signin();" class="login_button flex w-full justify-center rounded-md bg-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </div>
            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Don't Have an Account?
                <a class="font-semibold text-blue-600 hover:text-blue-500 cursor-pointer" onclick="changeView();">Sign up</a>
            </p>


        </div>
    </div>

    <!-- sign-in part -->








    <!-- sign-up part -->





    <div id="signup_box" class="d-none bg-gray-100 flex justify-center items-center">

        <div class="w-1/2 h-screen hidden lg:block">
            <img src="./Resorces/bg.jpeg">
        </div>

        <div class="lg:p-36 md:p-20 sm:p-10 p-6 w-full lg:w-1/2">

        <div class="space-y-6">
            <!-- Logo -->
            <img class="icon-size mx-auto " src="./Resorces/icon.ico" alt="Your Company">
            <!-- Label -->
            <h2 class="mt-6 text-center text-xl md:text-2xl font-bold tracking-tight text-gray-900">
                Create an Account | Grip Technologies
            </h2>

            <br>

            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <!-- Name -->
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input type="text" placeholder="David Warner" id="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <!-- Mobile -->
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-900">Mobile</label>
                    <div class="mt-2">
                        <input type="text" placeholder="07********" id="mobile" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <!-- Email -->
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" type="text" placeholder="someone@gmail.com" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <!-- Username -->
                <div class="sm:col-span-4">
                    <label class="block text-sm font-medium text-gray-900">Username</label>
                    <div class="mt-2">
                        <input type="text" id="un" placeholder="david.warner" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <!-- Password -->
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" id="pw" placeholder="*************" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                        <input type="password" id="co-pw" placeholder="*************" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm">
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="mt-3 d-none" id="msgDiv1">
                    <div class="alert alert-danger" id="msg1" role="alert"></div>
                </div>
            <!-- Sign Up Button -->
            <div>
                <button class="login_button flex w-full justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="signup();">
                    Sign up
                </button>
            </div>
        </div>
        <p class="mt-10 text-center text-sm text-gray-500">
            Don't Have an Account?
            <a class="font-semibold text-blue-600 hover:text-blue-500 cursor-pointer" onclick="changeView();">Sign in</a>
        </p>
    </div>
    </div>


    <!-- sign-up part -->







    <!-- Email Verify -->

    <div id="mail_box" class="d-none bg-gray-100 flex justify-center items-center h-screen">

        <div class="w-1/2 h-screen hidden lg:block">
            <img src="./Resorces/bg.jpeg">
        </div>

        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <img class="icon-size mx-auto" src="./Resorces/icon.ico" alt="Your Company">

            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Verify your account</h2>
            </div>

            <div class="space-y-6 mt-12 mx-auto max-w-sm">
                <div class="grid grid-cols-1 gap-y-4">
                    <div>
                        <label for="form-label" class="block text-sm font-medium text-gray-900">Enter the OTP</label>
                        <input id="code" class="block w-full rounded-md bg-white px-4 py-2 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
                    </div>


                    <div class="text-center text-sm p-2 rounded-md" id="msgDiv2">
                        <div class="alert alert-danger " role="alert" id="msg2">
                            Please verify your email! Check your inbox for the OTP to complete the process.
                        </div>
                    </div>

                    <button type="submit" class="login_button flex w-full justify-center rounded-md bg-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 " onclick="emailVerify();">
                        Verify Account
                    </button>
                </div>
            </div>


        </div>
    </div>



    <!-- Email Verify -->



    <script src="https://cdn.tailwindcss.com"></script>
    <script src="script.js"></script>
    <script src="./lib/bootstrap.bundle.min.js"></script>

</body>

</html>