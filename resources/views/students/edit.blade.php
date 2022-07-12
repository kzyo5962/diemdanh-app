@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                <div class="p-5">
                    <h1 class="h3 mb-3 text-gray-800">Cập nhật {{ $subject }}</h1>

                    <form class="user" method="POST" action="{{ route('students.update', ['student' => $student]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark required" for="fullName">Họ tên</label>
                                    <input type="text" id="fullName" name="fullName" class="form-control"
                                        placeholder="Điền đầy đủ họ tên" value="{{ $student->fullName }}">
                                    @error('fullName')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="birthDt">Ngày sinh</label>
                                    <input type="date" id="birthDt" name="birthDt" class="form-control"
                                        value="{{ $student->birthDt }}">
                                    @error('birthDt')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="phoneNumber">Số điện thoại</label>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="Điền số điện thoại" value="{{ $student->phoneNumber }}">
                                    @error('phoneNumber')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-dark required" for="class_id">Chọn lớp</label>
                                    <select id="class_id" class="form-control" name="class_id">

                                        <option value="" {{ $student->classroom->id != '' ? '' : 'selected' }}>NO
                                            SELECT
                                        </option>

                                        @foreach ($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"
                                                {{ $student->classroom->id == $classroom->id ? 'selected' : '' }}>
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
                                        placeholder="Điền địa chỉ email" value="{{ $student->email }}">
                                    @error('email')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="text-dark required" for="status">Tình trạng</label>
                                    <select id="status" class="form-control" name="status">

                                        @foreach (config('enum.student.status') as $key => $value)
                                            <option value="{{ $value }}"
                                                {{ $student->status == $value ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>

                                    @error('status')
                                        <small class="d-block text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary mt-2">Cập nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
