@extends('layouts.admin')

@section('content')

    <div class="row col-6">
        <div class="card my-4">
            <div class="col-10">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
    
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                      <h6 class="text-white text-center text-capitalize">Cập nhật thông tin : {{ $category['name'] }} </h6>
                    </div>
                    
                  </div>
                  
                <form action="" method="POST">
                    <input type="hidden" value="{{ $category['id'] }}" name="id">
                    <div class="mt-2 mb-3" >
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control border border-dark"  style="padding: 15px ;" id="name" required
                        value="{{ $category['name'] }}" name="name">
                    </div>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                </form>
            </div>
        </div>
    
    </div>
@endsection