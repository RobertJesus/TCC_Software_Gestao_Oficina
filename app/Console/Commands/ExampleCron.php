<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Automobile;

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
        $date = data('d/m/y');
        $auto = Automobile::where('dateReview', '=', $date)->get();
        foreach($auto as $data){
            $id = $data['client'];
        }
        $client = Client::where('name', '=', $id)->get();
        
        foreach($auto as $data){
            $msg = $data['phoneP'];
        }

        $msg['num'] = $client['phoneP'];
        $msg['msg'] = ('A revisão do seu veiculo esta proximo fique atento e agende uma visita em nossa oficina!!!');
            
        Nexmo::message()->send([
            'to'   => $msg['num'],
            'from' => '16105552344',
            'text' => $msg['msg'],
        ]);
    }
}
