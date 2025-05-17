<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Produk Toko</title>
</head>
<style>
    body{
        background-color: skyblue;
        color: blue;
        text-shadow: 1px 1px white;
    }
</style>
<body>
    <h2>Nama: Rian Fadila</h2>
    <h2>NIM: 2211102237</h2>

    <h3>Form Produk</h3>
    <form action="{{ isset($produk) ? route('produk.update', $produk->id) : route('produk.store') }}" method="POST">
        @csrf
        @if(isset($produk))
            @method('PUT')
        @endif
        <input type="text" name="nama" placeholder="Nama Produk" value="{{ $produk->nama ?? '' }}">
        <input type="number" name="stok" placeholder="Stok" value="{{ $produk->stok ?? '' }}">
        <input type="text" name="harga" placeholder="Harga" value="{{ $produk->harga ?? '' }}">
        <button type="submit">Simpan</button>
    </form>

    <h3>Daftar Produk</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @foreach($produks as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->stok }}</td>
            <td>Rp {{ number_format($item->harga, 2, ',', '.') }}</td>
            <td>
                <a href="{{ route('produk.edit', $item->id) }}">Edit</a>
                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
