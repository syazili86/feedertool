<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class BiodataMahasiswaFeederTable extends Component
{
    use WithPagination;

    public $search = null;
    public $perPage = 10;
    public $sortField = 'id_mahasiswa';
    public $sortAsc = false;
    public $selectAll = false;
    public $selected = [];
    public $filter;
    public $loading = false;


    public function mount()
    {
        $this->resetPage();
    }

    public function render()
    {

        $items = $this->searchItems();

        // dd(session()->get('tokenPddikti'));

        return view('livewire.biodata-mahasiswa-feeder-table', [
            'users' => $items,
            'searchBy' => $this->sortField
        ]);
    }

    public function responseData()
    {
        $this->loading = true;
        $this->filter = $this->sortField . " like " . "'%" . $this->search . "%'";

        if ($this->search && $this->sortField !== 'id_mahasiswa') {
            $response = getDataWithAct('GetBiodataMahasiswa', null, $this->filter);
        } else {
            $response = getDataWithAct('GetBiodataMahasiswa', 200);
        }
        // $response = getDataWithAct('GetListMahasiswa', 200);
        // dd($response);
        if ($response) {
            return collect($response['data']);
        }
        return $response;
        $this->loading = false;
    }

    public function searchItems()
    {

        $data = $this->responseData();

        if ($data) {
            // $filteredItems = $data->filter(function ($item) {
            //     return str_contains(strtolower($item['nama_mahasiswa']), strtolower($this->search))
            //         || str_contains(strtolower($item['tempat_lahir']), strtolower($this->search));
            // });

            $orderedItems = $this->orderByItems($data);

            return $this->paginateItems($orderedItems);
        }

        return $data;
    }

    public function orderByItems($items)
    {
        $column = $this->sortField;
        $direction = $this->sortAsc ? "asc" : 'desc';

        $orderedItems = $items->sortBy($column, SORT_REGULAR, $direction === 'desc');

        return $orderedItems;
    }

    public function paginateItems($items)
    {
        $perPage = $this->perPage; // Jumlah item per halaman
        $page = Paginator::resolveCurrentPage('page');

        $paginatedItems = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        // dd($items->count(), $perPage, $paginatedItems);
        return $paginatedItems;
    }

    public function updatedSelectAll($value)
    {
        // if (!session()->has('tokenPddikti')) {
        //     return back();
        // }

        if ($this->search && $this->sortField !== 'id_mahasiswa') {
            $response = getDataWithAct('GetBiodataMahasiswa', null, $this->filter)['data'];
        } else {
            $response = getDataWithAct('GetBiodataMahasiswa')['data'];
        }

        if ($value) {
            $this->selected = collect($response)->pluck('id_mahasiswa')->toArray();
        } else {
            $this->selected = [];
        }
    }

    public function pushUsers()
    {
        dd($this->selected);
        User::destroy($this->selected);
    }
}
