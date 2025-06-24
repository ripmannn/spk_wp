@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Kriteria Baru</h1>
    
    <form action="{{ route('criterias.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Kode Kriteria</label>
            <input type="text" class="form-control" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Kriteria</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Bobot</label>
            <input type="number" class="form-control" id="weight" name="weight" min="1" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Jenis</label>
            <select class="form-select" id="type" name="type" required>
                <option value="benefit">Benefit</option>
                <option value="cost">Cost</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('criterias.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection