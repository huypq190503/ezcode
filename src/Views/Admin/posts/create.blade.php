<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Thêm mới bài post</h1>

        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">title:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="title">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">excerpt:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="excerpt">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">content:</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password"
                        name="content">
                </div>
                {{-- thêm avartar vào  --}}
                <div class="mb-3">
                    <label for="password" class="form-label">image:</label>
                    <input type="file" class="form-control" id="avartar" placeholder="Enter password"
                        name="image">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">category_id:</label>
                    <select class="form-select" id="categoryStatus" name="category_id">
                        <option value="">--chọn--</option>
                        @foreach ($category as $cate)
                            <option value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
