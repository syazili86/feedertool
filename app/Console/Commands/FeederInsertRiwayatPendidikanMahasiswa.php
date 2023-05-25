<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FeederInsertRiwayatPendidikanMahasiswa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeder:insertriwayatpendidikanmahasiswa
                                    {id_mahasiswa}
                                    {nim}
                                    {id_jenis_daftar}
                                    {id_jalur_daftar}
                                    {id_periode_masuk}
                                    {tanggal_daftar}
                                    {id_perguruan_tinggi}
                                    {id_prodi}
                                    {id_bidang_minat}
                                    {sks_diakui}
                                    {id_perguruan_tinggi_asal}
                                    {id_prodi_asal}
                                    {nama_prodi_asal}
                                    {id_pembiayaan}
                                    {biaya_masuk}';

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
