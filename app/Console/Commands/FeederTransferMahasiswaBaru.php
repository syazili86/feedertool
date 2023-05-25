<?php

namespace App\Console\Commands;

use Feeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class FeederTransferMahasiswaBaru extends Command
{
    use Feeder;

    public $csvSoruce='import.csv';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeder:transfermhs {--host=} {--username=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //inisialisasi variable
        $this->feederHost=$this->option('host');
        $this->userName = (empty($this->option('username')) ? $this->ask('feeder username? ') : $this->option('username'));
        $this->password = (empty($this->option('password')) ? $this->secret('feeder password ? ') : $this->option('password'));

        // buat koneksi ke feeder
        $koneksi=$this->connect();

        $this->feederToken=$koneksi->data->token;
        $this->info($this->feederToken);
        // baca csv;
        $file = fopen(Storage::path($this->csvSoruce), 'r');
        $row=[];
        $i=0;
        while ( $data = fgetcsv($file,null,',')) {
            // clean space on data

            if($i>0) $row[]=$this->cleanData($data);
            $i++;
        }

        for($x=0;$x<count($row);$x++){

            // cari mahasiswa
            $mhs=$this->feederRead('GetBiodataMahasiswa',['filter'=>"nik like '".$row[$x][0]."'"]);
            //$mhs=$this->feederRead('GetBiodataMahasiswa',['filter'=>"nik like 'xxxx'"]);

            //jika data mhs tidak ditemukan, insert
            if(empty($mhs->data)){

                // insert mahasiswa
                $rec=$this->makeRequest('InsertBiodataMahasiswa',[
                    'nik'=>$row[$x][0],
                    'nama_mahasiswa'=>$row[$x][1],
                    'jenis_kelamin'=>$row[$x][2],
                    'tempat_lahir'=>$row[$x][3],
                    'tanggal_lahir'=>$row[$x][4],
                    'id_agama'=>$row[$x][5],
                    'nisn'=>$row[$x][6],
                    'kewarganegaraan'=>$row[$x][7],
                    'kelurahan'=>$row[$x][8],
                    'id_wilayah'=>$row[$x][9],
                    'nama_ibu_kandung'=>$row[$x][10],
                ]);

                if($rec->error_code>0){

                    $this->error('gagal insert biodata '.$rec->error_desc." nik :".$row[$x][0]);

                }
                // cari mahasiswa
                $mhs=$this->feederRead('GetBiodataMahasiswa',['filter'=>"nik like '".$row[$x][0]."'"]);
            }else{
                $this->info('mhs ditemukan'.json_encode($mhs->data));

                // update mahasiswa
                $rec=$this->makeRequest('UpdateBiodataMahasiswa',[
                    'nama_mahasiswa'=>$row[$x][1],
                    'jenis_kelamin'=>$row[$x][2],
                    'tempat_lahir'=>$row[$x][3],
                    'tanggal_lahir'=>$this->convertDate($row[$x][4]),
                    'id_agama'=>$row[$x][5],
                    'nisn'=>$row[$x][6],
                    'kewarganegaraan'=>$row[$x][7],
                    'kelurahan'=>$row[$x][8],
                    'id_wilayah'=>$row[$x][9],
                    'nama_ibu_kandung'=>$row[$x][10],
                ],
                [
                    'id_mahasiswa'=>$mhs->data[0]->id_mahasiswa
                ]);
            }

            // cari riwayat pendidikan
            $ibm=$this->feederRead('GetListRiwayatPendidikanMahasiswa',['filter'=>"nim like '".$row[$x][0]."'"]);

            //jika riwayat pendidikan kosong
            if(empty($ibm->data) && !empty($mhs->data[0]->id_mahasiswa)){
                $param=[
                    "id_mahasiswa"=> $mhs->data[0]->id_mahasiswa,
                    "nim"=> $row[$x][11],
                    "id_jenis_daftar" => $row[$x][12],
                    "id_jalur_daftar" => $row[$x][13],
                    "id_periode_masuk" => $row[$x][14],
                    "tanggal_daftar" => $this->convertDate($row[$x][15]),
                    "id_perguruan_tinggi" => $row[$x][16],
                    "id_prodi"=> $row[$x][17],
                    "id_bidang_minat"=> $row[$x][18],
                    "sks_diakui"=> $row[$x][19],
                    "id_perguruan_tinggi_asal"=> $row[$x][20],
                    "nama_perguruan_tinggi_asal"=> $row[$x][21],
                    "id_prodi_asal" => $row[$x][22],
                    "nama_prodi_asal"=> $row[$x][23],
                    "id_pembiayaan" => $row[$x][24],
                    "biaya_masuk" => $row[$x][25]
                ];
                //dd($param);

                // insert riwayat pendidikan
                $rec=$this->makeRequest('InsertRiwayatPendidikanMahasiswa',$param);

                if($rec->error_code>0){
                    $this->error($rec->error_desc);
                    //return Command::FAILURE;
                }

            } // jika riwayat ada
            else{
                $this->info("riwayat ditemukan".$row[$x][11]);

            }
            $this->info("sukses transfer".$row[$x][11]);

        }



        return Command::SUCCESS;
    }
    public function initParam(){

    }
}
