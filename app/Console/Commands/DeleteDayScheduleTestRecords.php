<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteDayScheduleTestRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteDayRecordSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаление записей созданных за предыдущие сутки';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        App('App\Http\Controllers\SchedulerTestController')->deleteRows();
        return Command::SUCCESS;
    }
}
