<a href="{{ route('jenis-akun.index') }}"><button>Kembali</button></a>
<form action="{{ route('jenis-akun.update', $jenisAkun->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') ?? $jenisAkun->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>