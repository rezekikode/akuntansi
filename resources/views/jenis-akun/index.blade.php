<a href="{{ route('jenis-akun.create') }}"><button>Tambah</button></a>
<table>
    <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Dibuat Pada</th>
        <th>Diubah Pada</th>
        <th>Dihapus Pada</th>
        <th>Aksi</th>
    </tr>
    @foreach ($jenisAkun as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $data->nama }}</td>
        <td>{{ $data->dibuat_pada }}</td>
        <td>{{ $data->diubah_pada }}</td>
        <td>{{ $data->dihapus_pada }}</td>
        <td>
            <a href="{{ route('jenis-akun.edit', $data->id) }}"><button>Edit</button></a>
            <form action="{{ route('jenis-akun.destroy', $data->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>