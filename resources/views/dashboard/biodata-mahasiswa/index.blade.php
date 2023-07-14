@extends('dashboard.layout')

@section('content')
    <!-- header -->
    @include('dashboard.components.header')

    @if (session()->has('message'))
        <div id="modalSuccess" class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 py-10 text-center">
                <div class="fixed inset-0 bg-black opacity-75"></div>
                <div
                    class="bg-white py-3 rounded-lg overflow-hidden shadow-xl transform transition-all w-1/3 sm:max-w-lg sm:w-full">
                    <div class="p-5">
                        @if (session('message') === 'Gagal')
                            <h4 class="text-4xl font-semibold text-red-600 mb-5">Error</h4>
                            <p class=" text-red-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="bg-gray-200 mx-auto rounded-full p-2 w-20 h-20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </p>
                        @else
                            <h4 class="text-4xl font-semibold text-green-600 mb-5">Berhasil</h4>
                            <p class=" text-green-500 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="bg-gray-200 mx-auto rounded-full p-2 w-20 h-20">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>

                            </p>
                        @endif
                        <h5 class="text-lg mb-2">{{ session('message') }}</h5>

                        @if (session('data'))
                            <p>With Error</p>
                            <a onclick="modalFn('modalSuccess')" href="#data-fails"
                                class="text-xs underline text-red-500">lihat
                                data</a>
                        @endif

                    </div>
                    <div class="px-6 py-4 text-center">
                        <button onclick="modalFn('modalSuccess')"
                            class="px-4 py-2 text-sm font-semibold  bg-gray-400 hover:bg-gray-500 rounded focus:outline-none">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">
        <div class="card">
            <div class="card-header ">
                <form class="space-y-5 ">
                    <div class="flex flex-col">
                        <label class="mb-1 font-semibold" for="tahun_angkatan">Tahun / Angkatan</label>
                        <select type="text"
                            class="w-full p-2 text-sm font-medium text-gray-600 bg-gray-200 border rounded-md ring-gray-500 focus:outline-none focus:bg-blue-100 focus:ring-blue-500">
                            <option class="text-gray-800">Tahun/Angkatan</option>
                            <option class="text-gray-800" value="2018">2018</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1 font-semibold" for="prodi">Program Studi</label>
                        <select type="text"
                            class="w-full p-2 text-sm font-medium text-gray-600 bg-gray-200 border rounded-md ring-gray-500 focus:outline-none focus:bg-blue-100 focus:ring-blue-500">
                            <option class="text-gray-800">Program Studi</option>
                            <option class="text-gray-800" value="2018">2018</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-1 font-semibold" for="tahun_akademik">Tahun Akademik</label>
                        <select type="text"
                            class="w-full p-2 text-sm font-medium text-gray-600 bg-gray-200 border rounded-md ring-gray-500 focus:outline-none focus:bg-blue-100 focus:ring-blue-500">
                            <option class="text-gray-800">Tahun Akademik</option>
                            <option class="text-gray-800" value="2018">2018</option>
                        </select>
                    </div>
                    <button
                        class="relative flex items-center justify-center w-1/3 gap-1 p-2 mx-auto font-semibold text-white transition duration-200 ease-in-out bg-blue-500 border-2 border-blue-500 rounded-full hover:shadow-lg focus:outline-none focus:shadow-lg hover:text-white hover:bg-blue-500">
                        <span
                            class="absolute left-0 flex items-center justify-center w-10 h-10 text-white bg-blue-500 border-2 border-blue-500 rounded-full">
                            <i data-feather="download" width="17"></i>
                        </span>
                        <span class="mx-auto">Pull</span>
                    </button>
                </form>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">
        <div class="card">
            <div class="card-header ">
                <h1 class="text-base font-semibold">
                    Sisfo - Data {{ $title }}
                </h1>
            </div>
            <div class="relative card-body">
                <livewire:biodata-mahasiswa-table />
            </div>
        </div>
        <div class="card">
            <div class="card-header ">
                <h1 class="text-base font-semibold">
                    Feeder - Data {{ $title }}
                </h1>
            </div>
            <div class="relative card-body">
                @livewire('biodata-mahasiswa-feeder-table')
            </div>
        </div>
    </div>

    @if (session()->has('data') && session('data') !== false)
        <div id="data-fails" class="grid gap-6 mt-6 xl:grid-cols-1">
            <div class="card">
                <div class="card-body relative">
                    <div class="absolute right-0 top-0 cursor-pointer rounded-full -mr-2 -mt-2 "
                        onclick="modalFn('data-fails')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="bg-white p-1 border mx-auto rounded-full w-8 h-8 hover:bg-red-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    @foreach (session('data') as $data)
                        <div class="border mb-2 p-3 text-xs text-red-600 rounded bg-red-200 border-red-300">
                            <strong>response : </strong>{{ $data['response'] }}
                            <div class="font-bold">
                                ("id_mahasiswa" : "{{ $data['data']['id_mahasiswa'] }}", "nama_mahasiswa" :
                                "{{ $data['data']['nama_mahasiswa'] }}")
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif


    {{-- </div> --}}
@endsection

<script>
    function modalFn(elementId) {
        document.getElementById(elementId).classList.toggle('hidden');
    }
</script>
