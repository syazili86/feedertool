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

        <section class="bg-gray-100 px-10 py-16 text-sm shadow-lg space-y-10 w-1/3" style="border-radius: 30px">
            <div class="text-center space-y-5">
                <img src="{{ asset('img/logo.png') }}" alt="logo ubd" class=" mx-auto">
                <h1 class="text-xl font-bold">ESync</h1>
                <span class="font-semibold text-gray-700">Pusat Data Pendidikan Tinggi</span>
            </div>
            @if (session()->has('loginError'))
                <div class="border p-3 rounded-lg border-red-500 bg-red-200 text-red-500 font-bold text-center">
                    {{ session('loginError') }}
                </div>
            @endif
            <form action="{{ route('auth') }}" method="POST" class=" space-y-5">
                @csrf
                <div class="flex flex-col">
                    <div
                        class="flex items-center border @error('username') border-red-500 @enderror px-2 rounded-lg gap-2">
                        <label class="font-semibold mb-1 text-gray-500" for="username">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </label>
                        <input type="text"
                            class="w-full font-semibold bg-transparent px-4 py-3 focus:outline-none  focus:ring-blue-500"
                            placeholder="username" name="username" value="{{ old('username') }}" autofocus>
                    </div>
                    @error('username')
                        <span class="text-red-500 text-xs font-semibold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <div
                        class="flex items-center border @error('password') border-red-500 @enderror px-2 rounded-lg gap-2">
                        <label class="font-semibold mb-1 text-gray-500" for="password">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </label>
                        <input type="password"
                            class="w-full font-semibold bg-transparent px-4 py-3 focus:outline-none  focus:ring-blue-500"
                            placeholder="password" name="password">
                    </div>
                    @error('password')
                        <span class="text-red-500 text-xs font-semibold">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button class="bg-blue-700 text-white w-full py-3 rounded-lg hover:bg-blue-600">Sign In</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
