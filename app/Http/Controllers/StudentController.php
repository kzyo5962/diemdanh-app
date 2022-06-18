<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Brian2694\Toastr\Facades\Toastr;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use Carbon\Carbon;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('classroom')->orderBy('id', 'asc')->get();
        return view('students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', [
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student();
        $student->fullName = $request->fullName;
        $student->birthDt = $request->birthDt;
        $student->phoneNumber = $request->phoneNumber;
        $student->email = $request->email;
        $student->class_id = $request->class_id;
        $student->save();
        Toastr::success('Tạo học viên mới thành công', 'Success');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        return view('students.edit', [
            'student' => $student,
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->fullName = $request->fullName;
        $student->birthDt = $request->birthDt;
        $student->phoneNumber = $request->phoneNumber;
        $student->email = $request->email;
        $student->class_id = $request->class_id;
        $student->status = $request->status;
        $student->update();
        Toastr::success('Cập nhật học viên mới thành công', 'Success');
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $message = "Xóa học viên $student->fullName thành công";
        $student->delete();
        Toastr::success($message, 'Success');
        return redirect()->route('students.index');
    }

    public function export()
    {
        $dt = Carbon::now();
        $prefix_excel = $dt->toDateString();
        return Excel::download(new StudentsExport, $prefix_excel . '_diemdanh.xlsx');
    }
}
