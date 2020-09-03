<?php

namespace App\Http\Controllers\admin;
use App\Events\onAddSubjectEvent;
use App\Http\Controllers\Controller;
use App\Subject;
use App\Student;
use Event;
use Log;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::cursor();

        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $students = Student::pluck('name', 'id');
        return view('admin.subjects.create', compact('students'));
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
            "name_en" => 'max:191',
            "name_ru" => 'max:191',
            'email' => 'email:filter|unique:students'
        ]);
        $data = $request->all();
        unset($data["students_id"]);
        $model = new Subject();
        $model = $model->create($data);
        $model->students()->sync($request->students_id);
//        event(new onAddSubjectEvent($model, auth()->user()));
        Log::channel('custom_subject')->debug('Subject added (debug)', $model->toArray());
        Log::channel('custom_subject')->emergency('Subject added (emergency)', $model->toArray());
        Log::channel('custom_subject')->alert('Subject added (alert)', $model->toArray());
        Log::channel('custom_subject')->critical('Subject added (critical)', $model->toArray());
        Log::channel('custom_subject')->error('Subject added (error)', $model->toArray());
        Log::channel('custom_subject')->warning('Subject added (warning)', $model->toArray());
        Log::channel('custom_subject')->notice('Subject added (notice)', $model->toArray());
        Log::channel('custom_subject')->info('Subject added (info)', $model->toArray());
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        $students = Student::pluck('name', 'id');
        return view('admin.subjects.edit', compact('subject', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $this->validate($request, [
            "name_en" => 'max:191',
            "name_ru" => 'max:191',
            'email' => 'email:filter|unique:students'
        ]);
        $data = $request->all();
        unset($data["students_id"]);
        $subject->update($data);
//        $subject->students()->detach();
        $subject->students()->sync($request->students_id, true);
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        return redirect()->back();
    }
}
