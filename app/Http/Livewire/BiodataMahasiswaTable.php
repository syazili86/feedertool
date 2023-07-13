<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BiodataMahasiswa;
use App\Providers\MyClass;

class BiodataMahasiswaTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'id_mahasiswa';
    public $sortAsc = false;
    public $selectAll = false;
    public $selected = [];
    public $loading = false;


    public function render()
    {
        // dd(session()->get('tokenPddikti'));
        return view('livewire.biodata-mahasiswa-table', [
            'users' => BiodataMahasiswa::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
            'searchBy' => $this->sortField
        ]);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = BiodataMahasiswa::pluck('id_mahasiswa');
        } else {
            $this->selected = [];
        }
    }

    public function pushUsers()
    {
        $this->loading = true;
        $id_mahasiswa = $this->selected;

        if (!$id_mahasiswa) {
            return back()->with('insertMessageWarning', 'Pilih data yang ingin di Push');
        }
        // dd($id_mahasiswa ? true : false);
        foreach ($id_mahasiswa as $id) {
            $data = BiodataMahasiswa::find($id);

            $response = MyClass::insertData($data);

            // dd($response['error_code']);
            if ($response['error_code'] !== 0) {
                return back()->with('insertMessageError', 'Gagal : ' . $response['error_desc']);
            }

            BiodataMahasiswa::where('id_mahasiswa', $id)->update(['sudah_sync' => true]);
        }

        return redirect(route('dashboard.biodata-mahasiswa'))->with('messageSuccess', 'Push Data Berhasil');

        // dd($key);
        $this->loading = false;
    }
}
