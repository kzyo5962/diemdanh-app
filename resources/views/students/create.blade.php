@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-2 text-gray-800 text-capitalize">breadcrumbs</h4>
        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                <div class="p-5">
                    <h1 class="mb-2 text-gray-800">Thêm học viên</h1>

                    <form class="user" method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark required" for="fullName">Họ tên</label>
                                    <input type="text" id="fullName" name="fullName" class="form-control"
                                        placeholder="Điền đầy đủ họ tên" value={{ old('fullName') }}>
                                    @error('fullName')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="birthDt">Ngày sinh</label>
                                    <input type="date" id="birthDt" name="birthDt" class="form-control"
                                        value={{ old('birthDt') }}>
                                    @error('birthDt')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="phoneNumber">Số điện thoại</label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="Điền số điện thoại" value={{ old('phoneNumber') }}>
                                    @error('phoneNumber')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark required" for="class_id">Chọn lớp</label>
                                    <select id="class_id" class="form-control" name="class_id">

                                        <option value="" {{ old('class_id') != '' ? '' : 'selected' }}>NO SELECT
                                        </option>

                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ old('class_id') == $classroom->id ? 'selected' : '' }}>
                                                {{ $classroom->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('class_id')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Điền địa chỉ email" value={{ old('email') }}>
                                    @error('email')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary mt-2">Thêm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
