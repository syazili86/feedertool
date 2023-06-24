@extends('dashboard.layout')

@section('content')
    <!-- header -->
    <div>
        <h1 class="text-xl font-semibold">{{ $title }}</h1>
        <div class="text-sm"><span class="text-gray-700">{{ $parent }}</span> / {{ $title }}</div>
    </div>
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
                </form>

            </div>

        </div>
        <div class="flex flex-col h-full gap-5">
            <div class="flex gap-5 p-5 bg-red-200 border border-red-300 rounded">
                <div class="flex items-center">
                    <span class="p-2 text-red-500 bg-red-500 rounded-full shadow-lg">
                        <i data-feather="alert-circle" class="w-10 h-10 text-white"></i>
                    </span>
                </div>
                <div>
                    <h1 class="font-bold ">Filter :</h1>
                    <ul class="font-medium text-gray-700">
                        <li>Angkatan</li>
                        <li>Program Studi</li>
                    </ul>
                </div>
            </div>
            <button
                class="relative flex items-center w-1/3 gap-1 p-2 font-semibold transition duration-200 ease-in-out bg-gray-300 border-2 border-gray-300 rounded-full hover:shadow-lg focus:outline-none focus:shadow-lg ">
                <span
                    class="absolute left-0 flex items-center justify-center w-10 h-10 bg-gray-300 border-2 rounded-full shadow-lg">
                    <i data-feather="eye" width="17"></i>
                </span>
                <span class="ml-10">Tampilkan</span>
            </button>
            <button
                class="relative flex items-center w-1/3 gap-1 p-2 font-semibold text-white transition duration-200 ease-in-out bg-blue-500 border-2 border-blue-500 rounded-full hover:shadow-lg focus:outline-none focus:shadow-lg hover:text-white hover:bg-blue-500">
                <span
                    class="absolute left-0 flex items-center justify-center w-10 h-10 text-white bg-blue-500 border-2 border-blue-500 rounded-full shadow-lg">
                    <i data-feather="download" width="17"></i>
                </span>
                <span class="ml-10">Pull</span>
            </button>
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
                <button
                    class="absolute top-0 right-0 flex items-center justify-center w-10 h-10 -mt-5 -mr-2 text-white bg-green-400 rounded-full focus:outline-none hover:shadow-lg">
                    <i data-feather="arrow-right-circle"></i>
                </button>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam perspiciatis at, quas maiores sunt dolor
                odit quia deleniti provident. Reprehenderit.
            </div>
        </div>
        <div class="card">
            <div class="card-header ">
                <h1 class="text-base font-semibold">
                    Feeder - Data {{ $title }}
                </h1>
            </div>
            <div class="relative card-body">
                <button
                    class="absolute top-0 left-0 flex items-center justify-center w-10 h-10 -mt-5 -ml-2 text-white bg-red-400 rounded-full focus:outline-none hover:shadow-lg">
                    <i data-feather="arrow-left-circle"></i>
                </button>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam perspiciatis at, quas maiores sunt dolor
                odit quia deleniti provident. Reprehenderit.
            </div>
        </div>
    </div>
    </div>
@endsection