<?php

namespace App\Console\Commands;

use Feeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FeederConnect extends Command
{
    use Feeder;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeder:connect {host} {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat koneksi ke feeder';

    private function connect(){
        $request=Http::post($this->feederHost.$this->wsURL,
        [
            'act'=>'GetToken',
            'username'=>$this->userName,
            'password'=>$this->password

        ]);
        return $request->object();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->feederHost=$this->argument('host');
        $this->userName=$this->argument('username');
        $this->password=$this->argument('password');

        $result=$this->connect();

        $this->info($result->data->token);

        return Command::SUCCESS;
    }
}
