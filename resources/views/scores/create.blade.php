@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Nilai Baru</h1>
    
    <form action="{{ route('scores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="alternative_id" class="form-label">Alternatif</label>
            <select class="form-select" id="alternative_id" name="alternative_id" required>
                <option value="">Pilih Alternatif</option>
                @foreach($alternatives as $alternative)
                    <option value="{{ $alternative->id }}">{{ $alternative->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="criteria_id" class="form-label">Kriteria</label>
            <select class="form-select" id="criteria_id" name="criteria_id" required>
                <option value="">Pilih Kriteria</option>
                @foreach($criterias as $criteria)
                    <option value="{{ $criteria->id }}">{{ $criteria->code }} - {{ $criteria->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Nilai (1-5)</label>
            <input type="number" class="form-control" id="value" name="value" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('scores.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection