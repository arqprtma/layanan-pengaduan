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
    <div class="max-w-5xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <a href="{{route('dashboard')}}" class="underline">Back Dashboard</a>
        <hr> <br>
        <h2 class="text-2xl font-bold mb-4">Tambah Pengaduan</h2>
        <form action="{{ route('pengaduan.proses') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" id="judul" name="id_user" value="{{Auth::id()}}">
            <div>
                <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Pengaduan</label>
                <input type="text" id="judul" name="title" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi Pengaduan</label>
                <input type="text" id="deskripsi" name="description" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <input type="hidden" id="status" name="status" value="belum">
            <input type="hidden" id="tanggapan" name="tanggapan" value="belum">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Submit</button>
        </form>
    </div>

    <div class="max-w-5xl mx-auto mt-8 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Data Pengaduan</h2>
        <div class="overflow-x-auto mt-4">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Judul</th>
                        <th class="py-2 px-4 border-b">Deskripsi</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Tanggapan</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $i = 1 ?>
                    @foreach($pengaduans as $pengaduan)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $i }}</td>
                            <td class="py-2 px-4 border-b break-all">{{ $pengaduan->title }}</td>
                            <td class="py-2 px-4 border-b break-all">{{ $pengaduan->description }}</td>
                            <td class="py-2 px-4 border-b break-all">{{ $pengaduan->status }}</td>
                            <td class="py-2 px-4 border-b break-all">{{ $pengaduan->status }}</td>
                            <td class="py-2 px-4 border-b lg:flex gap-2">
                                <a href="{{ route('pengaduan.edit', $pengaduan->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Edit</a>
                                <form action="{{ route('pengaduan.delete', $pengaduan->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded-lg hover:bg-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
