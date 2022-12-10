<?php

namespace App\Http\Livewire;

use App\Models\AttendanceList;
use App\Models\Student;
use App\Models\StudentAssistance;
use Livewire\Component;

class AssistanceList extends Component
{
    public $attendaceId;
    public $students;

    public function mount($attendanceList)
    {
        $this->attendaceId = $attendanceList->id;
        $this->students = $attendanceList->group->students;
    }

    public function changeText($classHourId, $studentId, $value)
    {
        $studentAssistance = StudentAssistance::where('class_hour_id', $classHourId)->where('student_id', $studentId)->first();
        if ($studentAssistance != null) {
            $studentAssistance->status = $value;
            $studentAssistance->save();
        } else {
            Student::find($studentId)->assistances()->create([
                'class_hour_id' => $classHourId,
                'status' => $value
            ]);
        }
    }

    public function render()
    {
        $attendanceList = AttendanceList::find($this->attendaceId);
        return view('livewire.assistance-list', ['attendanceList' => $attendanceList]);
    }
}
