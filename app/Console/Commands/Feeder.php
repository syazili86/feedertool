<?php

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

trait Feeder{
    public $feederHost;
    public $wsURL='/ws/live2.php';
    private $userName;
    private $password;
    private $feederToken;

    public function makeRequest($act,$record=null,$key=null){

        if(empty($key)){
            $param=array_merge(
                [
                    'act'=>$act,
                    'token'=>$this->feederToken,

                ],
                ['record'=>$record]
            );

        }else{

            $param=array_merge(
                [
                    'act'=>$act,
                    'token'=>$this->feederToken,

                ],
                ['key'=>$key],
                ['record'=>$record]
            );

        }
       // echo json_encode($param);
        try{
            $request=Http::post($this->feederHost.$this->wsURL,$param);

        }catch(ConnectionException $e){
            $this->error($e->getMessage());
            return false;
        }

        return $request->object();
    }
    public function update($act,$key=null,$record=null){

        $param=array_merge(
            [
                'act'=>$act,
                'token'=>$this->feederToken,

            ],
            ['record'=>$record]
        );

        try{
            $request=Http::post($this->feederHost.$this->wsURL,$param);

        }catch(ConnectionException $e){
            $this->error($e->getMessage());
            return false;
        }

        return $request->object();
    }
    public function feederRead($act,$readParameter=[]){

        $param=array_merge(
            [
                'act'=>$act,
                'token'=>$this->feederToken,

            ],$readParameter
        );
        try{
            $request=Http::post($this->feederHost.$this->wsURL,$param);

        }catch(ConnectionException $e){
            $this->error($e->getMessage());
            return false;
        }

        return $request->object();
    }

    private function connect(){
        $request=Http::post($this->feederHost.$this->wsURL,
        [
            'act'=>'GetToken',
            'username'=>$this->userName,
            'password'=>$this->password

        ]);
        return $request->object();
    }

    protected function convertDate($date){
        return \Carbon\Carbon::parse($date)->format('Y/m/d');
    }

    protected function cleanData($data){
        foreach($data as $k => $v){
           $res[]=trim($v);
        }
        return $res;
    }
}
