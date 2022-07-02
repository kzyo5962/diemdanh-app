@php
const ADMIN = 1;
const SUPERVISOR = 2;
const TEACHER = 3;
const STUDENT = 4;
@endphp
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">J2TEAM NNL<sup>27</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        Quản lý
    </div>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('roles.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Vai trò</span></a>
    </li>

    @if (auth()->user()->role_id == ADMIN)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span></a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route('classrooms.index') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Lớp học</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('teachers.index') }}">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Giảng viên</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('students.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Học viên</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('students.index') }}">
            <i class="fa-solid fa-calendar-check"></i>
            <span>Điểm danh</span>
        </a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
