<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Danh sách Game</h1>
    <a href="{{ route('games.create') }}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Lập trình viên</th>
                <th scope="col">Năm sản xuất</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td><img width="100px" src="{{ Storage::url($item->cover_art) }}" alt=""></td>
                    <td>{{ $item->developer }}</td>
                    <td>{{ $item->release_year }}</td>
                    <td>{{ $item->genre }}</td>
                    <td><a href="{{ route('games.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('games.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Bạn có xóa không')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
