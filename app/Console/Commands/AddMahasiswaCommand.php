<?php

namespace App\Console\Commands;

use App\Models\Agama;
use App\Models\Mahasiswa;
use App\Models\Negara;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class AddMahasiswaCommand extends Command
{
    public $nama_mahasiswa;
    public $jenis_kelamin;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $id_agama;
    public $nik;
    public $nisn;
    public $kewarganegaraan;
    public $jalan;
    public $dusun;
    public $rt;
    public $rw;
    public $kelurahan;
    public $kode_pos;
    public $id_wilayah;
    public $penerima_kps;
    public $nama_ibu_kandung;
    public $id_kebutuhan_khusus_mahasiswa;
    public $id_kebutuhan_khusus_ayah;
    public $id_kebutuhan_khusus_ibu;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'mahasiswa:create {nama_mahasiswa : nama lengkap mahasiswa}
                                             {jenis_kelamin}
                                             {tempat_lahir}
                                             {tanggal_lahir}
                                             {agama}
                                             {nik}
                                             {nisn}
                                             {kewarganegaraan}
                                             {jalan}
                                             {dusun}
                                             {rt}
                                             {rw}
                                             {kelurahan}
                                             {kode_pos}
                                             {id_wilayah}
                                             {penerima_kps}
                                             {nama_ibu_kandung}
                                             {id_kebutuhan_khusus_mahasiswa}
                                             {id_kebutuhan_khusus_ayah}
                                             {id_kebutuhan_khusus_ibu}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat mahasiswa baru';

    /**
     * Execute the console command.
     *
     * @return int
     */

    public function create(){

        $mhs=Mahasiswa::create([
            "nama_mahasiswa"=>$this->nama_mahasiswa,
            "jenis_kelamin"=>$this->jenis_kelamin,
            "tempat_lahir"=>$this->tempat_lahir,
            "tanggal_lahir"=>$this->tanggal_lahir,
           "id_agama"=>$this->id_agama,
            "nik"=>$this->nik, //: "1671100404990003",
            "nisn"=>$this->nisn,//: "9968331409",
            "kewarganegaraan"=>$this->kewarganegaraan,// "ID",
            "jalan"=>$this->jalan,// "ID",
            "dusun"=>$this->dusun,// "ID",
            "rt"=>$this->rt,// "rt",
            "rw"=>$this->rw,// "",
            "kelurahan"=>$this->kelurahan, //: "KALIDONI",
            "kode_pos"=>$this->kode_pos, //: "KALIDONI",
            "id_wilayah"=>$this->id_wilayah,//: "999999",
            "penerima_kps"=>$this->penerima_kps,//: "0: Bukan penerima KPS, 1: Penerima KPS",
            "nama_ibu_kandung"=>$this->nama_ibu_kandung,//: "HUSIAH"
            "id_kebutuhan_khusus_mahasiswa"=>$this->id_kebutuhan_khusus_mahasiswa,
            "id_kebutuhan_khusus_ayah"=>$this->id_kebutuhan_khusus_ayah,
            "id_kebutuhan_khusus_ibu"=>$this->id_kebutuhan_khusus_ibu
        ]);
        return $mhs;
    }

    public function getParam(){
       // return json_encode($this,true);
       return get_object_vars($this);
    }

    private function castAgama($value){
        if(is_string($value)){
            $agama=Agama::where('nama_agama',$value)->first();
            return $agama->id_agama;
        }
        return $value;
    }

    private function castKewargaNegaraan($value){
        if(is_string($value)){
            $ret=Negara::where('nama_negara',$value)->first();
            return $ret->id_negara;
        }
        return $value;
    }

    private function castWilayah($value){
        if(is_string($value)){
            $ret=Negara::where('nama_wilayah',$value)->first();
            return $ret->id_negara;
        }
        return $value;
    }

    public function initParam(){


        $this->nama_mahasiswa=$this->argument('nama_mahasiswa');
        $this->jenis_kelamin=$this->argument('jenis_kelamin');
        $this->tempat_lahir=$this->argument('tempat_lahir');
        $this->tanggal_lahir=$this->argument('tanggal_lahir');
        $this->id_agama=$this->castAgama($this->argument('agama'));
        $this->nik=$this->argument('nik');
        $this->nisn=$this->argument('nisn');
        $this->kewarganegaraan=$this->castKewargaNegaraan($this->argument('kewarganegaraan'));
        $this->jalan=$this->argument('jalan');
        $this->dusun=$this->argument('dusun');
        $this->rt=$this->argument('rt');
        $this->rw=$this->argument('rw');
        $this->kelurahan=$this->argument('kelurahan');
        $this->kode_pos=$this->argument('kode_pos');
        $this->id_wilayah=$this->argument('id_wilayah');
        $this->penerima_kps=$this->argument('penerima_kps');
        $this->nama_ibu_kandung=$this->argument('nama_ibu_kandung');
        $this->id_kebutuhan_khusus_mahasiswa=$this->argument('id_kebutuhan_khusus_mahasiswa');
        $this->id_kebutuhan_khusus_ayah=$this->argument('id_kebutuhan_khusus_ayah');
        $this->id_kebutuhan_khusus_ibu=$this->argument('id_kebutuhan_khusus_ibu');

        /*         $validator=Validator::make($this->arguments(),[
            'nama_mahasiswa' => 'min:3',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir'=> 'required|date',

        ]); */
    }
    public function handle()
    {
        $this->initParam();

        $mhs=$this->create();

        if($mhs){
            return Command::SUCCESS;
        }
    }
}
