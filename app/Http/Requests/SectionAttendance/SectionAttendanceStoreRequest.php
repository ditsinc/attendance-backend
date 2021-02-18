<?php

namespace App\Http\Requests\SectionAttendance;

use App\Section;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SectionAttendanceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $authorizedUser = Auth::user();

        if ($authorizedUser->role == 'TEACHER') {
            $section = $this->route('section');
            $section = Section::findOrFail($section);

            $authorizedTeacher = $authorizedUser->profile;

            if ($section->teacher->id == $authorizedTeacher->id)
                return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'students' => 'required|array|min:1',
            'students.*.id' => 'required|exists:students,id',
            'students.*.status' => 'required|in:PRESENT,ABSENT,EXCUSED',
        ];
    }
}