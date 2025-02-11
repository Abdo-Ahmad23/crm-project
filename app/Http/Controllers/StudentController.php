<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('classroom')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        // dd($classrooms);
        return view('student.create', compact('classrooms'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3",
            "phone" => "required|unique:students,phone",
            "level" => "required|numeric",
            "dateofbirth" => "required|date",
            "address" => "required",
            "classroom_id" => "required|exists:classrooms,id",
            "image" => "mimes:jpg,jpeg,png,heic,gif|max:3000",
        ]);
        $student = $request->except('image');
        if ($request->hasFile('image')) {
            /// upload file -> change image name ->
            $image = $request->image;
            $oldimagename = $image->getClientOriginalName();
            $newimagename = uniqid() . $oldimagename;
            $image->move('images', $newimagename);

            $imgUrl = "images/$newimagename";
            $student['image'] = $imgUrl;
        } else {
            $student['image'] = 'data:image/jpeg;base64,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';

        }
        // return ('student.create');
        Student::create($student);
        // go to model / create / route index
        return redirect()->route('student.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $classrooms = Classroom::all();
        return view('student.edit', compact('classrooms', 'student'));

        // $classroom=Classroom::find($id);
        // return view('classroom.edit',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /// validation
        $request->validate([
            "name" => "required|min:3",
            "phone" => "required|unique:students,phone",
            "level" => "required|numeric",
            "dateofbirth" => "required|date",
            "address" => "required",
            "classroom_id" => "required|exists:classrooms,id",
            "image" => "mimes:jpg,jpeg,png,heic,gif|max:3000",
        ]);

        $student = $request->except('image');
        if ($request->hasFile('image')) {
            /// upload file -> change image name ->
            $image = $request->image;
            $oldimagename = $image->getClientOriginalName();
            $newimagename = uniqid() . $oldimagename;
            $image->move('images', $newimagename);

            $imgUrl = "images/$newimagename";
            $student['image'] = $imgUrl;
        }

        // return ('student.create');
        $mynewstudent = Student::find($id);
        $mynewstudent->update($student);
        // go to model / update / route index
        return redirect()->route('student.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find
        $student = Student::find($id);

        /// delete
        $student->delete();


        /// redirect
        return redirect(route('student.index'));

    }
}