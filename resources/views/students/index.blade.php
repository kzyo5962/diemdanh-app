@extends('layout.main')
@section('content')
    <div class="container-fluid">
        @if ($title)
            <h1 class="h3 mb-3 text-gray-800">{{ $title }}</h1>
        @endif
        <a class="btn btn-success mb-4" href="{{ route('students.create') }}">
            <span class="icon text-white-100"><i class="fas fa-plus"></i></span>
            Tạo {{ $subject }} mới
        </a>
        <a class="btn btn-success mb-4" href="{{ route('students.export') }}">
            <span class="icon text-white-100"><i class="fas fa-table"></i></span>
            Xuất file điểm danh
        </a>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Lớp học</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->fullName }}</td>
                                    <td>{{ $student->birthDt }}</td>
                                    <td>{{ $student->phoneNumber }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        @if ($student->status == 'Đang theo học')
                                            <div class="btn btn-info">{{ $student->status }}</div>
                                        @elseif ($student->status == 'Đình chỉ')
                                            <div class="btn btn-warning">{{ $student->status }}</div>
                                        @else
                                            <div class="btn btn-danger">{{ $student->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $student->classroom->name }}</td>
                                    <td>
                                        <a href="" data-toggle="tooltip" title="Cảnh báo đình chỉ"
                                            class="btn btn-warning"><i class="fas fas fa-exclamation-triangle"></i></a>
                                        <a href="" data-toggle="tooltip" title="Quyết định thôi học"
                                            class="btn btn-secondary"><i class="fas fas fa-minus-circle"></i></a>
                                        <a href="{{ route('students.edit', ['student' => $student]) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deletedStudentModal"
                                            data-toggle="tooltip" title="Xóa {{ $student->id }}"
                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        @include('students.delete-modal')
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
@endsection
