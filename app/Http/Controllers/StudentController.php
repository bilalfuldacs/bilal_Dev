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
    {//inserting data
        student::create($req->all());

        //update function dummy test for given input also
        Student::where('name', $req['name'])->update(['email' => $req['email']]);
        //deleting data
        student::where('name', $req['name'])->delete();
        //getting data
        $student=student::all();
        return view('home', compact('student'))->with('success', 'data is sucessfully added');
    }
}