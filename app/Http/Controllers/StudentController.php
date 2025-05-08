<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function getStudents(){
        $students = Student::with('course', 'yearLevel', 'section')->get();

        return response()->json(['students' => $students]);
    }  

    public function addStudent(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'exists:courses,id'],
            'year_level_id' => ['required', 'exists:year_levels,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:20'],
        ]);

        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'course_id' => $request->course_id,
            'year_level_id' => $request->year_level_id,
            'section_id' => $request->section_id,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
        ]);

        return response()->json(['message' => 'Student added successfully', 'student' => $student]);
    }

    public function editStudent(Request $request, $id){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'course_id' => ['required', 'exists:courses,id'],
            'year_level_id' => ['required', 'exists:year_levels,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:20'],
        ]);

        $student = Student::find($id);

        if(!$student){
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'course_id' => $request->course_id,
            'year_level_id' => $request->year_level_id,
            'section_id' => $request->section_id,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
        ]);

        return response()->json(['message' => 'Student updated successfully', 'student' => $student]);
    }   

    public function deleteStudent($id){
        $student = Student::find($id);

        if(!$student){
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted successfully']);
    }
}
