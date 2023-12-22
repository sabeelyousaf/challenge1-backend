<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Attendence;

class AttendenceFaults extends Model
{
    use HasFactory;

    public function employee(){
        return $this->belongsTo(Employee::class,'employee','id');
    }
    public function attendence(){
        return $this->belongsTo(Schedule::class,'attendence_id','id');
    }
}
