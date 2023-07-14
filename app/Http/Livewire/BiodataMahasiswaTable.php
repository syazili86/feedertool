<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Providers\MyClass;
use Livewire\WithPagination;
use App\Models\BiodataMahasiswa;
use Illuminate\Support\Facades\Log;

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
            $data = BiodataMahasiswa::search($this->search)->pluck('id_mahasiswa');
            if ($data) {
                $this->selected = $data;
            } else {
                $this->selected = BiodataMahasiswa::pluck('id_mahasiswa');
            }
        }
    }

    public function pushDatas()
    {
        $this->loading = true;
        $this->updatedSelectAll($this->selectAll);
        $id_mahasiswa = $this->selected;
        // dd($id_mahasiswa);

        if (!$id_mahasiswa) {
            return back()->with('insertMessageWarning', 'Pilih data yang ingin di Push');
        }

        $dataSucces = [];
        $responseSucces = [];
        $dataFail = [];


        foreach ($id_mahasiswa as $id) {
            $data = BiodataMahasiswa::find($id);

            $response = MyClass::insertData($data);

            if ($response['error_code'] !== 0) {
                Log::error("InsertBiodataMahasiswa", [
                    'user' => auth()->user(),
                    'response' => $response,
                    'data' => $data
                ]);

                $dataFail[] = [
                    'response' => $response['error_desc'],
                    'data' => collect($data)
                ];
                // return back()->with('insertMessageError', 'Gagal : ' . $response['error_desc'] . "<br>" . "Nama : " . $data->nama_mahasiswa);
            } else {
                $responseSucces[] = $response;
                $dataSucces[] = [
                    'id_mahasiswa' => $data->id_mahasiswa,
                    'nama_mahasiswa' => $data->nama_mahasiswa,
                ];
                BiodataMahasiswa::where('id_mahasiswa', $id)->update(['sudah_sync' => true]);
            }
        }

        // dd(collect($dataFail)[0]['data']['id_mahasiswa']);

        if ($responseSucces) {
            Log::info('InsertBiodataMahasiswa', [
                'user' => auth()->user(),
                'response' => $responseSucces,
                'data' => $dataSucces
            ]);
        }


        return redirect(route('dashboard.biodata-mahasiswa'))->with([
            'message' => $responseSucces ? 'Push Data Berhasil' : 'Gagal',
            'data' => $dataFail ? collect($dataFail) : false
        ]);

        // dd($key);
        $this->loading = false;
    }
}
