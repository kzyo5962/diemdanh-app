@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Quản lý ADMIN</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>SĐT</th>
                                <th>Email</th>
                                <th>Công cụ</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->fullName }}</td>
                                    <td>{{ $admin->phoneNumber }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        <a href={{ route('admin.show', ['admin' => $admin]) }} data-toggle="tooltip"
                                            title="Chi tiết" class="btn btn-info"><i class="fas fas fa-eye"></i></a>
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
