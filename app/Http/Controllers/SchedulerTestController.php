<?php

namespace App\Http\Controllers;

use App\Models\Scheduler_test;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SchedulerTestController extends Controller
{
    public function index(){

        $rows = Scheduler_test::whereDate('created_at',now())->get();
        foreach ($rows as $row){
            dump($row->desc);
        }
    }

    public function addRow(){

        Scheduler_test::create([
            'desc' => 'Запись №'.count(Scheduler_test::withTrashed()->where('is_itog',false)->get())+1,
            'is_itog' => false,
        ]);
    }

    public function deleteRows(){
        $rows = Scheduler_test::whereDate('created_at',now()->subDay()->format('Y-m-d'))->Where(['is_itog' => false])->get();
        foreach ($rows as $row){
            $row->delete();
        }
        if(count($rows)!=0){
            $this->generateItog();
        }
    }

    public function generateItog(){
        $deleted_models = Scheduler_test::withTrashed()->whereDate('deleted_at',now()->format('Y-m-d'))->Where('is_itog',false)->get();
        $model_itog = Scheduler_test::whereDate('created_at',now()->format('Y-m-d'))->Where('is_itog',true)->first();
        if(is_null($model_itog)){
            Scheduler_test::create([
                'desc' => 'За '.now()->subDay()->format('d.m.Y').' удалено '.count($deleted_models).' записей',
                'is_itog' => true,
            ]);
        }else{
            $model_itog->update([
                'desc' => 'За '.now()->subDay()->format('d.m.Y').' удалено '.count($deleted_models).' записей',
            ]);
        }
//        dump('сформирован итог');
    }
}
