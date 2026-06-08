<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    {{-- {{(movies)}} --}}

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $index => $movie)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->date }}</td>
                    <td>{{ $movie->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
