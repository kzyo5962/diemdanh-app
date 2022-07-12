<?php

namespace App\Http\Controllers;

use App\Constants\SubjectConstant;
use App\Constants\TitleConstant;
use App\Models\Supervisor;
use App\Http\Requests\StoreSupervisorRequest;
use App\Http\Requests\UpdateSupervisorRequest;
use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;

class SupervisorController extends Controller
{
    const TITLE = TitleConstant::SUPERVISOR;
    const SUBJECT = SubjectConstant::SUPERVISOR;

    protected $title;
    protected $subject;

    public function __construct()
    {
        $this->title = self::TITLE;
        $this->subject = self::SUBJECT;
    }

    public function index()
    {
        $supervisors = Supervisor::with('admin')->latest('id')->get();
        return view('supervisors.index', [
            'supervisors' => $supervisors,
            'title' => $this->title,
            'subject' => $this->subject
        ]);
    }


    public function create()
    {
        $admins = Admin::select(['id', 'fullName'])->get();
        return view('supervisors.create', [
            'admins' => $admins,
            'subject' => $this->subject,
        ]);
    }


    public function store(StoreSupervisorRequest $request)
    {
        //
    }


    public function show(Supervisor $supervisor)
    {
        return $supervisor;
    }


    public function edit(Supervisor $supervisor)
    {
        $admins = Admin::select(['id', 'fullName'])->get();
        return view('supervisors.edit', [
            'supervisor' => $supervisor,
            'admins' => $admins,
            'subject' => $this->subject,
        ]);
    }


    public function update(UpdateSupervisorRequest $request, Supervisor $supervisor)
    {
    }


    public function destroy(Supervisor $supervisor)
    {
        $message = "Xóa $this->subject $supervisor->fullName thành công";
        $supervisor->delete();
        Toastr::success($message, 'Success');
        return redirect()->route('supervisors.index');
    }
}
