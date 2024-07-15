<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan</title>
    <style>
        /* Sesuaikan gaya CSS sesuai kebutuhan untuk tampilan PDF */
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Daftar Pengaduan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Tanggapan</th>
                <th>Nama Pengguna</th> <!-- Kolom tambahan untuk nama pengguna -->
            </tr>
        </thead>
        <tbody>
            <?php $i = 1?>
            @foreach($pengaduans as $pengaduan)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $pengaduan->title }}</td>
                    <td>{{ $pengaduan->description }}</td>
                    <td>{{ $pengaduan->status }}</td>
                    <td>{{ $pengaduan->tanggapan }}</td>
                    <td>{{ $pengaduan->user->name }}</td> <!-- Menampilkan nama pengguna yang sesuai -->
                </tr>
                <?php $i++?>
            @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          window.print();   
        });
    </script>
</body>
</html>
