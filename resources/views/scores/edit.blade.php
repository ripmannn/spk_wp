@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Nilai</h1>
    
    <form action="{{ route('scores.update', $score) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="alternative_id" class="form-label">Alternatif</label>
            <select class="form-select" id="alternative_id" name="alternative_id" required disabled>
                <option value="{{ $score->alternative_id }}" selected>{{ $score->alternative->name }}</option>
            </select>
            <input type="hidden" name="alternative_id" value="{{ $score->alternative_id }}">
        </div>
        <div class="mb-3">
            <label for="criteria_id" class="form-label">Kriteria</label>
            <select class="form-select" id="criteria_id" name="criteria_id" required disabled>
                <option value="{{ $score->criteria_id }}" selected>{{ $score->criteria->code }} - {{ $score->criteria->name }}</option>
            </select>
            <input type="hidden" name="criteria_id" value="{{ $score->criteria_id }}">
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Nilai (1-5)</label>
            <input type="number" class="form-control" id="value" name="value" min="1" max="5" value="{{ $score->value }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('scores.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection