<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // To display data to the user into the table
    public function index(){
        $student = Student::all();
        return view('student.index',compact('student'));
    }


    // To insert data into the database
    // --------------------------------------
    // This is only for display form to user
    public function create()
    {
        return view('student.create');
    }

    // This do all insert operations to store data into the database
    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->save();
        return redirect()->back()->with('status','Student Added Successfully');
    }

    // To upadte the data 
    // -------------------------------------
    // To display data inside of update form
    public function edit($id){
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }
    // To do all update operations
    public function update(Request $request, $id){
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->course = $request->input('course');
        $student->section = $request->input('section');
        $student->update();
        return redirect()->back()->with('status','Student Updated Successfully');
    }

    // To delete data 
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }
}