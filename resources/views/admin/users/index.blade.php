@extends('layouts.layout-admin')

@section('title', 'Tài khoản')

@section('breadcrumb')
    <div class="d-flex justify-content-between">
        <h4 class="fw-bold">Tài khoản</h4>
        <h5 class="fw-bold"><span class="text-muted fw-light">Trang chủ /</span> Tài khoản</h5>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="row card-header d-flex justify-content-between">
            <div class="col-12 d-flex align-items-center">
                <div class="col-11">
                    <form action="{{ route('admin.users.index') }}" method="GET">
                        <div class="row">
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label">Từ khóa</label>
                                <input name="keyword" value="" type="text" class="form-control"
                                    placeholder="Nhập email" />
                            </div>
                            <div class="col-2">
                                <label for="exampleFormControlInput1" class="form-label"><span
                                        style="color: white">.</span></label>
                                <br>
                                <button class="btn btn-outline-primary" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-1">
                    <label for="exampleFormControlInput1" class="form-label"><span style="color: white">.</span></label>
                    <br>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive text-nowrap">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="3%;">
                            <div class="row">
                                <div class="d-flex align-items-center gap-3">
                                    <span>ID</span>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="d-flex align-items-center gap-3">
                                    <span>Email</span>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="d-flex align-items-center gap-3">
                                    <span>Trạng thái</span>
                                </div>
                            </div>
                        </th>
                        <th>
                            <div class="row">
                                <div class="d-flex align-items-center gap-3">
                                    <span>Thao tác</span>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($users))
                        @foreach ($users as $item)
                            <tr role="button" class="row-item">
                                <td><strong>{{ $item->id }}</strong></td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @include('admin.share.status', ['status' => $item->status])
                                </td>
                                <td>
                                    <a href="{{ route('admin.users.edit', ['user' => $item]) }}"
                                        class="btn-edit link-warning">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>
                                    <a href="#"
                                        data-url-delete="{{ route('admin.users.destroy', ['user' => $item]) }}"
                                        class="btn-delete link-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-delete">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td style="color: rgb(247, 86, 86);">Không có kết quả!</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="card-body">{{ $users->links() }}</div>
    </div>
@endsection
