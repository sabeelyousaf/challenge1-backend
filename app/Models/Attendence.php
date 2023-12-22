<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Schedule;
use App\Models\Employee;

class Attendence extends Model
{
    use HasFactory;
    public $table="attendence";

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class,'schedule_id','id');
    }
    protected $fillable = [
        'name',
        'check_in',
        'check_out',
        'working_hours',

    ];

}
