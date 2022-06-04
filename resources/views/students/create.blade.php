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
                                    <label class="text-dark" for="fullName">Họ tên</label>
                                    <input type="text" name="fullName" class="form-control form-control-user"
                                        placeholder="Điền đầy đủ họ tên">
                                    @error('fullName')
                                        <small class="d-block text-danger mb-2">{{ $message }}</small>
                                    @enderror


                                    <label class="text-dark" for="birthDt">Ngày sinh</label>
                                    <input type="date" name="birthDt" class="form-control form-control-user">
                                    <p class="  text-danger">{{ $errors->first('birthDt') }}</p>

                                    {{-- <label class="text-dark" for="DiaChi">SDT</label>
                                    <input type="text" name="SDT" class="form-control form-control-user"
                                        id="exampleFirstName" placeholder="Điền số điện thoại">
                                    <p class="text-danger">{{ $errors->first('SDT') }}</p> --}}
                                </div>
                                <button class="btn btn-primary mt-2">Thêm mới</button>
                            </div>
                            <div class="col-lg-6">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
