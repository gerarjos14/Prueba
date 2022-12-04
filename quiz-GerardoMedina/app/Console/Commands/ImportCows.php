<?php

namespace App\Console\Commands;

use App\Models\Vaca;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportCows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buy of cows for the bussiness';

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
     * @return int
     */
    public function handle()
    {
        $cows = Vaca::where('truck_id', null)->count();

        if($cows <= 5){
            $newCows = Vaca::factory(20)->create();

            if($newCows){
                return Log::info('Yes bro');
            }
        }
    }
}
