@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">{{ $title }}</h1>
        <a class="btn btn-success mb-4" href="{{ route('supervisors.create') }}">
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
                                <th>Ca làm</th>
                                <th>Admin quản lý</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($supervisors as $supervisor)
                                <tr>
                                    <td>{{ $supervisor->id }}</td>
                                    <td>{{ $supervisor->fullName }}</td>
                                    <td>{{ $supervisor->phoneNumber }}</td>
                                    <td>{{ $supervisor->email }}</td>
                                    <td>
                                        @if ($supervisor->status == 'Đang công tác')
                                            <div class="btn btn-info">{{ $supervisor->status }}</div>
                                        @elseif ($supervisor->status == 'Đình chỉ')
                                            <div class="btn btn-warning">{{ $supervisor->status }}</div>
                                        @elseif ($supervisor->status == 'Vắng')
                                            <div class="btn btn-secondary">{{ $supervisor->status }}</div>
                                        @else
                                            <div class="btn btn-danger">{{ $supervisor->status }}</div>
                                        @endif
                                    </td>
                                    <td>{{ $supervisor->shift }}</td>
                                    <td>{{ $supervisor->admin->fullName }}</td>
                                    <td>
                                        <a href="{{ route('supervisors.edit', ['supervisor' => $supervisor]) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deletedsupervisorModal"
                                            data-toggle="tooltip" title="Xóa {{ $supervisor->id }}"
                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        @include('supervisors.delete-modal')
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
