<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Location;


class Schedule extends Model
{
    use HasFactory;

    public function shift(){
        return $this->belongsTo(Shifts::class,'shift_id','id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

    public function location(){
        return $this->belongsTo(Location::class,'location_id','id');
    }

}
