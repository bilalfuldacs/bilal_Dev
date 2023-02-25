<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return "i am here";
    }

    public function store(StudentRequest $req)
    {
        // //update function dummy test for given input also
        // Student::where('name', $req['name'])->update(['email' => $req['email']]);
        // //deleting data

        // dd(Student::onlyTrashed()->get()); // Retrieve all soft-deleted students
        student::where('name', $req['name'])->restore();
        //  student::where('name', $req['name'])->delete();

        $ext = $req->file('photo')->extension();
        $final_name = date('YmdHis').'.'.$ext;

        $req->file('photo')->move(public_path('uploads/'), $final_name);
        // inserting data
        $student = new Student();
        $student->Photo = $final_name;
        $student->name = $req->name;
        $student->email = $req->email;
        $student->save();
        //getting data
        $student=student::all();
        //update function dummy test for given input also
        Student::where('name', $req['name'])->update(['email' => $req['email'],'Photo'=>$final_name]);
        return view('home', compact('student'))->with('success', 'data is sucessfully added');
    }
}