
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Author</title>
</head>
<body>
    <h1>Daftar Author Buku</h1>

    <a href="/genres">Genre</a> |
    <a href="/authors">Author</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
