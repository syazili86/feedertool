<div
    class="flex flex-row flex-wrap items-center p-6 bg-white border-b border-gray-300 md:fixed md:w-full md:top-0 md:z-20">

    <!-- logo -->
    <div class="flex flex-row items-center flex-none w-56">
        <img src="{{ asset('img/logo.png') }}" class="flex-none w-24">
        <strong class="flex-1 ml-1 capitalize">FeederSync</strong>

        <button id="sliderBtn" class="flex-none hidden ml-5 text-right text-gray-900 md:block">
            <i data-feather="menu"></i>
        </button>
    </div>
    <!-- end logo -->

    <!-- navbar content toggle -->
    <button id="navbarToggle" class="right-0 hidden mr-6 md:block md:fixed">
        <i data-feather="chevrons-down"></i>
    </button>
    <!-- end navbar content toggle -->

    <!-- navbar content -->
    <div id="navbar"
        class="flex flex-row flex-wrap items-center justify-end flex-1 pl-3 animated md:hidden md:fixed md:top-0 md:w-full md:left-0 md:mt-16 md:border-t md:border-b md:border-gray-200 md:p-10 md:bg-white md:flex-col md:items-center">

        <!-- right -->
        <div class="flex flex-row-reverse items-center">

            <!-- user -->
            <form action="{{ route('logout') }}" method="POST" class="relative dropdown md:static">
                @csrf
                <button
                    class="flex flex-wrap items-center gap-2 px-2 py-1 border rounded-md hover:bg-gray-200 menu-btn focus:outline-none focus:shadow-outline">
                    <h1 class="p-0 m-0 text-sm font-semibold leading-none text-gray-800">Log Out</h1>
                    <i data-feather="log-out" class="w-4"></i>
                    <!-- item -->
                </button>

            </form>
            <!-- end user -->

        </div>
        <!-- end right -->
    </div>
    <!-- end navbar content -->

</div>
