 <div class="fixed flex items-center justify-center z-50 -mt-20 overflow-hidden inset-0 w-full"
     style="background: rgba(0, 0, 0, 0.4);">
     <div class="bg-gray-100 px-10 py-16 text-sm shadow-lg mt-20 space-y-10 w-1/3" style="border-radius: 30px">
         <div class="text-center text-gray-700">
             <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto border-4 border-black w-12 h-12 p-1 rounded-full"
                 viewBox="0 0 64 512">
                 <path
                     d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V320c0 17.7 14.3 32 32 32s32-14.3 32-32V64zM32 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
             </svg>
             <h1 class="text-xl font-semibold mt-5">Login Untuk Mendapatkan Token</h1>
             <p class="text-gray-600 text-xs">gunakan akun pddikti untuk mendapatkan token</p>
         </div>
         @if (session()->has('message'))
             <div class="border font-semibold p-4 rounded-lg bg-red-200 border-red-300 text-red-500">
                 Login Gagal . {{ session('message') }}
             </div>
         @endif
         <div class="space-y-4">
             <form action="{{ route('dashboard.get-token') }}" method="POST" class="flex flex-col gap-2">
                 @csrf
                 <div>
                     <input type="text" name="username" placeholder="username"
                         class="border-2 w-full px-5 py-4 rounded-lg focus:outline-none focus:border-blue-700 @error('username') border-red-500 @enderror"
                         value="{{ old('username') }}">
                     @error('username')
                         <div class="text-red-500 text-xs">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>
                 <div>
                     <input type="password" name="password" placeholder="password"
                         class="border-2 w-full px-5 py-4 rounded-lg focus:outline-none focus:border-blue-700 @error('password') border-red-500 @enderror">
                     @error('password')
                         <div class="text-red-500 text-xs">
                             {{ $message }}
                         </div>
                     @enderror
                 </div>
                 <button type="submit"
                     class="bg-blue-700 px-5 py-4 rounded-lg text-white font-bold mt-5 hover:bg-blue-500">
                     Submit
                 </button>
             </form>
             <form action="{{ route('logout') }}" method="POST" class="relative dropdown md:static">
                 @csrf
                 <button class="flex flex-wrap items-center gap-2 mx-auto">
                     <h1 class="p-0 m-0 text-sm font-semibold underline leading-none text-red-600 hover:text-red-500">
                         Log Out</h1>
                     {{-- <i data-feather="log-out" class="w-4"></i> --}}
                     <!-- item -->
                 </button>
             </form>
         </div>
     </div>
 </div>
