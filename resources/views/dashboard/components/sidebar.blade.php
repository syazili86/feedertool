<div id="sideBar"
    class="relative flex flex-col flex-wrap flex-none w-64 p-6 bg-white border-r border-gray-300 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">

    <span class="hidden">
        {{ $active = 'text-white bg-blue-500' }}
    </span>

    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="hidden mb-4 text-right md:block">
            <button id="sideBarHideBtn">
                <i data-feather="x-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="mb-4 text-xs tracking-wider text-gray-600 uppercase">home</p>

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Dashboard' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="home" width="15"></i>
            Beranda
        </a>
        <!-- end link -->

        <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">mahasiswa</p>

        <!-- link -->
        <a href="{{ route('dashboard.biodata-mahasiswa') }}"
            class="{{ $title === 'Biodata Mahasiswa' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="users" width="15"></i>
            Biodata Mahasiswa
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.mahasiswa-lulus-do') }}"
            class="{{ $title === 'Mahasiswa Lulus DO' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="package" width="15"></i>
            Status Lulus DO
        </a>
        <!-- end link -->

        <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">master perkuliahan</p>

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Kurikulum' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="target" width="15"></i>
            Kurikulum
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Periode Perkuliahan' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="disc" width="15"></i>
            Periode Perkuliahan
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Mata Kuliah' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="book" width="15"></i>
            Mata Kuliah
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Kelas Kuliah' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="book-open" width="15"></i>
            Kelas Kuliah
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Subtansi Kuliah' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="file-text" width="15"></i>
            Subtansi Kuliah
        </a>
        <!-- end link -->

        <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">perkuliahan</p>

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Dosen Ajar' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="hard-drive" width="15"></i>
            Dosen Ajar
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'KRS Mahasiswa' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="folder" width="15"></i>
            KRS Mahasiswa
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Kuliah Mahasiswa' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="file-minus" width="15"></i>
            Kuliah Mahasiswa
        </a>
        <!-- end link -->

        <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">nilai</p>

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Nilai Konversi' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="sidebar" width="15"></i>
            Nilai Konversi
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Nilai Perkuliahan' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="table" width="15"></i>
            Nilai Perkuliahan
        </a>
        <!-- end link -->

        <p class="mt-4 mb-4 text-xs tracking-wider text-gray-600 uppercase">Tugas Akhir</p>

        <!-- link -->
        <a href="{{ route('dashboard.index') }}"
            class="{{ $title === 'Tugas Akhir' ? $active : '' }} flex items-end mb-1 gap-2 capitalize font-medium text-sm transition ease-in-out duration-500 p-2 rounded hover:text-white hover:bg-blue-500">
            <i data-feather="file" width="15"></i>
            Tugas Akhir
        </a>
        <!-- end link -->

    </div>
    <!-- end sidebar content -->

</div>
