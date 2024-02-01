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
        <h1>Danh sách Người Dùng</h1>

        <a href="/admin/posts/create" class="btn btn-info">Thêm mới</a>

        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Content</th>
                    <th>Image </th>
                    <th>Danh mục</th>
                    <th>Thao tác</th>
                </tr>
                @foreach ($posts as $value)
                    <tr>
                        <td>{{ $value['id'] }}</td>
                        <td>{{ $value['title'] }}</td>
                        <td>{{ $value['excerpt'] }}</td>
                        <td>{{ $value['content'] }}</td>
                        <td>
                            <img src=" {{ $value['image'] }} " width="100px" alt="">
                        </td>
                        <td>{{ $value['category_name'] }}</td>
                        <td>
                            <a class="btn btn-warning" href="posts/{{ $value['id'] }}/update">Sửa</a>
                            <a class="btn btn-primary" href="posts/{{ $value['id'] }}/show">Xem chi
                                tiết</a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa không!!')" class="btn btn-danger"
                                href="posts/{{ $value['id'] }}/delete">Xóa</a>

                        </td>
                    </tr>
                @endforeach


            </table>
        </div>
    </div>

</body>

</html>
