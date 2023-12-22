<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\AttendanceImport;
use App\Models\Attendence;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
class AttendenceController extends Controller
{
    public function uploadAttendance(Request $request)
    {
        // Validate the incoming request with file upload rules
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048', // Adjust max file size if needed
        ]);

        // Check if the file exists in the request
        if ($request->hasFile('file')) {

            try {
                $file = $request->file('file');

                // Import the Excel file using Maatwebsite\Excel
                $import = new AttendanceImport();

                Excel::import($import, $file);


                return response()->json(['message' => 'Attendance data imported successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => 'Failed to import attendance data'], 500);
            }
        }

        return response()->json(['error' => 'File not found'], 400);
    }
    public function getEmployeeAttendance($employee_id)
    {

        $attendances = Attendence::where('employee_id', $employee_id)->get();


        $totalWorkingHours = 0;

        foreach ($attendances as $attendance) {
            $startTime = Carbon::parse($attendance->start_time);
            $endTime = Carbon::parse($attendance->end_time);


            $workingHours = $endTime->diffInHours($startTime);


            $totalWorkingHours += $workingHours;
        }

        return response()->json([
            'employee_id' => $employee_id,
            'attendance' => $attendances,
            'total_working_hours' => $totalWorkingHours
        ]);
    }
    public function viewAttendence($id){
        $data= Attendence::with('employee')->where('employee_id',$id)->get();
        return response()->json($data);
    }
    public function showAttendance(){
        $data= Attendence::with('employee')->get();
        return response()->json($data);
    }
}
