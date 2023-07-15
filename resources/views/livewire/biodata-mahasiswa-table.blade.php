<div>

    <div id="modalPush" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 py-10 text-center">
            <div class="fixed inset-0 bg-black opacity-75"></div>
            <div
                class="bg-white py-3 rounded-lg overflow-hidden shadow-xl transform w-1/3 transition-all sm:max-w-lg sm:w-full">
                <div class="p-5">
                    <p class=" text-green-500 w-20 h-20 mx-auto bg-gray-300 rounded-full mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mx-auto w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                    </p>
                    <p class="text-lg text-black">Apakah Anda yakin !!!</p>
                    <span>ingin push/sync data yang sudah pilih ?</span>
                    <p class="mt-3 text-xs text-green-500">
                        Data yang akan dipush :
                        <strong>{{ count($selected) }}</strong>
                    </p>
                </div>
                <div class="px-6 py-4  text-center">
                    <button onclick="modalFn('modalPush')"
                        class="px-4 py-2 text-sm font-semibold  bg-gray-400 hover:bg-gray-500 rounded focus:outline-none">
                        Batal
                    </button>
                    <button onclick="modalFn('modalPush')" wire:click="pushDatas"
                        class="ml-2 px-4 py-2 text-sm font-semibold text-white bg-green-500 hover:bg-green-600 rounded focus:outline-none">
                        Push
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('insertMessageWarning'))
        <div class="border text-yellow-700 p-4 border-yellow-300 bg-yellow-200 mx-1 mb-3 rounded">
            <span>{{ session('insertMessageWarning') }}</span>
        </div>
    @elseif (session()->has('insertMessageError'))
        <div class="border text-red-700 p-4 border-red-300 bg-red-200 mx-1 mb-3 rounded">
            <span>{{ session('insertMessageError') }}</span>
        </div>
    @endif
    {{-- <button wire:click="pushDatas"
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
            <select wire:model="filterField"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option>Pilih Field</option>
                <option value="sudah_sync">Status Sync</option>
                <option value="penerima_kps">Penerima KPS</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative mx-1">
            <select wire:model="filterValue"
                class="block w-full px-4 py-3 pr-8 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-state">
                <option>Pilih By</option>
                @if ($filterField)
                    <option value="yes" wire:click='updatedFilter'>
                        {{ $filterField === 'sudah_sync' ? 'Sudah Sync' : 'Ya' }}</option>
                    <option value="no" wire:click='updatedFilter'>
                        {{ $filterField === 'sudah_sync' ? 'Belum Sync' : 'Tidak' }}</option>
                @endif
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
        <div class="relative mx-1">
            <button onclick="modalFn('modalPush')"
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
    @if ($biodataMahasiswa)
        @if ($biodataMahasiswa->isNotEmpty())
            <div class="overflow-x-auto">

                <table class="w-full mb-6 text-xs table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2"><input wire:model="selectAll" class="cursor-pointer" type="checkbox">
                            </th>
                            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('sudah_sync')">
                                <div class="flex items-center gap-2">
                                    @if ($sortField === 'sudah_sync' or $sortField === 'id_mahasiswa')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="{{ $sortAsc ? 'M19.5 8.25l-7.5 7.5-7.5-7.5' : 'M4.5 15.75l7.5-7.5 7.5 7.5' }}" />
                                        </svg>
                                    @endif
                                    <span>
                                        Status Sync
                                    </span>
                                </div>
                            </th>
                            <th class="px-4 py-2 cursor-pointer" wire:click="sortBy('nama_mahasiswa')">
                                <div class="flex items-center gap-2">
                                    @if ($sortField === 'nama_mahasiswa')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="{{ $sortAsc ? 'M19.5 8.25l-7.5 7.5-7.5-7.5' : 'M4.5 15.75l7.5-7.5 7.5 7.5' }}" />
                                        </svg>
                                    @endif
                                    <span>
                                        Nama
                                    </span>
                                </div>
                            </th>
                            <th class="px-4 py-2">Jenis Kelamin</th>
                            <th class="px-4 py-2">Tempat Lahir</th>
                            <th class="px-4 py-2">Tanggal Lahir</th>
                            <th class="px-4 py-2">NIK</th>
                            <th class="px-4 py-2">NISN</th>
                            <th class="px-4 py-2">NPWP</th>
                            <th class="px-4 py-2">Kewarganegaraan</th>
                            <th class="px-4 py-2">Jalan</th>
                            <th class="px-4 py-2">Dusun</th>
                            <th class="px-4 py-2">rt</th>
                            <th class="px-4 py-2">rw</th>
                            <th class="px-4 py-2">Kelurahan</th>
                            <th class="px-4 py-2">Kode Pos</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Handphone</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Penerima KPS</th>
                            <th class="px-4 py-2">Nomor KPS</th>
                            <th class="px-4 py-2">NIK Ayah</th>
                            <th class="px-4 py-2">Nama Ayah</th>
                            <th class="px-4 py-2">NIK Ibu</th>
                            <th class="px-4 py-2">Nama Ibu</th>
                            <th class="px-4 py-2">Nama Wali</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($biodataMahasiswa as $item)
                            <tr wire:loading.remove class="{{ $item->sudah_sync ? 'bg-green-100' : '' }}">
                                <td class="px-4 py-2 text-center border-b">
                                    <input wire:model="selected" class="cursor-pointer" value="{{ $item->id }}"
                                        type="checkbox">
                                </td>
                                <td class="px-4 py-2 border-b">
                                    @if ($item->sudah_sync)
                                        <p class="text-xs font-bold text-green-500">Sudah Sync</p>
                                    @else
                                        <p class="text-xs font-bold text-red-500">Belum Sync</p>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border-b">{{ $item->nama_mahasiswa }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->jenis_kelamin }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->tempat_lahir }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->tanggal_lahir }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nik }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nisn }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->npwp }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->kewarganegaraan }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->jalan }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->dusun }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->rt }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->rw }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->kelurahan }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->kode_pos }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->telepon }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->handphone }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->email }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->penerima_kps ? 'Ya' : 'Tidak' }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nomor_kps }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nik_ayah }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nama_ayah }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nik_ibu }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nama_ibu_kandung }}</td>
                                <td class="px-4 py-2 border-b">{{ $item->nama_wali }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $biodataMahasiswa->links() !!}
        @else
            <p class="text-center">Whoops! Data Tidak Ditemukan 🙁</p>
        @endif
    @else
        😢 Session Telah Habis
    @endif

    @include('dashboard.components.loading-animate')
</div>
