@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kriteria: {{ $criteria->name }}</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $criteria->code }} - {{ $criteria->name }}</h5>
            <p class="card-text">
                <strong>Bobot:</strong> {{ $criteria->weight }}<br>
                <strong>Jenis:</strong> {{ $criteria->type == 'benefit' ? 'Benefit' : 'Cost' }}
            </p>
            <div class="d-flex">
                <a href="{{ route('criterias.edit', $criteria) }}" class="btn btn-warning me-2">Edit</a>
                <form action="{{ route('criterias.destroy', $criteria) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus kriteria?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    
    <a href="{{ route('criterias.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Kriteria</a>
</div>
@endsection