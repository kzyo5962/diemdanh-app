<?php

namespace App\Http\Controllers;

use App\Constants\SubjectConstant;
use App\Constants\TitleConstant;
use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    const TITLE = TitleConstant::CLASSROOM;
    const SUBJECT = SubjectConstant::CLASSROOM;

    protected $title;
    protected $subject;

    public function __construct()
    {
        $this->title = self::TITLE;
        $this->subject = self::SUBJECT;
    }

    public function index()
    {
        $classrooms = Classroom::latest('id')->get();
        return view('classrooms.index', [
            'classrooms' => $classrooms,
            'title' => $this->title,
            'subject' => $this->subject,
        ]);
    }


    public function create()
    {
        //
    }


    public function store(StoreClassroomRequest $request)
    {
        //
    }


    public function show(Classroom $classroom)
    {
        //
    }


    public function edit(Classroom $classroom)
    {
        //
    }


    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        //
    }


    public function destroy(Classroom $classroom)
    {
        //
    }
}
