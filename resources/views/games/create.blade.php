<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Thêm Game</h1>
    <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="example" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="title" placeholder="Tiêu đề">

        </div>
        <div class="mb-3">
            <label for="example" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="cover_art" placeholder="Hình ảnh">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">Lập trình viên</label>
            <input type="text" class="form-control" name="developer" placeholder="Lập trinh viên">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">Năm sản xuất</label>
            <input type="number" class="form-control" name="release_year" placeholder="Năm sản xuất">
        </div>
        <div class="mb-3">
            <label for="example" class="form-label">Thể loại</label>
            <input type="text" class="form-control" name="genre" placeholder="Thể loại">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('games.index') }}" class="btn btn-success">Quay lại</a>
    </form>
</body>

</html>
