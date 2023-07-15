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
    public $filterField = '';
    public $filterValue = '';
    public $loading = false;


    public function render()
    {

        if ($this->filterField and $this->filterValue) {
            $data = BiodataMahasiswa::where($this->filterField, $this->filterValue === 'yes' ? 1 : 0)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        } else {
            $data = BiodataMahasiswa::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage);
        }

        if ($this->selectAll) {
            $this->updatedSelectAll($this->selectAll);
        }

        // dd(session()->get('tokenPddikti'));
        return view('livewire.biodata-mahasiswa-table', [
            'biodataMahasiswa' => $data,
            'sortField' => $this->sortField,
            'sortAsc' => $this->sortAsc,
            'filterField' => $this->filterField
        ]);
    }

    public function sortBy($field)
    {
        $this->sortField = $field;

        $this->sortAsc = $this->sortAsc ? false : true;
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            if ($this->filterField and $this->filterValue) {
                $data = BiodataMahasiswa::where($this->filterField, $this->filterValue === 'yes' ? 1 : 0)->pluck('id');
            } else {
                $data = BiodataMahasiswa::search($this->search)->pluck('id');
            }

            if ($data) {
                $this->selected = $data;
            } else {
                $this->selected = BiodataMahasiswa::pluck('id');
            }
        } else {
            $this->selected = [];
        }
    }

    public function pushDatas()
    {
        $this->loading = true;

        if ($this->selectAll) {
            $this->updatedSelectAll($this->selectAll);
        }


        $idData = $this->selected;

        if (!$idData) {
            return back()->with('insertMessageWarning', 'Pilih data yang ingin di Push');
        }

        $responseSuccess = [];
        $responseError = [];

        $responseSuccessUpdate = [];
        $responseErrorUpdate = [];

        $dataFail = [];

        foreach ($idData as $id) {
            $data = BiodataMahasiswa::find($id);

            if ($data->id_neofeeder) {
                $response = MyClass::updateData($data->id_neofeeder, $data);

                if ($response['error_code'] !== 0) {
                    $responseErrorUpdate[] = [
                        'id' => $data->id,
                        'response' => $response,
                        'data' => $data
                    ];
                    // $responseErrorUpdate[] = $response;
                    // $responseErrorUpdate[] = $data;
                } else {
                    $responseSuccessUpdate[] = [
                        'id' => $data->id,
                        'response' => $response,
                        'id_mahasiswa' => $data->id_mahasiswa,
                        'id_neofeeder' => $data->id_neofeeder,
                        'nama_mahasiswa' => $data->nama_mahasiswa,
                    ];
                }
            } else {

                $response = MyClass::insertData($data);

                if ($response['error_code'] !== 0) {
                    $responseError[] = [
                        'id' => $data->id,
                        'response' => $response,
                        'data' => $data
                    ];
                } else {
                    $responseSuccess[] = [
                        'id' => $data->id,
                        'response' => $response,
                        'id_mahasiswa' => $data->id_mahasiswa,
                        'nama_mahasiswa' => $data->nama_mahasiswa,
                    ];

                    BiodataMahasiswa::where('id', $id)->update([
                        'id_neofeeder' => $response['data']['id_mahasiswa'],
                        'sudah_sync' => true
                    ]);
                }
            }


            if ($response['error_code'] !== 0) {
                $dataFail[] = [
                    'response' => $response['error_desc'],
                    'data' => collect($data)
                ];
            }
        }

        // dd(collect($dataFail)[0]['data']['id_mahasiswa']);

        if ($responseSuccess) {
            Log::info('InsertBiodataMahasiswa', [
                'user' => auth()->user(),
                'count' => count($responseSuccess),
                'response' => $responseSuccess,
            ]);
        }

        if ($responseError) {
            Log::error("InsertBiodataMahasiswa", [
                'user' => auth()->user(),
                'count' => count($responseError),
                'response' => $responseError,
            ]);
        }

        if ($responseSuccessUpdate) {
            Log::info('UpdateBiodataMahasiswa', [
                'user' => auth()->user(),
                'count' => count($responseSuccessUpdate),
                'response' => $responseSuccessUpdate,
            ]);
        }

        if ($responseErrorUpdate) {
            Log::error("UpdateBiodataMahasiswa", [
                'user' => auth()->user(),
                'count' => count($responseErrorUpdate),
                'response' => $responseErrorUpdate,
            ]);
        }

        return redirect(route('dashboard.biodata-mahasiswa'))->with([
            'message' => ($responseSuccess or $responseSuccessUpdate) ? 'Push Data Berhasil' : 'Gagal',
            'data' => $dataFail ? collect($dataFail) : false
        ]);

        // dd($key);
        $this->loading = false;
    }
}
