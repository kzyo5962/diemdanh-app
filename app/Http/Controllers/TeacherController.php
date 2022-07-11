<?php

namespace App\Http\Controllers;

use App\Constants\SubjectConstant;
use App\Constants\TitleConstant;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Supervisor;
use Brian2694\Toastr\Facades\Toastr;

class TeacherController extends Controller
{
    const TITLE = TitleConstant::TEACHER;
    const SUBJECT = SubjectConstant::TEACHER;

    protected $title;
    protected $subject;

    public function __construct()
    {
        $this->title = self::TITLE;
        $this->subject = self::SUBJECT;
    }

    public function index()
    {
        $teachers = Teacher::with('supervisor')->latest('id')->get();
        return view('teachers.index', [
            'teachers' => $teachers,
            'title' => $this->title,
            'subject' => $this->subject
        ]);
    }

    public function create()
    {
        $supervisors = Supervisor::select(['id', 'fullName'])->get();
        return view('teachers.create', [
            'supervisors' => $supervisors,
            'subject' => $this->subject,
        ]);
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create($request->except(['_token']));
        Toastr::success('Tạo ' . $this->subject . ' mới thành công', 'Success');
        return redirect()->route('teachers.index');
    }

    public function show(Teacher $teacher)
    {
        return $teacher;
    }

    public function edit(Teacher $teacher)
    {
        $supervisors = Supervisor::select(['id', 'fullName'])->get();
        return view('teachers.edit', [
            'teacher' => $teacher,
            'supervisors' => $supervisors,
            'subject' => $this->subject,
        ]);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->except(['_token', '_method']));
        $message = "Cập nhật $this->subject mới thành công";
        Toastr::success($message, 'Success');
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $message = "Xóa $this->subject $teacher->fullName thành công";
        $teacher->delete();
        Toastr::success($message, 'Success');
        return redirect()->route('teachers.index');
    }
}
