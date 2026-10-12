<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('student',['page'=>'form']);
    }
    public function show(Request $request){
        $name = $request->name;
        $course = $request->course;
        return view('student', ['page'=>'result',
         'name' => $name, 'course' => $course]);
    }

}