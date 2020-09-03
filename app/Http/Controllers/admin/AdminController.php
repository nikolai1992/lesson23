<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;
use DB;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.main');
    }
    public function rating()
    {
        $subjects = Subject::all();
        return view('admin.rating.index', compact('subjects'));
    }
    public function update_rating(Request $request)
    {
        $this->validate($request, [
            'rating' => 'numeric'
        ]);
        DB::table('student_subject')->where('student_id', $request->student_id)->where('subject_id', $request->subject_id)->update(['rating'=> $request->rating]);
        return redirect()->back();
    }
}
