@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Quản lý Học viên</h1>
        <a class="btn btn-success mb-4" href="{{ route('students.create') }}">
            <span class="icon text-white-100"><i class="fas fa-plus"></i></span>
            Tạo học viên mới
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
                                    <td>{{ $student->class_id }}</td>
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
