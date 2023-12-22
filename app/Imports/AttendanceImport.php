<?php

namespace App\Imports;
use App\Models\User;
use App\Models\Attendence;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Process and store attendance data
        return new Attendence([
            'name'     => $row[0],
            'check_in'    => $row[1],
            'check_out'    => $row[2],
            'working_hours'    => $row[2],
        ]);

    }
}


