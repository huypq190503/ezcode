@extends('layouts.admin')

@section('content')

    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
      </div>

      <div class="card card-body mx-3 mx-md-4 mt-n6 ">
        <div class="row gx-4">
            <!-- Cột chứa ảnh và tên -->
            <div class="col-auto">
                <div class=" position-relative">
                    <img src="{{ $user['avatar'] }}"  height="300px" width="350px" alt="profile_image" style="object-fit: cover" class="w-1000 border-radius-lg shadow-sm">
                </div>
            </div>
            <!-- Cột chứa thông tin -->
            <div class="col">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="javascript:;">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet ut ullam illum voluptates qui et animi omnis libero id, voluptate necessitatibus porro cupiditate temporibus repellat, quo quas officiis iste praesentium.
                        </p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $user['name'] }}</li>
                            {{-- <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; (44) 123 1234 123</li> --}}
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $user['email'] }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date created:</strong> &nbsp; {{ $user['date'] }}</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection