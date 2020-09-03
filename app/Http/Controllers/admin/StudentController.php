<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Student;
use App\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::pluck('name_en', 'id');
        return view('admin.students.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
           "name" => 'max:191|required',
            'email' => 'email:filter|unique:students',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $data = $request->all();
        $data["password"] = Hash::make($request->password);
        unset($data["subjects_id"]);
        unset($data["password_confirmation"]);
        $model = new Student();
        $model = $model->create($data);
        $model->subjects()->sync($request->subjects_id);
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        $subjects = Subject::pluck('name_en', 'id');
        return view('admin.students.edit', compact('subjects', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $this->validate($request, [
            "name" => 'max:191|required',
            'email' => 'email:filter|unique:students,email,'.$student->id
        ]);
        $data = $request->all();
        unset($data["subjects_id"]);
        $student->update($data);
        $student->subjects()->sync($request->subjects_id);
        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('student.index');
    }
}
