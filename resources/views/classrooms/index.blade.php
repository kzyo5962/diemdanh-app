@extends('layout.main')
@section('content')
    <div class="container-fluid">
        @if ($title)
            <h1 class="h3 mb-3 text-gray-800">{{ $title }}</h1>
        @endif
        <a class="btn btn-success mb-4" href="{{ route('classrooms.create') }}">
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
                                <th>Tên lớp</th>
                                <th>Số buổi học</th>
                                <th>Bộ môn giảng dạy</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->id }}</td>
                                    <td>{{ $classroom->name }}</td>
                                    <td>{{ $classroom->numOfLessons }}</td>
                                    <td>{{ $classroom->subject->name }}</td>
                                    <td>
                                        <a href="{{ route('classrooms.edit', ['classroom' => $classroom]) }}"
                                            data-toggle="tooltip" title="Chỉnh sửa" class="btn btn-primary"><i
                                                class="fas fa-pen"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deletedclassroomModal"
                                            data-toggle="tooltip" title="Xóa {{ $classroom->id }}"
                                            class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        {{-- @include('classrooms.delete-modal') --}}
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
