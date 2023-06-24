<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>ESync</title>
</head>

<body class="bg-gray-200">
    <main class="h-screen flex items-center justify-center">
        <section class="bg-white border rounded-lg p-10 shadow space-y-10 w-1/3">
            <div class="text-center">
                <img src="{{ asset('img/logo.png') }}" alt="logo ubd" class=" mx-auto">
                <h1 class="text-4xl font-bold">ESync</h1>
                <span class="font-semibold">Pusat Data Pendidikan Tinggi</span>
            </div>
            <form class=" space-y-5">
                <div class="flex flex-col">
                    <label class="font-semibold mb-1" for="username">Username</label>
                    <input type="text"
                        class="border ring-gray-500 font-semibold rounded-md p-3 focus:outline-none focus:bg-blue-100 focus:ring-blue-500"
                        placeholder="username" autofocus>
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold mb-1" for="password">Password</label>
                    <input type="password"
                        class="border ring-gray-500 font-semibold rounded-md p-3 focus:outline-none focus:bg-blue-100 focus:ring-blue-500"
                        placeholder="password">
                </div>
                <div>
                    <button class="bg-blue-500 text-white w-full py-3 rounded-md hover:bg-blue-600">Sign In</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
