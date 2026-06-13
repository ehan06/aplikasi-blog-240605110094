<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
</head>
<body>

<h2>Edit Kategori</h2>

<form action="{{ route('kategori.update',$kategori->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <p>
        Nama Kategori
    </p>

    <input type="text"
           name="nama_kategori"
           value="{{ $kategori->nama_kategori }}">

    <p>
        Keterangan
    </p>

    <textarea name="keterangan">{{ $kategori->keterangan }}</textarea>

    <br><br>

    <button type="submit">
        Update
    </button>

</form>

<br>

<a href="{{ route('kategori.index') }}">
    Kembali
</a>

</body>
</html>