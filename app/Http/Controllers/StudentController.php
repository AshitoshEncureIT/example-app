<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;

class StudentController extends Controller
{
    public function index()
    {
        // echo 'hi';die;
        $students = Students::all();
        // print_r($students);die;
        return view('student/students', ['students'=>$students]);
    }

    public function add_student_form()
    {
        return view('student/add_student');
        
    }

    public function add_student(Request $request)
    {
        // print_r($request->student_name);die;
        $student = new students();

        $student->name = $request->student_name;
        $student->phone_number = $request->phone_number;
        $student->email = $request->email;
        $student->country = $request->country;
        $student->country_code = $request->country_code;

        $validatedData = $request->validate([
         'profile_image' => 'image|mimes:jpg,JPG,png,PNG,jpeg,JPEG,gif,GIF,svg,SVG|max:2048',
 
        ]);

        $file      = $request->file('profile_image');
        $filename  = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path('images'), $filename);

        $student->profile_image = "images/".$filename;
        
        // print_r($student);die;
        $student->save();
        return redirect('/student')->with('message', 'Student Added Successfully');
    }

    public function edit_student_form($id)
    {
        $student = Students::findOrFail($id);

        
        // echo $student->id;
        return view('student/edit_student', ['student'=>$student]);
    }

    public function update_student(Request $request)
    {
        $student = Students::find($request->id);

        $old_image = $student->profile_image;

        $student->name = $request->student_name;
        $student->country_code = $request->country_code;
        $student->phone_number = $request->phone_number;
        $student->email = $request->email;
        $student->country = $request->country;

        $validatedData = $request->validate([
         'profile_image' => 'image|mimes:jpg,JPG,png,PNG,jpeg,JPEG,gif,GIF,svg,SVG|max:2048',
 
        ]);

        $file      = $request->file('profile_image');
        $filename  = $file->getClientOriginalName();
        $filename = time().'_'.$filename;
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path('images'), $filename);

        $student->profile_image = "images/".$filename;
        $student->save();

        if (!empty($old_image)) {
            unlink(public_path($old_image));
        }

        return redirect('/student')->with('message', 'Student Updated Successfully');
    }

    public function delete_student($id)
    {
        $student = Students::find($id);
        $student->delete();

        return redirect('/student');
    }
}
