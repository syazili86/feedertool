<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Providers\MyClass;
use Livewire\WithPagination;
use App\Models\BiodataMahasiswa;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

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

        // dd($items);
        // dd(session()->get('tokenPddikti'));
        if ($items !== false) {
            $this->updatedSelectAll($this->selectAll);
        }

        return view('livewire.biodata-mahasiswa-feeder-table', [
            'users' => $items,
            'searchBy' => $this->sortField,
            'selected' => $this->selected
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
        if ($this->searchItems() === false) {
            return back();
        }

        if ($this->search && $this->sortField !== 'id_mahasiswa') {
            $response = getDataWithAct('GetBiodataMahasiswa', null, $this->filter)['data'];
        } else {
            $response = getDataWithAct('GetBiodataMahasiswa')['data'];
        }

        if ($value) {
            $this->selected = collect($response)->pluck('id_mahasiswa')->toArray();
        }
    }

    public function deleteData()
    {
        $this->updatedSelectAll($this->selectAll);
        $id_mahasiswa = $this->selected;

        // dd($id_mahasiswa);
        if (!$id_mahasiswa) {
            return back()->with('deleteMessageWarning', 'Pilih data yang ingin di hapus');
        }

        foreach ($id_mahasiswa as $id_mahasiswa) {

            // $data = BiodataMahasiswa::find($id_mahasiswa);

            $response = MyClass::deleteData($id_mahasiswa);

            // dd($response['error_code']);
            if ($response['error_code'] !== 0) {
                Log::error("DeleteBiodataMahasiswa", [
                    'user' => auth()->user(),
                    'response' => $response
                ]);
                return back()->with('deleteMessageError', 'Gagal : ' . $response['error_desc']);
            }

            // BiodataMahasiswa::where('id_mahasiswa', $id)->update(['sudah_sync' => true]);

        }

        return redirect(route('dashboard.biodata-mahasiswa'))->with('message', 'Delete Data Berhasil');
    }
}
