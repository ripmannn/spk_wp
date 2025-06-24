@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Alternatif Baru</h1>
    
    <form action="{{ route('alternatives.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Alternatif</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('alternatives.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection