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
            @if (session()->has('loginError'))
                <div class="border p-3 rounded-lg border-red-500 bg-red-200 text-red-500 font-bold text-center">
                    {{ session('loginError') }}
                </div>
            @endif
            <form action="{{ route('auth') }}" method="POST" class=" space-y-5">
                @csrf
                <div class="flex flex-col">
                    <label class="font-semibold mb-1" for="username">Username</label>
                    <input type="text"
                        class="border @error('username') border-red-500 @enderror ring-gray-500 font-semibold rounded-lg px-3 py-2 focus:outline-none focus:bg-blue-100 focus:ring-blue-500"
                        placeholder="username" name="username" value="{{ old('username') }}" autofocus>
                    @error('username')
                        <span class="text-red-500 text-xs font-semibold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="font-semibold mb-1" for="password">Password</label>
                    <input type="password"
                        class="border @error('password') border-red-500 @enderror ring-gray-500 font-semibold rounded-lg px-3 py-2 focus:outline-none focus:bg-blue-100 focus:ring-blue-500"
                        placeholder="password" name="password">
                    @error('password')
                        <span class="text-red-500 text-xs font-semibold">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button class="bg-blue-500 text-white w-full py-2 rounded-lg hover:bg-blue-600">Sign In</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
