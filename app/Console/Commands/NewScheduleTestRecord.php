<?php

namespace App\Console\Commands;

use App\Http\Controllers\SchedulerTestController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class NewScheduleTestRecord extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NewTestRecord';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание новой записи в таблице Scheduler_test';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        App('App\Http\Controllers\SchedulerTestController')->addRow();
        return Command::SUCCESS;
    }
}
