@extends('dashboard.layout')

@section('content')
    <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">
        <div class="card">
            <div class="card-header ">
                <h1 class="text-base font-semibold">
                    Profile
                </h1>
            </div>
            <div class="relative card-body">
                <div>
                    @if ($getProfilPT)
                        <table>
                            <tbody>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Perguruan Tinggi
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->nama_perguruan_tinggi }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Kode Perguruan Tinggi
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->kode_perguruan_tinggi }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Status Perguruan Tinggi
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->status_perguruan_tinggi }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Alamat
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->jalan }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Email
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->email }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Telepon
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->telepon }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Website
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->website }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <td class="font-semibold p-2">
                                        Status Milik
                                    </td>
                                    <td class="p-2"> : </td>
                                    <td class="p-2">
                                        {{ $getProfilPT->nama_status_milik }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        😢 Session Telah Habis
                    @endif
                </div>
            </div>
        </div>
        <div>
            <!-- General Report -->
            <div class="grid grid-cols-2 gap-6 xl:grid-cols-1">
                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-indigo-700 fad fa-shopping-cart"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    12%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4"></h1>
                                <p>items sales</p>
                            </div>
                            <!-- end bottom -->
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-red-700 fad fa-store"></div>
                                <span class="rounded-full text-white badge bg-red-400 text-xs">
                                    6%
                                    <i class="fal fa-chevron-down ml-1"></i>
                                </span>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4"></h1>
                                <p>new orders</p>
                            </div>
                            <!-- end bottom -->
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-yellow-600 fad fa-sitemap"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    72%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4"></h1>
                                <p>total Products</p>
                            </div>
                            <!-- end bottom -->
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->

                <!-- card -->
                <div class="report-card">
                    <div class="card">
                        <div class="card-body flex flex-col">
                            <!-- top -->
                            <div class="flex flex-row justify-between items-center">
                                <div class="h6 text-green-700 fad fa-users"></div>
                                <span class="rounded-full text-white badge bg-teal-400 text-xs">
                                    150%
                                    <i class="fal fa-chevron-up ml-1"></i>
                                </span>
                            </div>
                            <!-- end top -->

                            <!-- bottom -->
                            <div class="mt-8">
                                <h1 class="h5 num-4"></h1>
                                <p>new Visitor</p>
                            </div>
                            <!-- end bottom -->
                        </div>
                    </div>
                    <div class="footer bg-white p-1 mx-4 border border-t-0 rounded rounded-t-none"></div>
                </div>
                <!-- end card -->
            </div>

        </div>
    </div>

    <!-- End General Report -->
@endsection
