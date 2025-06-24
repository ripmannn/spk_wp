@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Alternatif: {{ $alternative->name }}</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $alternative->name }}</h5>
            <p class="card-text"><strong>Dibuat:</strong> {{ $alternative->created_at->format('d M Y H:i') }}</p>
            
            <h6>Nilai Kriteria:</h6>
            <ul>
                @foreach($alternative->scores as $score)
                    <li>{{ $score->criteria->name }}: {{ $score->value }}</li>
                @endforeach
            </ul>
            
            <div class="d-flex">
                <a href="{{ route('alternatives.edit', $alternative) }}" class="btn btn-warning me-2">Edit</a>
                <form action="{{ route('alternatives.destroy', $alternative) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus alternatif?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    
    <a href="{{ route('alternatives.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Alternatif</a>
</div>
@endsection