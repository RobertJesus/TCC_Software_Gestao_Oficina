<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Automobile;
use App\Models\client;
use Nexmo\Laravel\Facade\Nexmo;

class ExampleCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command SMS';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = date('Y-m-d');
        $auto = Automobile::where('dateReview', '=', $date)->get();
        foreach($auto as $data){
            $id = $data['client'];
        }
        $client = Client::where('name', '=', $id)->get();
        
        foreach($auto as $data){
            $msg['id'] = $data['id'];
            $msg['num'] = $data['phoneP'];
        }

        $msg['msg'] = ('A revisao do seu veiculo esta proximo fique atento e agende uma visita em nossa oficina!!!');
            
        Nexmo::message()->send([
            'to'   => 5519991210699,//$msg['num'],
            'from' => '16105552344',
            'text' => $msg['msg'],
        ]);
    }
}
