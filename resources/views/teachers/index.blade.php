@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">{{ $title }}</h1>
        <a class="btn btn-success mb-4" href="{{ route('teachers.create') }}">
            <span class="icon text-white-100"><i class="fas fa-plus"></i></span>
            Tạo {{ $subject }} mới
        </a>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Giáo vụ quản lý</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->id }}</td>
                                    <td>{{ $teacher->fullName }}</td>
                                    <td>{{ $teacher->phoneNumber }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>
                                        @if ($teacher->status == 'Đang công tác')
                                            <div class="btn btn-info">{{ $teacher->status }}</div>
                                        @elseif ($teacher->status == 'Đình chỉ')
                                            <div class="btn btn-warning">{{ $teacher->status }}</div>
                                        @elseif ($teacher->status == 'Vắng')
                                            <div class="btn btn-secondary">{{ $teacher->status }}</div>
                                        @else
                                            <div class="btn btn-danger">{{ $teacher->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $teacher->supervisor->fullName }}</td>
                                    <td>
                                        <a href="{{ route('teachers.edit', ['teacher' => $teacher]) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deletedteacherModal"
                                            data-toggle="tooltip" title="Xóa {{ $teacher->id }}"
                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        @include('teachers.delete-modal')
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
