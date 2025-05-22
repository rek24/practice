<?php

namespace App\Http\Controllers;

use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\students;


class StudentsController extends Controller
{
    public function index()
    {   
        $students = students::get();

        return view ('students.index', compact('students'));
    }

    public function create()
    {
        return view ('students.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255|string',
        'lname' => 'required|max:255|string',
        'midname' => 'required|max:255|string',
        'age' => 'required|integer',
        'address' => 'required|max:255|string',
        'zip' => 'required|integer',
        
    ]);

    students::create($request->all());
    return view ('students.create');
    }

    public function edit( int $id)
    {
        $students = students::find($id);
        return view ('students.edit',compact('students'));
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|string',
                'lname' => 'required|max:255|string',
                'midname' => 'required|max:255|string',
                'age' => 'required|integer',
                'address' => 'required|max:255|string',
                'zip' => 'required|integer',
                
            ]);
        
            students::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Student Updated Successfully!');
            }
    }

    public function destroy(int $id){
        $students = students::findOrFail($id);
        $students->delete();
        return redirect ()->back()->with('status','Student Deleted');
    }
}