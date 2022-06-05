@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Trang không tìm thấy</p>
            <a href="{{ route('/') }}">&larr; Quay trở lại trang chủ</a>
        </div>
    </div>
@endsection
