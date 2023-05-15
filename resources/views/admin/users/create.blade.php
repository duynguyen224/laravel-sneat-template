@extends('layouts.layout-admin')

@section('title', 'Thêm mới tài khoản')

@section('breadcrumb')
    <div class="d-flex justify-content-between">
        <h4 class="fw-bold">Thêm mới tài khoản</h4>
        <h5 class="fw-bold"><span class="text-muted fw-light">Trang chủ / Tài khoản / </span> Thêm mới tài khoản</h5>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin</h5>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label" for="basic-default-name">Email <span
                                    class="text-red">(*)</span></label>
                            <div class="col-9">
                                <input name="email" type="text" class="form-control" placeholder="Nhập email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="error-message text-red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-3 col-form-label" for="basic-default-name">Select <span
                                    class="text-red">(*)</span></label>
                            <div class="col-9">
                                <select class="form-select">
                                    <option selected disabled>Chọn nhân viên</option>
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="html5-date-input" class="col-3 col-form-label">Date</label>
                            <div class="col-9">
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="exampleFormControlTextarea1" class="col-3 col-form-label">Example textarea</label>
                            <div class="col-9">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 text-end">
                    <div class="col-sm-12">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
