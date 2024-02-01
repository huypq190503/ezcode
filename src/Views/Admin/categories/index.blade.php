{{-- {{$_SERVER['REQUEST_URI']}} --}}
{{-- {{basename($_SERVER['REQUEST_URI'])}} --}}
    @extends('layouts.admin')
    @section('content')
        
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Danh sách danh mục</h6>
            </div>
            <a href="/admin/categories/create" class="btn btn-info mt-4">Thêm mới</a>

          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">STT</th>
                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>

                <tbody>
                    
                  @foreach ($categories as $key => $category)
                  <tr class="align-middle text-center text-sm">
                    <td >{{ $key +1 }}</td>
                    <td>
                      <div class=" px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $category['name'] }}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-warning" href="categories/{{$category['id']}}/update">Sửa</a>
                      <a onclick="return confirm('Bạn có chắc muốn xóa không!!')" class="btn btn-danger" href="categories/{{$category['id']}}/delete">Xóa</a>

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
