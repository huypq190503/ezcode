<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Xem chi tiết</h2>
  <table class="table">
    <tr>
        <th>Tên trường</th>
        <th>Gía trị</th>
    </tr>
    <tr>
        <td>ID</td>
        <td>{{$post['id']}}</td>
    </tr>
    <tr>
        <td>Danh mục</td>
        <td>{{$post['category_name']}}</td>
    </tr>
    <tr>
        <td>title</td>
        <td>{{$post['title']}}</td>
    </tr>
    <tr>
        <td>excerpt</td>
        <td>{{$post['excerpt']}}</td>
    </tr>
    <tr>
        <td>content</td>
        <td>{{$post['content']}}</td>
    </tr>
    <tr>
        <td>Image</td>
        <td>
            <img src="{{$post['image']}}" alt="" width="100px">
        </td>
    </tr>
  </table>
</div>

</body>
</html>