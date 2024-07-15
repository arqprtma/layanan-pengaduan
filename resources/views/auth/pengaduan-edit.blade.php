<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Pengaduan</h2>
        <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="judul" class="block text-gray-700 font-bold mb-2">Judul Pengaduan</label>
                <input type="text" id="judul" name="title" value="{{ $pengaduan->title }}" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi Pengaduan</label>
                <input type="text" id="deskripsi" name="description" value="{{ $pengaduan->description }}" class="w-full p-2 border border-gray-300 rounded-lg">
                <input type="hidden" id="status" name="status" value="belum" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
              
                <input type="hidden" id="tanggapan" name="tanggapan" value="belum" class="w-full p-2 border border-gray-300 rounded-lg">
            <!-- Hanya tampilkan ini untuk admin dan petugas -->
            <?php if ($user->role == 3 || $user->role == 1) { ?>
            <div>
                <input type="hidden" id="status" name="status" value="{{ $pengaduan->status }}" class="w-full p-2 border border-gray-300 rounded-lg">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi Tanggapan</label>
                <input type="text" id="tanggapan" name="tanggapan" value="{{ $pengaduan->tanggapan }}" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <?php }?>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
