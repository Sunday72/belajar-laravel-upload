<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tester Upload</title>
</head>
<body>
    @if (session()->has('success'))
    berhasil
    @endif
    <form action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="namasekolah">Nama Sekolah : </label>
        <input type="text" name="nama_sekolah"><br>
        
        <label for="surat">Surat Permohonan : </label>
        <input type="file" name="surat_permohonan"><br><br>
        @error('surat_permohonan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror

        <button type="submit">Submit</button>
    </form>
</body>
</html>