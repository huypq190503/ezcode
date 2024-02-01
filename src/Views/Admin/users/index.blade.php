@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Danh sách tài khoản</h6>
                    </div>
                    <a href="/admin/users/create" class="btn btn-info mt-4">Thêm mới</a>
                   
                    @if (!empty($_SESSION['success']))
                        <div class="alert alert-success position-absolute top-50 end-0" id="successAlert"
                            style="opacity: 1; transition: opacity 1s ease-in-out;">
                            {{ $_SESSION['success'] }}
                        </div>

                        @php
                            $_SESSION['success'] = null;
                        @endphp
                    @endif

                    <script>
                        setTimeout(function() {
                            var alert = document.getElementById('successAlert');
                            alert.style.transition = 'opacity 1s ease-in-out';
                            alert.style.opacity = 0;
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 1000);
                        }, 3000);
                    </script>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-6">
                                        Author</th>
                                    {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th> --}}
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Employed</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                    <!-- <th class="text-secondary opacity-7"></th> -->
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($users as $key => $user)
                                    <tr class="align-middle text-center text-sm">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ $user['avatar'] }}" style="object-fit: cover;"
                                                        class="avatar avatar-xl me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user['name'] }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $user['email'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $user['role'] == '0' ? 'User' : 'Admin' }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $user['date'] }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a class="btn btn-warning" href="users/{{ $user['id'] }}/update">Sửa</a>
                                            <a class="btn btn-primary" href="users/{{ $user['id'] }}/show">Xem chi
                                                tiết</a>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa không!!')"
                                                class="btn btn-danger" href="users/{{ $user['id'] }}/delete">Xóa</a>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
