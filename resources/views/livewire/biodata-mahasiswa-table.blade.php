<div>

    @if (session()->has('insertMessageWarning'))
        <div class="border text-yellow-700 p-4 border-yellow-300 bg-yellow-200 mx-1 mb-3 rounded">
            <span>{{ session('insertMessageWarning') }}</span>
        </div>
    @elseif (session()->has('insertMessageError'))
        <div class="border text-red-700 p-4 border-red-300 bg-red-200 mx-1 mb-3 rounded">
            <span>{{ session('insertMessageError') }}</span>
        </div>
    @endif
    {{-- <button wire:click="pushUsers"
        class="absolute top-0 right-0 flex items-center justify-center w-10 h-10 -mt-5 -mr-2 text-white bg-green-400 rounded-full focus:outline-none hover:shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
        </svg>
    </button> --}}
    <div class="pb-2 mx-1">
        <input wire:model.debounce.300ms="search" type="text"
            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search ...">
    </div>
    <div class="ml-1">
        Filter
    </div>
    <div class="flex w-full pb-10">
        <div class="relative mx-1">
            <select wire:model="sortField"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="id_mahasiswa">ID</option>
                <option value="nama_mahasiswa">Name</option>
                <option value="jenis_kelamin">Jenis Kelamin</option>
                <option value="tempat_lahir">Tempat Lahir</option>
                <option value="sudah_sync">Status Sync</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative mx-1">
            <select wire:model="sortAsc"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="0">Desc</option>
                <option value="1">Asc</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative w-1/6 mx-1">
            <select wire:model="perPage"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative mx-1">
            <button wire:click="pushUsers"
                class="block w-full px-4 py-3 pr-8 leading-tight text-white
                bg-green-500 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-green-600
                focus:border-green-700">
                Push
            </button>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-white pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                </svg>
            </div>
        </div>
    </div>
    @if ($users)
        @if ($users->isNotEmpty())
            <div class="overflow-x-auto">

                <table class="w-full mb-6 text-xs table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2"><input wire:model="selectAll" class="cursor-pointer" type="checkbox">
                            </th>
                            <th class="px-4 py-2">Status Sync</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Jenis Kelamin</th>
                            <th class="px-4 py-2">Tanggal Lahir</th>
                            <th class="px-4 py-2">Tempat Lahir</th>
                            <th class="px-4 py-2">Agama</th>
                            <th class="px-4 py-2">NIK</th>
                            <th class="px-4 py-2">NISN</th>
                            <th class="px-4 py-2">Jalan</th>
                            <th class="px-4 py-2">Kelurahan</th>
                            <th class="px-4 py-2">Nama Ayah</th>
                            <th class="px-4 py-2">Nama Ibu</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr wire:loading.remove class="{{ $user->sudah_sync ? 'bg-green-100' : '' }}">
                                <td class="px-4 py-2 text-center border-b">
                                    <input wire:model="selected" class="cursor-pointer"
                                        value="{{ $user->id_mahasiswa }}" type="checkbox">
                                </td>
                                <td class="px-4 py-2 border-b">
                                    @if ($user->sudah_sync)
                                        <p class="text-xs font-bold text-green-500">Sudah Sync</p>
                                    @else
                                        <p class="text-xs font-bold text-red-500">Belum Sync</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b">{{ $user->nama_mahasiswa }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->jenis_kelamin }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->tanggal_lahir }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->tempat_lahir }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->nama_agama }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->nik }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->nisn }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->jalan }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->kelurahan }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->nama_ayah }}</td>
                                <td class="px-4 py-2 border-b">{{ $user->nama_ibu_kandung }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $users->links() !!}
        @else
            <p class="text-center">Whoops! Data Tidak Ditemukan 🙁</p>
        @endif
    @else
        😢 Session Telah Habis
    @endif

    @include('dashboard.components.loading-animate')
</div>
