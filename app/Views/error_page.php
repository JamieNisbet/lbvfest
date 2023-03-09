<?php error_reporting(E_ALL); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- PRODUCTION LINK  -->
    <link href="./css/app.css" rel="stylesheet">
    <!-- DEVELOPMENT LINK --> 
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Not Found</title>
</head>
<body>
<div class="bg-blue-500">
        <div class="flex justify-center container mx-auto my-auto w-screen h-screen items-center flex-col">
            <div class="text-slate-100 items-center">
                <h1 class="text-center text-2xl pb-3">404</h1>
            </div>

            <div class="w-full md:w-3/4  lg:w-1/2 flex flex-col items-center bg-slate-50 rounded-md pt-12">
                <!-- email input -->
            
                <!-- password input -->
                <div class="w-3/4 mb-6">
                    <span class="w-full py-4 px-8 bg-slate-200 placeholder:font-semibold rounded hover:ring-1 hover:ring-gray-600 outline-slate-500  border-solid border-2 border-slate-300" > There has been an error</span>
                </div>
       
                <div class="w-3/4 mb-12">
                    <a href="<?= base_url() ?>"  class="py-4 bg-blue-500 w-full rounded text-blue-50 font-bold hover:bg-blue-700">Go to homepage</a>
                </div>
            </div>
          
        </div>
        
    </div>
</body>
</html>