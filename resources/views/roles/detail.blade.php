@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-3 text-gray-800">Chi tiết role</h1>
        <p>{{ $role->name }}</p>
        <div class="card shadow mb-4">
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách user thuộc bởi:</h6>
            </a>
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    @forelse  ($role->users as $user)
                        <p>{{ $user->name }}</p>
                    @empty
                        <p>Chưa có</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
@endsection
