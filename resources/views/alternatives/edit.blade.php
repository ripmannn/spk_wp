@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Alternatif: {{ $alternative->name }}</h1>
    
    <form action="{{ route('alternatives.update', $alternative) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Alternatif</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $alternative->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('alternatives.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection