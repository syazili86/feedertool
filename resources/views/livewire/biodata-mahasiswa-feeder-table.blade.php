<div>

    {{-- modal delete --}}
    {{-- <div id="modalDelete" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 py-10 text-center">
            <div class="fixed inset-0 bg-black opacity-75"></div>
            <div
                class="bg-white py-3 rounded-lg overflow-hidden shadow-xl transform w-1/3 transition-all sm:max-w-lg sm:w-full">
                <div class="p-5">
                    <p class=" text-red-500 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="bg-gray-200 mx-auto rounded-full p-2 w-20 h-20">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </p>
                    <p class="text-lg text-black">Apakah Anda yakin !!!</p>
                    <span>ingin menghapus data yang sudah pilih ?</span>
                    <p class="mt-3 text-xs text-red-500">
                        Data yang akan dihapus :
                        <strong>{{ count($selected) }}</strong>
                    </p>
                </div>
                <div class="px-6 py-4  text-center">
                    <button onclick="modalFn('modalDelete')"
                        class="px-4 py-2 text-sm font-semibold  bg-gray-400 hover:bg-gray-500 rounded focus:outline-none">
                        Batal
                    </button>
                    <button onclick="modalFn('modalDelete')" wire:click="deleteData"
                        class="ml-2 px-4 py-2 text-sm font-semibold text-white bg-red-500 hover:bg-red-600 rounded focus:outline-none">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    @if (session()->has('deleteMessageWarning'))
        <div class="border text-yellow-700 p-4 border-yellow-300 bg-yellow-200 mx-1 mb-3 rounded">
            <span>{{ session('deleteMessageWarning') }}</span>
        </div>
    @elseif (session()->has('deleteMessageError'))
        <div class="border text-red-700 p-4 border-red-300 bg-red-200 mx-1 mb-3 rounded">
            <span>{{ session('deleteMessageError') }}</span>
        </div>
    @endif
    {{-- <button wire:click="pushUsers"
        class="absolute top-0 left-0 flex items-center justify-center w-10 h-10 -mt-5 -ml-2 text-white bg-red-400 rounded-full focus:outline-none hover:shadow-lg">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
    </button> --}}
    <div class="pb-2 mx-1">
        <input wire:model.debounce.300ms="search" type="text"
            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search By {{ $searchBy !== 'id_mahasiswa' ? $searchBy : '(pilih filter berdasarkan)' }}">
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
                <option value="nama_agama">Agama</option>
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

        {{-- btn delete --}}
        {{-- <div class="relative mx-1">
            <button onclick="modalFn('modalDelete')"
                class="block w-full px-4 py-3 pr-8 leading-tight text-white
            bg-red-500 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-red-600
            ">
                Delete
            </button>
            <div class="absolute inset-y-0 right-0 flex items-center px-2 text-white pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>

            </div>
        </div> --}}
    </div>

    @if ($biodataMahasiswa)
        @if ($biodataMahasiswa->isNotEmpty())
            <div class="overflow-x-auto">

                <table class="w-full mb-6 text-xs table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            {{-- <th class="px-4 py-2">
                                <input wire:model="selectAll" class="cursor-pointer" type="checkbox">
                            </th> --}}
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Jenis Kelamin</th>
                            <th class="px-4 py-2">Tempat Lahir</th>
                            <th class="px-4 py-2">Tanggal Lahir</th>
                            <th class="px-4 py-2">Agama</th>
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
                            <th class="px-4 py-2">Wilayah</th>
                            <th class="px-4 py-2">Jenis Tinggal</th>
                            <th class="px-4 py-2">Alat Transfortasi</th>
                            <th class="px-4 py-2">Telepon</th>
                            <th class="px-4 py-2">Handphone</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Penerima KPS</th>
                            <th class="px-4 py-2">Nomor KPS</th>
                            <th class="px-4 py-2">NIK Ayah</th>
                            <th class="px-4 py-2">Nama Ayah</th>
                            <th class="px-4 py-2">Tanggal Lahir Ayah</th>
                            <th class="px-4 py-2">Pendidikan Ayah</th>
                            <th class="px-4 py-2">Pekerjaan Ayah</th>
                            <th class="px-4 py-2">Nama Penghasilan Ayah</th>
                            <th class="px-4 py-2">NIK Ibu</th>
                            <th class="px-4 py-2">Nama Ibu</th>
                            <th class="px-4 py-2">Tanggal Lahir Ibu</th>
                            <th class="px-4 py-2">Pendidikan Ibu</th>
                            <th class="px-4 py-2">Pekerjaan Ibu</th>
                            <th class="px-4 py-2">Penghasilan Ibu</th>
                            <th class="px-4 py-2">Nama Wali</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($biodataMahasiswa as $item)
                            <tr wire:loading.remove>
                                {{-- <td class="px-4 py-2 text-center border-b">
                                    <input wire:model="selected" class="cursor-pointer"
                                        value="{{ $item['id_mahasiswa'] }}" type="checkbox">
                                </td> --}}
                                <td class="px-4 py-2 border-b">{{ $item['nama_mahasiswa'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['jenis_kelamin'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['tempat_lahir'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['tanggal_lahir'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_agama'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nik'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nisn'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['npwp'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['kewarganegaraan'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['jalan'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['dusun'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['rt'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['rw'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['kelurahan'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['kode_pos'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_wilayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_jenis_tinggal'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_alat_transportasi'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['telepon'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['handphone'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['email'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['penerima_kps'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nomor_kps'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nik_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['tanggal_lahir_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_pendidikan_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_pekerjaan_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_penghasilan_ayah'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nik_ibu'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_ibu_kandung'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['tanggal_lahir_ibu'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_pendidikan_ibu'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_pekerjaan_ibu'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_penghasilan_ibu'] }}</td>
                                <td class="px-4 py-2 border-b">{{ $item['nama_wali'] }}</td>
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
