<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Retrieve function
    public function index() {
        $students = \App\Models\Student::all();
        return view('student.index')->with('students', $students);
    }
  
    // Insert function
    public function insert() {
        $student = new Student;
        $student->first_name = "John";
        $student->last_name = "Doe";
        $student->rank = 1;
        $student->save();
        toastr()->info("Insert Successful!");
    }
      
    // Update function
    public function update() {
        $student = \App\Models\Student::find(1);
        $student->rank = 2;
        $student->save();
        toastr()->info("Update Successful!");
    }
      
    // Delete function
    public function delete() {
        $student = \App\Models\Student::find(1);
        $student->delete();
        toastr()->info("Delete Successful!");
    }
}