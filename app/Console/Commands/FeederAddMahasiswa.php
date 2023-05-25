<?php

namespace App\Console\Commands;

use Feeder;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class FeederAddMahasiswa extends Command
{
    use Feeder;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeder:addmahasiswa
                                                {nama_mahasiswa : nama lengkap mahasiswa}
                                                {jenis_kelamin}
                                                {tempat_lahir}
                                                {tanggal_lahir}
                                                {id_agama}
                                                {nik}
                                                {nisn}
                                                {kewarganegaraan}
                                                {kelurahan}
                                                {id_wilayah}
                                                {penerima_kps}
                                                {nama_ibu_kandung}
                                                {--host=}
                                                {--token=}';

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
        $this->feederHost=$this->option('host');

        $this->feederToken=$this->option('token');

        $ibm=$this->makeRequest('InsertBiodataMahasiswa');
        if(isset($ibm->error_code)){
            $this->error($ibm->error_desc);
            return Command::FAILURE;
        }
        dd($ibm);

        return Command::SUCCESS;
    }
}
