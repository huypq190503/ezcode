@extends('layouts.admin')

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@section('content')

<div class="row col-10"  >
    <div class="card my-4">
        <div class="col-10 mx-auto ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">

                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-center text-capitalize">Thêm tài khoản</h6>
                </div>
                
              </div>
            <form action="" method="POST" enctype="multipart/form-data" >
                <div class="row col-12 mt-3">
                    <div class=" col-md-6 mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control border border-dark" id="name" required
                            placeholder="Enter name" name="name">
                    </div>
                    
                    <div class=" col-md-6 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control border border-dark" id="email" required
                            placeholder="Enter email" name="email">
                    </div>
                </div>

                <div class="row col-12 mb-3">
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control border border-dark" id="password" required 
                            placeholder="Enter password" name="password">
                    </div>
                    
                    <div class="col-md-6 pd-3">
                        <label for="formFile" class="form-label">Avatar:</label>
                        <input type="file" class="form-control border border-dark" id="formFile" name="avatar">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>

@endsection