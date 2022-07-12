@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                <div class="p-5">
                    <h1 class="h3 mb-3 text-gray-800">Thêm {{ $subject }}</h1>

                    <form class="user" method="POST" action="{{ route('supervisors.store') }}">
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
                                    <label class="text-dark required" for="admin_id">Chọn admin quản lý</label>
                                    <select id="admin_id" class="form-control" name="admin_id">

                                        <option value="" {{ old('admin_id') != '' ? '' : 'selected' }}>NO
                                            SELECT
                                        </option>

                                        @foreach ($admins as $admin)
                                            <option value="{{ $admin->id }}"
                                                {{ old('admin_id') == $admin->id ? 'selected' : '' }}>
                                                {{ $admin->fullName }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('admin_id')
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
