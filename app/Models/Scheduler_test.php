<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheduler_test extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;
    protected $table = 'scheduler_tests';
    protected $guarded = [];
}
