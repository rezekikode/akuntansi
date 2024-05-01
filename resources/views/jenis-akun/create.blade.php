<a href="{{ route('jenis-akun.index') }}"><button>Kembali</button></a>
<form action="{{ route('jenis-akun.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{ old('nama') }}" id="nama" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>