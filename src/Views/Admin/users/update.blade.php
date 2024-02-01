@extends('layouts.admin')

@section('content')
    <div class="row col-10">
        <div class="card my-4">
            <div class="col-10">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-center text-capitalize">Cập nhật thông tin : {{ $user['name'] }} </h6>
                    </div>

                </div>
                
                @if (!empty($_SESSION['success']))
                    <div class="alert alert-success" id="successAlert" style="opacity: 1; transition: opacity 1s ease-in-out;">
                        {{ $_SESSION['success'] }}
                    </div>

                    @php
                        $_SESSION['success'] = null;
                    @endphp
                @endif

                <form method="post" style="margin-top:20px;" action="" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $user['id'] }}" name="id">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Tên khách hàng</label>
                            <input type="text" class="form-control border border-dark" id="name"
                                placeholder="Nhập tên khách hàng" name="name" value="{{ $user['name'] }}" />
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control border border-dark" id="email"
                                placeholder="Nhập email" name="email" value="{{ $user['email'] }}" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="pass" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control border border-dark" id="pass"
                                placeholder="Nhập mật khẩu" name="password" value="{{ $user['password'] }}" />
                        </div>
                        <div class="col mb-3 d-flex gap-2">
                            <div class="col">
                                <label for="avatar" class="form-label">Avatar:</label>
                                <input type="file" class="form-control border border-dark" id="avatar" name="avatar">
                            </div>
                            <img src="{{ $user['avatar'] }}" class="rounded-circle" style="background-color: black"
                                alt="" width="150px">
                        </div>
                    </div>
                    <div class="row col-8 mb-3">
                        <div class="col-7">
                            <label for="role" class="form-label">Quyền</label>
                            <select class="form-control" id="role" name="role" value="<?php echo $user['role']; ?>">
                                <option value="0" <?php if($user['role']=="0" ): ?> selected <?php endif; ?>>User
                                </option>
                                <option value="1" <?php if($user['role']=="1" ): ?> selected <?php endif; ?>>Admin
                                </option>
                            </select>
                        </div>
                    </div>



                    {{-- <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="card card-body border border-dark" id="address" placeholder="Nhập địa chỉ"
                        name="address" value="{{ $user['name'] }}" />
                </div>
                <div class="mb-3">
                    <label for="tel" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="tel" placeholder="Nhập số điện thoại" name="tel"
                        value="{{ $user['name'] }}" />
                </div> --}}

                    <button type="submit" name="btnUpdate" class="btn btn-primary">Chỉnh sửa</button>
                </form>
            </div>
        </div>

    </div>
@endsection
