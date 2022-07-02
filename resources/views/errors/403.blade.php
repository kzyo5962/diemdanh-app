@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="403">403</div>
            <p class="lead text-gray-800 mb-5">Bạn không có quyền truy cập vào trang này</p>
            <a href="{{ route('home') }}">&larr; Quay trở lại trang chủ</a>
        </div>
    </div>
@endsection
