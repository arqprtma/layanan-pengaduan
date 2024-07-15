<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100 p-6">
    <div class=" mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">
        <a href="{{route('admin.dashboard')}}" class="underline">Back Dashboard</a>
        <hr> <br>
        <a href="{{ route('pengaduan.pdf') }}" target="_blank" class="bg-indigo-500 text-white px-4 py-2  rounded-lg hover:bg-indigo-600">Download PDF</a>
        <h2 class="text-2xl font-bold mb-4 mt-4">Data Pengaduan</h2>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Deskripsi</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Tanggapan</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $i = 1;?>
                @foreach($pengaduans as $pengaduan)
                    <tr>
                        <td class="py-2 px-4 border-b">{{$i;}}</td>
                        <td class="py-2 px-4 border-b">{{ $pengaduan->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $pengaduan->description }}</td>
                        <td class="py-2 px-4 border-b">{{ $pengaduan->status }}</td>
                        <td class="py-2 px-4 border-b">{{ $pengaduan->tanggapan }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Edit</a>
                            <form action="{{ route('pengaduan.delete', $pengaduan->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Delete</button>
                            </form>
                            @if($pengaduan->status == 'belum')
                                <form action="{{ route('pengaduan.verifikasi', $pengaduan->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Verifikasi</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    <?php $i++?> 
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
