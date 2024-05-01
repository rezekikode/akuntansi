<a href="{{ route('jenis-akun.index') }}" class="btn btn-primary">Kembali</a>
<div>
    <div class="form-group">
        <label for="kode">Kode</label>
        <input type="text" name="kode" value="{{ $jenisAkun->kode }}" id="kode" class="form-control @error('kode') is-invalid @enderror" readonly>
        @error('kode')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{ $jenisAkun->nama }}" id="nama" class="form-control @error('nama') is-invalid @enderror" readonly>
        @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>    
</div>